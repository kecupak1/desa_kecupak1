@extends('layouts.app')

@section('content')
    <style>
        :root {
            --primary-bg: #0b1120;
            --secondary-bg: #1e293b;
            --accent-blue: #3B82F6;
            --accent-orange: #F97316;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --border-color: rgba(59, 130, 246, 0.15);
            --card-bg: rgba(30, 41, 59, 0.7);
            --success-color: #10B981;
            --warning-color: #F59E0B;
            --danger-color: #EF4444;
            --input-bg: rgba(15, 23, 42, 0.4);
            --input-text: #FFFFFF;
        }

        [data-theme="light"] {
            --primary-bg: #f1f5f9;
            --secondary-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
            --card-bg: #ffffff;
            --input-bg: #f8fafc;
            --input-text: #1e293b;
        }

        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.25rem;
            animation: fadeIn 0.6s ease-out;
            zoom: 1.05;
            -moz-transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .report-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0;
        }

        .filter-section {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        /* FIX: select ikut theme */
        .form-group select {
            padding: 0.625rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--input-bg);
            color: var(--input-text);
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }

        .form-group select:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* ── Export buttons ── */
        .export-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-export {
            padding: 0.625rem 1.5rem;
            border: 1px solid var(--border-color);
            background: transparent;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .btn-export.pdf   { color: #EF4444; border-color: rgba(239,68,68,0.3); }
        .btn-export.pdf:hover { background: rgba(239,68,68,0.08); border-color: #EF4444; }

        .btn-export.excel { color: #10B981; border-color: rgba(16,185,129,0.3); }
        .btn-export.excel:hover { background: rgba(16,185,129,0.08); border-color: #10B981; }

        /* ── OPD Cards ── */
        .opd-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .opd-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .opd-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-blue);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2);
        }

        .opd-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-orange));
        }

        .opd-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .opd-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .opd-stat { text-align: center; }

        .opd-stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-blue);
        }

        .opd-stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            margin-top: 0.25rem;
        }

        .completion-bar {
            background: rgba(59, 130, 246, 0.08);
            border-radius: 8px;
            padding: 0.75rem;
            margin-top: 1rem;
        }

        .completion-bar-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
        }

        .progress-bar {
            height: 8px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-orange));
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .ranking-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .ranking-badge.critical { background: rgba(239,68,68,0.2);   color: #EF4444; }
        .ranking-badge.warning  { background: rgba(245,158,11,0.2);  color: #F59E0B; }
        .ranking-badge.good     { background: rgba(16,185,129,0.2);  color: #10B981; }

        /* ── Chart ── */
        .chart-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 1rem 0;
        }

        .chart-wrapper {
            position: relative;
            width: 100%;
            /* tinggi dinamis sesuai jumlah OPD */
            min-height: 200px;
        }

        /* ── Empty state ── */
        .empty-state {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 3rem;
            text-align: center;
            color: var(--text-secondary);
        }

        /* ── Print ── */
        @media print {
            .export-buttons, .filter-section, nav, aside { display: none !important; }
            .main-content { zoom: 1; -moz-transform: none; padding: 0; }
            .opd-card, .chart-container { break-inside: avoid; box-shadow: none; border: 1px solid #ddd !important; }
            body { background: white !important; color: black !important; }
        }

        @media (max-width: 768px) {
            .main-content { zoom: 1; -moz-transform: scale(1); }
            .opd-grid { grid-template-columns: 1fr; }
            .report-header { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="main-content">

        {{-- Header --}}
        <div class="report-header">
            <div>
                <h1 class="report-title">🏛️ Rekap Per OPD/Dinas</h1>
                <p style="color: var(--text-secondary); margin: 0.5rem 0 0 0; font-size:0.9rem;">
                    Evaluasi kinerja setiap organisasi perangkat daerah
                </p>
            </div>

            <div class="export-buttons">
                <a href="{{ route('admin.reports.opd.pdf', ['year' => $year, 'month' => $month]) }}"
                   target="_blank"
                   class="btn-export pdf">
                    📄 Export PDF
                </a>
                <a href="{{ route('admin.reports.opd.excel', ['year' => $year, 'month' => $month]) }}"
                   class="btn-export excel">
                    📊 Export Excel
                </a>
            </div>
        </div>

        {{-- Filter --}}
        <form method="get" class="filter-section">
            <div class="form-group">
                <label>Tahun</label>
                <select name="year" onchange="this.form.submit()">
                    @foreach($years as $y)
                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Bulan <span style="font-weight:400;">(kosongkan = tahunan)</span></label>
                <select name="month" onchange="this.form.submit()">
                    <option value="">Seluruh Tahun</option>
                    @foreach([1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
                               7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'] as $m => $label)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        @if(count($opdStats) > 0)

            {{-- OPD Cards --}}
            <div class="opd-grid">
                @foreach($opdStats as $opd)
                    <div class="opd-card">
                        <div class="opd-name">{{ $opd['opd'] }}</div>

                        <div class="opd-stats">
                            <div class="opd-stat">
                                <div class="opd-stat-value">{{ $opd['total'] }}</div>
                                <div class="opd-stat-label">Total</div>
                            </div>
                            <div class="opd-stat">
                                <div class="opd-stat-value" style="color: var(--success-color);">{{ $opd['done'] }}</div>
                                <div class="opd-stat-label">Selesai</div>
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.5rem; font-size:0.875rem; color:var(--text-secondary);">
                            <div>⏳ Proses: <strong>{{ $opd['process'] }}</strong></div>
                            <div>⏸️ Menunggu: <strong>{{ $opd['waiting'] }}</strong></div>
                        </div>

                        <div class="completion-bar">
                            <div class="completion-bar-label">
                                <span>Tingkat Penyelesaian</span>
                                <strong style="color: var(--accent-blue);">{{ $opd['completion_rate'] }}%</strong>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $opd['completion_rate'] }}%;"></div>
                            </div>

                            @if($opd['completion_rate'] < 50)
                                <span class="ranking-badge critical">⚠️ Perlu Perhatian</span>
                            @elseif($opd['completion_rate'] < 75)
                                <span class="ranking-badge warning">⏱️ Sedang Ditingkatkan</span>
                            @else
                                <span class="ranking-badge good">✅ Kinerja Baik</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Chart --}}
            <div class="chart-container">
                <h3 class="chart-title">📊 Perbandingan Kinerja OPD</h3>
                <div class="chart-wrapper" id="chartWrapper">
                    <canvas id="opdChart"></canvas>
                </div>
            </div>

        @else
            <div class="empty-state">
                <div style="font-size:3rem; margin-bottom:1rem;">🏛️</div>
                <p>Tidak ada data OPD untuk periode ini</p>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const opdStats = @json($opdStats);

        if (opdStats.length > 0) {
            const isDark    = document.documentElement.getAttribute('data-theme') !== 'light';
            const gridColor = isDark ? 'rgba(59,130,246,0.08)' : 'rgba(0,0,0,0.06)';
            const tickColor = isDark ? '#94A3B8' : '#64748b';

            // FIX: tinggi chart dinamis agar tidak gepeng kalau OPD banyak
            const chartHeight = Math.max(200, opdStats.length * 60);
            document.getElementById('chartWrapper').style.height = chartHeight + 'px';

            const ctx = document.getElementById('opdChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: opdStats.map(o => o.opd),
                    datasets: [
                        {
                            label: 'Selesai',
                            data: opdStats.map(o => o.done),
                            backgroundColor: 'rgba(16,185,129,0.7)',
                            borderColor: '#10B981',
                            borderWidth: 1,
                            borderRadius: 4,
                        },
                        {
                            label: 'Sedang Diproses',
                            data: opdStats.map(o => o.process),
                            backgroundColor: 'rgba(245,158,11,0.7)',
                            borderColor: '#F59E0B',
                            borderWidth: 1,
                            borderRadius: 4,
                        },
                        {
                            label: 'Menunggu',
                            data: opdStats.map(o => o.waiting),
                            backgroundColor: 'rgba(239,68,68,0.7)',
                            borderColor: '#EF4444',
                            borderWidth: 1,
                            borderRadius: 4,
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: {
                            labels: { color: tickColor, padding: 16, font: { size: 13 } }
                        },
                        tooltip: {
                            backgroundColor: isDark ? '#1e293b' : '#ffffff',
                            titleColor: isDark ? '#fff' : '#1e293b',
                            bodyColor: isDark ? '#94A3B8' : '#64748b',
                            borderColor: 'rgba(59,130,246,0.2)',
                            borderWidth: 1,
                            padding: 10
                        }
                    },
                    scales: {
                        x: {
                            stacked: false,
                            grid: { color: gridColor },
                            ticks: { color: tickColor }
                        },
                        y: {
                            stacked: false,
                            grid: { color: gridColor },
                            ticks: { color: tickColor }
                        }
                    }
                }
            });

            // FIX: re-render saat resize
            window.addEventListener('resize', () => chart.resize());
        }
    </script>
@endsection