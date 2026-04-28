<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Helper: hitung startDate & endDate dari year/month
     */
    private function getDateRange($year, $month)
    {
        if ($month) {
            return [
                Carbon::createFromDate($year, $month, 1)->startOfMonth(),
                Carbon::createFromDate($year, $month, 1)->endOfMonth(),
            ];
        }
        return [
            Carbon::createFromDate($year, 1, 1)->startOfYear(),
            Carbon::createFromDate($year, 12, 31)->endOfYear(),
        ];
    }

    /**
     * Helper: ambil stats dari date range
     */
    private function getStats($startDate, $endDate)
    {
        $stats = [
            'total'   => Ticket::whereBetween('created_at', [$startDate, $endDate])->count(),
            'done'    => Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status', 'done')->count(),
            'process' => Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status', 'process')->count(),
            'waiting' => Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status', 'waiting')->count(),
        ];
        $stats['completion_rate'] = $stats['total'] > 0
            ? round(($stats['done'] / $stats['total']) * 100, 2)
            : 0;
        return $stats;
    }

    /**
     * Helper: ambil category breakdown
     */
    private function getCategoryBreakdown($startDate, $endDate)
    {
        return Ticket::whereBetween('created_at', [$startDate, $endDate])
            ->select('category', DB::raw('count(*) as total'), DB::raw("sum(case when status='done' then 1 else 0 end) as completed"))
            ->groupBy('category')
            ->get();
    }

    /**
     * Show monthly/yearly recap
     */
    public function periodRecap(Request $request)
    {
        $year  = $request->query('year', now()->year);
        $month = $request->query('month', null);

        [$startDate, $endDate] = $this->getDateRange($year, $month);

        $stats             = $this->getStats($startDate, $endDate);
        $categoryBreakdown = $this->getCategoryBreakdown($startDate, $endDate);
        $monthlyData       = $this->getMonthlyTicketData($year);
        $period            = $month ? $month . '/' . $year : $year;
        $years             = range(now()->year - 5, now()->year);

        return view('admin.reports.period-recap', compact(
            'stats', 'categoryBreakdown', 'monthlyData',
            'period', 'year', 'month', 'years'
        ));
    }

    /**
     * Export Excel — tanpa package tambahan
     */
    public function exportExcel(Request $request)
    {
        $year  = $request->query('year', now()->year);
        $month = $request->query('month', null);

        [$startDate, $endDate] = $this->getDateRange($year, $month);

        $stats             = $this->getStats($startDate, $endDate);
        $categoryBreakdown = $this->getCategoryBreakdown($startDate, $endDate);
        $monthlyData       = $this->getMonthlyTicketData($year);

        $periodLabel = $month
            ? Carbon::createFromDate($year, $month, 1)->translatedFormat('F Y')
            : 'Tahun ' . $year;

        $filename = 'rekap-pengaduan-' . ($month ? $month . '-' : '') . $year . '.xls';

        // Bangun konten HTML yang dibaca Excel
        $html  = '<!DOCTYPE html><html><head>';
        $html .= '<meta charset="UTF-8">';
        $html .= '<style>
            body { font-family: Arial, sans-serif; font-size: 11pt; }
            h2   { font-size: 14pt; }
            table { border-collapse: collapse; width: 100%; margin-top: 10px; }
            th   { background: #1e40af; color: white; padding: 6px 10px; border: 1px solid #ccc; }
            td   { padding: 5px 10px; border: 1px solid #ddd; }
            tr:nth-child(even) td { background: #f0f4ff; }
            .section-title { background: #e2e8f0; font-weight: bold; padding: 6px 10px;
                             border: 1px solid #ccc; margin-top: 16px; }
        </style></head><body>';

        // ── Header dokumen ──
        $html .= '<h2>REKAP PENGADUAN MASYARAKAT — E-TICKET BINJAI</h2>';
        $html .= '<p>Periode: <b>' . $periodLabel . '</b></p>';
        $html .= '<p>Dicetak: ' . now()->translatedFormat('d F Y, H:i') . ' WIB</p>';
        $html .= '<hr>';

        // ── Ringkasan ──
        $html .= '<p class="section-title">📋 RINGKASAN</p>';
        $html .= '<table><thead><tr>
            <th>Keterangan</th><th>Jumlah</th><th>Persentase</th>
        </tr></thead><tbody>';
        $html .= '<tr><td>Total Pengaduan</td><td>' . $stats['total'] . '</td><td>100%</td></tr>';
        $html .= '<tr><td>Selesai</td><td>' . $stats['done'] . '</td><td>' . $stats['completion_rate'] . '%</td></tr>';
        $html .= '<tr><td>Sedang Diproses</td><td>' . $stats['process'] . '</td><td>'
               . ($stats['total'] > 0 ? round($stats['process'] / $stats['total'] * 100, 1) : 0) . '%</td></tr>';
        $html .= '<tr><td>Menunggu</td><td>' . $stats['waiting'] . '</td><td>'
               . ($stats['total'] > 0 ? round($stats['waiting'] / $stats['total'] * 100, 1) : 0) . '%</td></tr>';
        $html .= '</tbody></table>';

        // ── Data bulanan ──
        $html .= '<p class="section-title">📈 DATA BULANAN</p>';
        $html .= '<table><thead><tr>
            <th>Bulan</th><th>Total</th><th>Selesai</th><th>Diproses</th><th>Menunggu</th>
        </tr></thead><tbody>';
        foreach ($monthlyData as $m) {
            $html .= '<tr>
                <td>' . $m['month'] . '</td>
                <td>' . $m['total'] . '</td>
                <td>' . $m['done'] . '</td>
                <td>' . $m['process'] . '</td>
                <td>' . $m['waiting'] . '</td>
            </tr>';
        }
        $html .= '</tbody></table>';

        // ── Breakdown kategori ──
        $html .= '<p class="section-title">📂 BREAKDOWN KATEGORI</p>';
        $html .= '<table><thead><tr>
            <th>No</th><th>Kategori</th><th>Total</th><th>Selesai</th><th>Diproses</th><th>Completion Rate</th>
        </tr></thead><tbody>';
        foreach ($categoryBreakdown as $i => $cat) {
            $rate = $cat->total > 0 ? round(($cat->completed / $cat->total) * 100, 1) : 0;
            $html .= '<tr>
                <td>' . ($i + 1) . '</td>
                <td>' . $cat->category . '</td>
                <td>' . $cat->total . '</td>
                <td>' . $cat->completed . '</td>
                <td>' . ($cat->total - $cat->completed) . '</td>
                <td>' . $rate . '%</td>
            </tr>';
        }
        $html .= '</tbody></table>';
        $html .= '</body></html>';

        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    /**
     * Export PDF — pakai blade terpisah + window.print()
     */
    public function exportPdf(Request $request)
    {
        $year  = $request->query('year', now()->year);
        $month = $request->query('month', null);

        [$startDate, $endDate] = $this->getDateRange($year, $month);

        $stats             = $this->getStats($startDate, $endDate);
        $categoryBreakdown = $this->getCategoryBreakdown($startDate, $endDate);
        $monthlyData       = $this->getMonthlyTicketData($year);
        $years             = range(now()->year - 5, now()->year);
        $period            = $month ? $month . '/' . $year : $year;

        return view('admin.reports.period-recap-print', compact(
            'stats', 'categoryBreakdown', 'monthlyData',
            'period', 'year', 'month', 'years'
        ));
    }

    /**
     * Show per-OPD recap
     */
    public function opdRecap(Request $request)
    {
        $year        = $request->query('year', now()->year);
        $month       = $request->query('month', null);
        $selectedOpd = $request->query('opd', null);

        [$startDate, $endDate] = $this->getDateRange($year, $month);

        $opdStats = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->whereBetween('tickets.created_at', [$startDate, $endDate])
            ->select(
                'users.name as opd_name',
                DB::raw('count(*) as total'),
                DB::raw("sum(case when status='done' then 1 else 0 end) as done"),
                DB::raw("sum(case when status='process' then 1 else 0 end) as process"),
                DB::raw("sum(case when status='waiting' then 1 else 0 end) as waiting")
            )
            ->groupBy('users.name')
            ->get()
            ->map(function ($item) {
                return [
                    'opd'             => $item->opd_name,
                    'total'           => $item->total,
                    'done'            => $item->done,
                    'process'         => $item->process,
                    'waiting'         => $item->waiting,
                    'completion_rate' => $item->total > 0
                        ? round(($item->done / $item->total) * 100, 2)
                        : 0,
                ];
            })->toArray();

        usort($opdStats, fn($a, $b) => $a['completion_rate'] <=> $b['completion_rate']);

        $years  = range(now()->year - 5, now()->year);
        $months = range(1, 12);

        return view('admin.reports.opd-recap', compact(
            'opdStats', 'year', 'month', 'years', 'months'
        ));
    }

    /**
     * Export PDF OPD — pakai blade terpisah + window.print()
     */
    public function exportOpdPdf(Request $request)
    {
        $year  = $request->query('year', now()->year);
        $month = $request->query('month', null);

        [$startDate, $endDate] = $this->getDateRange($year, $month);

        $opdStats = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
            ->whereBetween('tickets.created_at', [$startDate, $endDate])
            ->select(
                'users.name as opd_name',
                DB::raw('count(*) as total'),
                DB::raw("sum(case when status='done' then 1 else 0 end) as done"),
                DB::raw("sum(case when status='process' then 1 else 0 end) as process"),
                DB::raw("sum(case when status='waiting' then 1 else 0 end) as waiting")
            )
            ->groupBy('users.name')
            ->get()
            ->map(function ($item) {
                return [
                    'opd'             => $item->opd_name,
                    'total'           => $item->total,
                    'done'            => $item->done,
                    'process'         => $item->process,
                    'waiting'         => $item->waiting,
                    'completion_rate' => $item->total > 0
                        ? round(($item->done / $item->total) * 100, 2)
                        : 0,
                ];
            })->toArray();

        usort($opdStats, fn($a, $b) => $b['completion_rate'] <=> $a['completion_rate']);

        $period = $month
            ? Carbon::createFromDate($year, $month, 1)->translatedFormat('F Y')
            : 'Tahun ' . $year;

        return view('admin.reports.opd-recap-print', compact(
            'opdStats', 'year', 'month', 'period'
        ));
    }

    /**
     * Get monthly ticket data for chart
     */
    private function getMonthlyTicketData($year)
    {
        $monthlyData = [];
        for ($m = 1; $m <= 12; $m++) {
            $start = Carbon::createFromDate($year, $m, 1)->startOfMonth();
            $end   = Carbon::createFromDate($year, $m, 1)->endOfMonth();
            $monthlyData[] = [
                'month'   => Carbon::createFromDate($year, $m, 1)->format('M'),
                'total'   => Ticket::whereBetween('created_at', [$start, $end])->count(),
                'done'    => Ticket::whereBetween('created_at', [$start, $end])->where('status', 'done')->count(),
                'process' => Ticket::whereBetween('created_at', [$start, $end])->where('status', 'process')->count(),
                'waiting' => Ticket::whereBetween('created_at', [$start, $end])->where('status', 'waiting')->count(),
            ];
        }
        return $monthlyData;
    }
}