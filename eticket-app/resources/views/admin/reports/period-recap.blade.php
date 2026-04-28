@extends('layouts.app') {{-- Ganti sesuai nama file layout utama kamu --}}

@section('content')
    <style>
        /* CSS khusus untuk tampilan menu dashboard */
        .main-container {
            width: 100%;
            margin: 0 auto;
        }

        .report-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid #e2e8f0;
        }

        /* Kop surat (Hanya muncul saat print) */
        .kop {
            text-align: center;
            border-bottom: 3px double #1e293b;
            padding-bottom: 12px;
            margin-bottom: 20px;
            display: none; 
        }
        .kop h1 { font-size: 18px; text-transform: uppercase; letter-spacing: 1px; }
        .kop h2 { font-size: 16px; margin-top: 4px; }
        .kop p  { font-size: 12px; color: #64748b; margin-top: 4px; }

        .meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin-bottom: 24px;
            color: #475569;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            border-radius: 8px;
            background: #f8fafc;
        }

        .section-title {
            color: #1e40af;
            font-size: 16px;
            font-weight: 700;
            margin: 24px 0 12px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .table-container { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th {
            background: #f8fafc;
            color: #64748b;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.05em;
        }
        td { border-bottom: 1px solid #f1f5f9; padding: 12px 16px; }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 8px;
        }
        .stat-box {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            background: white;
        }
        .stat-box.blue   { border-left: 4px solid #3b82f6; }
        .stat-box.green  { border-left: 4px solid #10b981; }
        .stat-box.orange { border-left: 4px solid #f59e0b; }
        .stat-box.red    { border-left: 4px solid #ef4444; }

        .bar-bg   { background: #e2e8f0; border-radius: 10px; height: 8px; margin-top: 6px; width: 100%; }
        .bar-fill { background: #3b82f6; border-radius: 10px; height: 8px; }

        .toolbar { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
        .btn-print { background: #1e40af; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight: 600; }
        .btn-back { background: white; color: #1e40af; border: 1px solid #e2e8f0; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; }

        /* ATURAN CETAK (PRINT) - Sidebar & Navbar Otomatis Hilang */
        @media print {
            .sidebar, .navbar, .main-header, .toolbar, nav { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .report-card { border: none !important; box-shadow: none !important; padding: 0 !important; }
            .kop { display: block !important; }
            .stat-grid { grid-template-columns: repeat(4, 1fr) !important; }
            .section-title { background: #1e40af !important; color: white !important; padding: 5px 10px !important; border-radius: 4px !important; -webkit-print-color-adjust: exact; }
            th { background: #dbeafe !important; color: #1e3a8a !important; -webkit-print-color-adjust: exact; }
        }
    </style>

    <div class="main-container">
        {{-- Toolbar --}}
        <div class="toolbar">
            <a class="btn-back" href="{{ route('admin.reports.period', ['year' => $year, 'month' => $month]) }}">
                ← Kembali
            </a>
            <button class="btn-print" onclick="window.print()">
                🖨️ Cetak Rekap (PDF)
            </button>
        </div>

        <div class="report-card">
            {{-- Kop surat (Hanya muncul saat print) --}}
            <div class="kop">
                <h1>Pemerintah Kota Binjai</h1>
                <h2>Rekap Pengaduan Masyarakat — E-Ticket Binjai</h2>
                <p>Pusat Layanan Terpadu Kota Binjai</p>
            </div>

            {{-- Info periode --}}
            <div class="meta">
                <span>
                    <b>Periode:</b> 
                    @if($month)
                        {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }} {{ $year }}
                    @else
                        Seluruh Tahun {{ $year }}
                    @endif
                </span>
                <span><b>Dicetak:</b> {{ now()->translatedFormat('d F Y, H:i') }} WIB</span>
                <span><b>Admin:</b> {{ auth()->user()->name }}</span>
            </div>

            {{-- Ringkasan --}}
            <div class="section-title">📋 Ringkasan Periode</div>
            <div class="stat-grid">
                <div class="stat-box blue">
                    <div class="label" style="font-size: 12px; color: #64748b;">Total Pengaduan</div>
                    <div class="value" style="font-size: 28px; font-weight: 800; color:#3b82f6;">{{ $stats['total'] }}</div>
                    <div class="sub" style="font-size: 12px; color: #94a3b8;">Semua laporan masuk</div>
                </div>
                <div class="stat-box green">
                    <div class="label" style="font-size: 12px; color: #64748b;">Selesai</div>
                    <div class="value" style="font-size: 28px; font-weight: 800; color:#10b981;">{{ $stats['done'] }}</div>
                    <div class="sub" style="font-size: 12px; color: #94a3b8;">{{ $stats['completion_rate'] }}% Selesai</div>
                </div>
                <div class="stat-box orange">
                    <div class="label" style="font-size: 12px; color: #64748b;">Sedang Diproses</div>
                    <div class="value" style="font-size: 28px; font-weight: 800; color:#f59e0b;">{{ $stats['process'] }}</div>
                    <div class="sub" style="font-size: 12px; color: #94a3b8;">Dalam penanganan</div>
                </div>
                <div class="stat-box red">
                    <div class="label" style="font-size: 12px; color: #64748b;">Menunggu</div>
                    <div class="value" style="font-size: 28px; font-weight: 800; color:#ef4444;">{{ $stats['waiting'] }}</div>
                    <div class="sub" style="font-size: 12px; color: #94a3b8;">Belum diverifikasi</div>
                </div>
            </div>

            {{-- Data bulanan --}}
            <div class="section-title">📈 Data Bulanan — Tahun {{ $year }}</div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Total</th>
                            <th>Selesai</th>
                            <th>Diproses</th>
                            <th>Menunggu</th>
                            <th>Completion Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; $grandDone = 0; @endphp
                        @foreach($monthlyData as $m)
                            @php
                                $r = $m['total'] > 0 ? round($m['done'] / $m['total'] * 100, 1) : 0;
                                $grandTotal += $m['total'];
                                $grandDone  += $m['done'];
                            @endphp
                            <tr>
                                <td><b>{{ $m['month'] }}</b></td>
                                <td>{{ $m['total'] }}</td>
                                <td style="color:#10b981; font-weight:600;">{{ $m['done'] }}</td>
                                <td style="color:#f59e0b;">{{ $m['process'] }}</td>
                                <td style="color:#ef4444;">{{ $m['waiting'] }}</td>
                                <td>
                                    <span style="font-weight: 600;">{{ $r }}%</span>
                                    <div class="bar-bg">
                                        <div class="bar-fill" style="width:{{ $r }}%;"></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr style="background:#f8fafc; font-weight: bold;">
                            <td>TOTAL</td>
                            <td>{{ $grandTotal }}</td>
                            <td style="color:#10b981;">{{ $grandDone }}</td>
                            <td colspan="2"></td>
                            <td>{{ $grandTotal > 0 ? round($grandDone / $grandTotal * 100, 1) : 0 }}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Breakdown kategori --}}
            <div class="section-title">📂 Breakdown Kategori</div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Total</th>
                            <th>Selesai</th>
                            <th>Diproses</th>
                            <th>Completion Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categoryBreakdown as $i => $cat)
                            @php $rate = $cat->total > 0 ? round(($cat->completed / $cat->total) * 100, 1) : 0; @endphp
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><b>{{ $cat->category }}</b></td>
                                <td>{{ $cat->total }}</td>
                                <td style="color:#10b981; font-weight:600;">{{ $cat->completed }}</td>
                                <td style="color:#f59e0b;">{{ $cat->total - $cat->completed }}</td>
                                <td>
                                    <span style="font-weight: 600;">{{ $rate }}%</span>
                                    <div class="bar-bg">
                                        <div class="bar-fill" style="width:{{ $rate }}%;"></div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center; padding:20px; color:#94a3b8;">
                                    Tidak ada data untuk periode ini
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection