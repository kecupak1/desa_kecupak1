<x-app-layout>
    <style>
        /* CSS Variables yang mendukung Dark/Light Mode */
        :root {
            /* Mode Gelap (Default) */
            --primary-bg: #0b1120;
            --main-gradient: linear-gradient(135deg, #1a2332 0%, #0f172a 100%);
            --secondary-bg: #1e293b;
            --accent-blue: #3B82F6;
            --accent-orange: #F97316;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --border-color: rgba(59, 130, 246, 0.15);
            --card-bg: rgba(30, 41, 59, 0.7);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.3);
            
            --spacing-lg: 2rem;
            --spacing-xl: 3rem;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }

        /* Mode Terang (Aktif jika layout utama diubah ke light) */
        [data-theme="light"] {
            --primary-bg: #f1f5f9;
            --main-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            --secondary-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: rgba(0, 0, 0, 0.1);
            --card-bg: rgba(255, 255, 255, 0.9);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.05);
        }

        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: var(--spacing-lg);
            animation: fadeIn 0.6s ease-out;
            background: var(--main-gradient);
            min-height: 100vh;
            transition: background 0.3s ease;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        
        .page-header { display: flex; align-items: center; gap: 1.5rem; margin-bottom: var(--spacing-xl); }
        .header-badge { background: var(--accent-blue); color: white; padding: 0.5rem 1.25rem; border-radius: var(--radius-md); font-weight: 700; font-size: 0.875rem; }
        .page-title { font-size: 2rem; font-weight: 800; color: var(--text-primary); }
        .title-highlight { color: var(--accent-orange); }
        .page-subtitle { color: var(--text-secondary); }

        .welcome-banner { 
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(249, 115, 22, 0.1) 100%); 
            border: 2px solid var(--border-color); 
            border-radius: var(--radius-lg); 
            padding: var(--spacing-lg); 
            margin-bottom: var(--spacing-xl); 
            position: relative; 
            backdrop-filter: blur(10px); 
        }
        
        .banner-border { position: absolute; left: 0; top: 0; bottom: 0; width: 6px; background: linear-gradient(180deg, var(--accent-blue) 0%, var(--accent-orange) 100%); }
        .banner-title { color: var(--text-primary); font-weight: 800; }
        .banner-subtitle { color: var(--text-secondary); }

        .dashboard-card { 
            background: var(--card-bg); 
            backdrop-filter: blur(20px); 
            border: 1px solid var(--border-color); 
            border-radius: var(--radius-xl); 
            padding: var(--spacing-xl); 
            box-shadow: var(--shadow-lg); 
            transition: background 0.3s ease;
        }

        .dashboard-header { display: grid; grid-template-columns: auto 1fr auto; gap: var(--spacing-lg); align-items: center; margin-bottom: var(--spacing-xl); padding-bottom: var(--spacing-lg); border-bottom: 2px solid var(--border-color); }
        .dashboard-title { color: var(--text-primary); font-size: 1.5rem; font-weight: 800; }
        .dashboard-location { color: var(--text-secondary); }
        .dashboard-badge { background: var(--accent-blue); color: white; padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 800; display: inline-block; margin-bottom: 0.5rem; }

        .btn-create-report { display: flex; align-items: center; gap: 0.625rem; background: var(--accent-orange); color: white; padding: 0.875rem 1.75rem; border-radius: var(--radius-md); font-weight: 700; text-decoration: none; transition: all 0.3s ease; }
        .btn-create-report:hover { transform: translateY(-2px); filter: brightness(1.1); }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--spacing-lg); }
        .stat-card { background: var(--secondary-bg); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: var(--spacing-lg); transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-4px); border-color: var(--accent-blue); }
        .stat-label { color: var(--text-secondary); font-size: 0.75rem; font-weight: 800; letter-spacing: 0.05em; }
        .stat-value { font-size: 2.5rem; font-weight: 800; color: var(--text-primary); }
        .stat-unit { color: var(--text-secondary); font-weight: 600; margin-left: 0.5rem; }

        .realtime-card { 
            background: var(--secondary-bg); 
            border: 1px solid var(--border-color); 
            border-radius: var(--radius-lg); 
            padding: var(--spacing-lg); 
            display: grid; 
            grid-template-columns: auto 1fr auto; 
            gap: var(--spacing-lg); 
            align-items: center; 
            margin-top: var(--spacing-xl); 
        }
        .realtime-title { color: var(--text-primary); font-weight: 800; }
        .realtime-subtitle { color: var(--text-secondary); }
        .btn-view-all { background: var(--accent-blue); color: white; padding: 0.75rem 1.5rem; border-radius: var(--radius-md); text-decoration: none; font-weight: 700; }
        .realtime-icon { color: var(--accent-blue); }
    </style>

    <div class="main-content">
        <div class="page-header">
            <div class="header-badge">DISKOMINFO</div>
            <div class="header-title-wrapper">
                <h1 class="page-title">E-Ticket <span class="title-highlight">Binjai</span></h1>
                <p class="page-subtitle">Pusat Layanan Terpadu</p>
            </div>
        </div>

        <div class="welcome-banner">
            <div class="banner-border"></div>
            <div class="banner-content">
                <h2 class="banner-title">BERANDA</h2>
                <p class="banner-subtitle">Pusat Layanan Terpadu DISKOMINFO Kota Binjai.</p>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-header">
                <div class="dashboard-logo">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dashboard-title-section">
                    <div class="dashboard-badge">DISKOMINFO</div>
                    <h2 class="dashboard-title">Dashboard <span class="title-admin" style="color: var(--accent-orange)">{{ auth()->user()->role === 'admin' ? 'Admin' : 'User' }}</span></h2>
                    <p class="dashboard-location">Kota Binjai - Sistem Pelaporan Terintegrasi</p>
                </div>
                <div class="dashboard-actions">
                    @php
                        $createRoute = auth()->user()->role === 'admin' ? 'admin.tickets.create' : 'tickets.create';
                    @endphp
                    <a href="{{ Route::has($createRoute) ? route($createRoute) : route('tickets.create') }}" class="btn-create-report">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        BUAT LAPORAN
                    </a>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">TOTAL MASUK</div>
                    <div class="stat-value-wrapper flex items-baseline">
                        <h3 class="stat-value">{{ $stats['total'] }}</h3>
                        <span class="stat-unit">Tiket</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-label" style="color: var(--accent-orange)">MENUNGGU</div>
                    <div class="stat-value-wrapper flex items-baseline">
                        <h3 class="stat-value">{{ $stats['waiting'] }}</h3>
                        <span class="stat-unit">Urgent</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-label" style="color: #10B981">RESOLVED</div>
                    <div class="stat-value-wrapper flex items-baseline">
                        <h3 class="stat-value">{{ $stats['done'] }}</h3>
                        <span class="stat-unit">Selesai</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-label" style="color: var(--accent-blue)">USER AKTIF</div>
                    <div class="stat-value-wrapper flex items-baseline">
                        <h3 class="stat-value">{{ \App\Models\User::count() }}</h3>
                        <span class="stat-unit">OPD</span>
                    </div>
                </div>
            </div>

            <div class="realtime-card">
                <div class="realtime-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="realtime-content">
                    <h3 class="realtime-title">Laporan Masuk Real-Time</h3>
                    <p class="realtime-subtitle">Update otomatis setiap detik</p>
                </div>
                @php
                    $indexRoute = auth()->user()->role === 'admin' ? 'admin.tickets.index' : 'tickets.index';
                @endphp
                <a href="{{ Route::has($indexRoute) ? route($indexRoute) : route('tickets.index') }}" class="btn-view-all">
                    LIHAT SEMUA
                </a>
            </div>
        </div>
    </div>
</x-app-layout>