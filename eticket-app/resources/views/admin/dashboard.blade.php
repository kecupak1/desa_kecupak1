<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b1120;
            color: #f8fafc;
        }

        /* Main Container */
        .dashboard-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(59, 130, 246, 0.2);
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #94a3b8;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .welcome-content h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .welcome-action .btn-primary {
            background: white;
            color: #1e40af;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .welcome-action .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            padding: 1.75rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.4);
            background: rgba(30, 41, 59, 0.8);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card:nth-child(1) .stat-icon { background: rgba(59, 130, 246, 0.2); color: #60a5fa; }
        .stat-card:nth-child(2) .stat-icon { background: rgba(251, 146, 60, 0.2); color: #fb923c; }
        .stat-card:nth-child(3) .stat-icon { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
        .stat-card:nth-child(4) .stat-icon { background: rgba(168, 85, 247, 0.2); color: #c084fc; }

        .stat-label {
            font-size: 0.875rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-card:nth-child(1) .stat-value { color: #60a5fa; }
        .stat-card:nth-child(2) .stat-value { color: #fb923c; }
        .stat-card:nth-child(3) .stat-value { color: #4ade80; }
        .stat-card:nth-child(4) .stat-value { color: #c084fc; }

        .stat-footer {
            padding-top: 0.75rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.8125rem;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .welcome-banner { flex-direction: column; text-align: center; gap: 1.5rem; }
        }
    </style>

    <div class="dashboard-container">
        <div class="page-header">
            <h1>Dashboard Administrator</h1>
            <div class="breadcrumb">
                <span>Beranda › Dashboard</span>
            </div>
        </div>

        <div class="welcome-banner">
            <div class="welcome-content">
                <h2>Selamat Datang di Sistem E-Ticket</h2>
                <p>Portal Layanan Teknologi Informasi DISKOMINFO Kota Binjai</p>
            </div>
            <div class="welcome-action">
                <a href="{{ route('tickets.create') }}" class="btn-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Buat Laporan Baru
                </a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-content">
                        <span class="stat-label">Total Tiket</span>
                        <div class="stat-value">{{ $stats['total'] }}</div>
                    </div>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-footer"><span>📊 Seluruh sistem</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-content">
                        <span class="stat-label">Menunggu</span>
                        <div class="stat-value">{{ $stats['waiting'] }}</div>
                    </div>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-footer"><span>⏱️ Perlu atensi</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-content">
                        <span class="stat-label">Selesai</span>
                        <div class="stat-value">{{ $stats['done'] }}</div>
                    </div>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-footer"><span>✅ Laporan selesai</span></div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-content">
                        <span class="stat-label">Pengguna</span>
                        <div class="stat-value">{{ \App\Models\User::count() }}</div>
                    </div>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="stat-footer"><span>👥 Instansi OPD</span></div>
            </div>
        </div>
    </div>
</x-app-layout>