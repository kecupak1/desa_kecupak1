<x-app-layout>
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
        }

        [data-theme="light"] {
            --primary-bg: #f1f5f9;
            --secondary-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
            --card-bg: #ffffff;
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
        }

        .report-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-primary);
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

        .form-group select {
            padding: 0.625rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: rgba(15, 23, 42, 0.4);
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .form-group select:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            text-align: center;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--accent-blue);
        }

        .stat-unit {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
        }

        .chart-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            height: 400px;
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .breakdown-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .breakdown-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            height: 400px;
        }

        .breakdown-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .breakdown-table {
            font-size: 0.875rem;
        }

        .breakdown-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .breakdown-table th {
            text-align: left;
            padding: 0.5rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-weight: 600;
        }

        .breakdown-table td {
            padding: 0.5rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
        }

        .breakdown-table tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .export-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-export {
            padding: 0.625rem 1.5rem;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--accent-blue);
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-export:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: var(--accent-blue);
        }

        .empty-state {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 2rem;
            text-align: center;
            color: var(--text-secondary);
        }

        @media (max-width: 768px) {
            .main-content {
                zoom: 1;
                -moz-transform: scale(1);
            }
            .breakdown-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="main-content">
        <div class="report-header">
            <div>
                <h1 class="report-title">⏱️ Metrik Waktu Penanganan (SLA)</h1>
                <p style="color: var(--text-secondary); margin: 0.5rem 0 0 0;">Analisis efektivitas sistem berdasarkan waktu penyelesaian</p>
            </div>
            <div class="export-buttons">
                <button class="btn-export" onclick="exportPDF()">
                    📄 Export PDF
                </button>
                <button class="btn-export" onclick="exportExcel()">
                    📊 Export Excel
                </button>
            </div>
        </div>

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
                <label>Bulan (Kosongkan untuk Tahunan)</label>
                <select name="month" onchange="this.form.submit()">
                    <option value="">Seluruh Tahun</option>
                    <option value="1" {{ $month == 1 ? 'selected' : '' }}>Januari</option>
                    <option value="2" {{ $month == 2 ? 'selected' : '' }}>Februari</option>
                    <option value="3" {{ $month == 3 ? 'selected' : '' }}>Maret</option>
                    <option value="4" {{ $month == 4 ? 'selected' : '' }}>April</option>
                    <option value="5" {{ $month == 5 ? 'selected' : '' }}>Mei</option>
                    <option value="6" {{ $month == 6 ? 'selected' : '' }}>Juni</option>
                    <option value="7" {{ $month == 7 ? 'selected' : '' }}>Juli</option>
                    <option value="8" {{ $month == 8 ? 'selected' : '' }}>Agustus</option>
                    <option value="9" {{ $month == 9 ? 'selected' : '' }}>September</option>
                    <option value="10" {{ $month == 10 ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ $month == 11 ? 'selected' : '' }}>November</option>
                    <option value="12" {{ $month == 12 ? 'selected' : '' }}>Desember</option>
                </select>
            </div>
        </form>

        @if($slaData['total_completed'] > 0)
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Total Selesai</div>
                    <div class="stat-value">{{ $slaData['total_completed'] }}</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Rata-Rata Hari</div>
                    <div class="stat-value">{{ $slaData['average_days'] }}</div>
                    <div class="stat-unit">hari</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Tercepat</div>
                    <div class="stat-value">{{ $slaData['min_days'] }}</div>
                    <div class="stat-unit">hari</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Terlama</div>
                    <div class="stat-value">{{ $slaData['max_days'] }}</div>
                    <div class="stat-unit">hari</div>
                </div>

                <div class="stat-card">
                    <div class="stat-label">Median</div>
                    <div class="stat-value">{{ $slaData['median_days'] }}</div>
                    <div class="stat-unit">hari</div>
                </div>
            </div>

            <!-- Monthly SLA Trend -->
            <div class="chart-container">
                <h3 class="chart-title">📊 Tren SLA Bulanan Tahun {{ $year }}</h3>
                <canvas id="slaChart"></canvas>
            </div>

            <!-- SLA Breakdown -->
            <div class="breakdown-container">
                <!-- By Priority -->
                <div class="breakdown-card">
                    <h3 class="breakdown-title">📌 SLA Berdasarkan Prioritas</h3>
                    <div class="breakdown-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Prioritas</th>
                                    <th>Total</th>
                                    <th>Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($slaByPriority as $priority)
                                    <tr>
                                        <td>{{ ucfirst($priority->priority) }}</td>
                                        <td>{{ $priority->total }}</td>
                                        <td>{{ round($priority->avg_days, 2) }} hari</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: var(--text-secondary);">-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- By Category -->
                <div class="breakdown-card">
                    <h3 class="breakdown-title">📂 SLA Berdasarkan Kategori</h3>
                    <div class="breakdown-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Total</th>
                                    <th>Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($slaByCategory as $category)
                                    <tr>
                                        <td>{{ $category->category }}</td>
                                        <td>{{ $category->total }}</td>
                                        <td>{{ round($category->avg_days, 2) }} hari</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: var(--text-secondary);">-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- By OPD -->
                <div class="breakdown-card">
                    <h3 class="breakdown-title">🏛️ SLA Berdasarkan OPD</h3>
                    <div class="breakdown-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>OPD</th>
                                    <th>Total</th>
                                    <th>Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($slaByOpd as $opd)
                                    <tr>
                                        <td>{{ $opd->opd }}</td>
                                        <td>{{ $opd->total }}</td>
                                        <td>{{ round($opd->avg_days, 2) }} hari</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; color: var(--text-secondary);">-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="empty-state">
                <p>📊 Belum ada data ticket yang selesai untuk periode ini</p>
                <p style="font-size: 0.875rem; margin-top: 0.5rem;">
                    Metrik SLA akan ditampilkan setelah ada ticket dengan status "Selesai" dan tanggal penyelesaian tercatat.
                </p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if($slaData['total_completed'] > 0)
        const monthlySLATrend = @json($monthlySLATrend);
        const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const ctx = document.getElementById('slaChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Rata-Rata Hari Penyelesaian',
                    data: monthlySLATrend,
                    borderColor: '#F97316',
                    backgroundColor: 'rgba(249, 115, 22, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#F97316',
                    pointBorderColor: '#FFFFFF',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#94A3B8' }
                    }
                },
                scales: {
                    y: {
                        grid: { color: 'rgba(59, 130, 246, 0.1)' },
                        ticks: { color: '#94A3B8' },
                        title: { display: true, text: 'Hari', color: '#94A3B8' }
                    },
                    x: {
                        grid: { color: 'rgba(59, 130, 246, 0.1)' },
                        ticks: { color: '#94A3B8' }
                    }
                }
            }
        });
        @endif

        function exportPDF() {
            window.print();
        }

        function exportExcel() {
            alert('Fitur Excel export akan segera ditambahkan!');
        }
    </script>
</x-app-layout>
