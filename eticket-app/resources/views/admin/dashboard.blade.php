<x-app-layout>
    <style>
        /* CSS Variables yang mendukung Dark/Light Mode */
        :root {
            /* Mode Gelap (Default) */
            --primary-bg: #0b1120;
            --secondary-bg: #1e293b;
            --accent-blue: #3B82F6;
            --accent-orange: #F97316;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --border-color: rgba(59, 130, 246, 0.15);
            --card-bg: rgba(30, 41, 59, 0.7);
            --inner-card-bg: rgba(15, 23, 42, 0.4); 
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.3);
            
            --spacing-lg: 1.25rem;
            --spacing-xl: 2rem;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 20px;
        }

        /* Mode Terang */
        [data-theme="light"] {
            --primary-bg: #f1f5f9;
            --secondary-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: rgba(0, 0, 0, 0.05);
            --card-bg: #ffffff;
            --inner-card-bg: #f8fafc; 
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.03);
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: var(--spacing-lg);
            animation: fadeIn 0.6s ease-out;
            background: transparent; 
            min-height: 100vh;
            /* Skala dinaikkan menjadi 1.05 untuk efek zoom in */
            zoom: 1.05;
            -moz-transform: scale(1.05);
            -moz-transform-origin: top center;
        }

        .main-content::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 50% -20%, rgba(59, 130, 246, 0.15), transparent 70%);
            z-index: -1;
            pointer-events: none;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
        
        .page-header { display: flex; align-items: center; gap: 1.25rem; margin-bottom: var(--spacing-xl); }
        .page-title { font-size: 1.75rem; font-weight: 800; color: var(--text-primary); }
        .title-highlight { color: var(--accent-orange); }
        .page-subtitle { color: var(--text-secondary); font-size: 0.875rem; }

        .welcome-banner { 
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(249, 115, 22, 0.08) 100%); 
            border: 1px solid var(--border-color); 
            border-radius: var(--radius-lg); 
            padding: 1.25rem var(--spacing-lg); 
            margin-bottom: var(--spacing-xl); 
            position: relative; 
            backdrop-filter: blur(8px); 
        }
        
        .banner-border { position: absolute; left: 0; top: 0; bottom: 0; width: 4px; border-radius: 4px 0 0 4px; background: linear-gradient(180deg, var(--accent-blue) 0%, var(--accent-orange) 100%); }
        .banner-title { color: var(--text-primary); font-weight: 800; font-size: 1.1rem; }
        .banner-subtitle { color: var(--text-secondary); font-size: 0.875rem; }

        .dashboard-card { 
            background: var(--card-bg); 
            backdrop-filter: blur(20px); 
            border: 1px solid var(--border-color); 
            border-radius: var(--radius-xl); 
            padding: var(--spacing-xl); 
            box-shadow: var(--shadow-lg); 
        }

        .dashboard-header { display: grid; grid-template-columns: auto 1fr; gap: var(--spacing-lg); align-items: center; margin-bottom: var(--spacing-xl); padding-bottom: var(--spacing-lg); border-bottom: 1px solid var(--border-color); }
        .dashboard-title { color: var(--text-primary); font-size: 1.25rem; font-weight: 800; }
        .dashboard-location { color: var(--text-secondary); font-size: 0.875rem; }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-lg); }
        .stat-card { background: var(--inner-card-bg); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.25rem; transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-4px); border-color: var(--accent-blue); }
        .stat-label { color: var(--text-secondary); font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em; }
        .stat-value { font-size: 2rem; font-weight: 800; color: var(--text-primary); }
        .stat-unit { color: var(--text-secondary); font-weight: 600; font-size: 0.875rem; margin-left: 0.4rem; }

        .realtime-card { 
            background: var(--inner-card-bg); 
            border: 1px solid var(--border-color); 
            border-radius: var(--radius-lg); 
            padding: 1.25rem; 
            display: grid; 
            grid-template-columns: auto 1fr auto; 
            gap: var(--spacing-lg); 
            align-items: center; 
            margin-top: var(--spacing-xl); 
        }
        .realtime-title { color: var(--text-primary); font-weight: 800; font-size: 1rem; }
        .realtime-subtitle { color: var(--text-secondary); font-size: 0.875rem; }
        .btn-view-all { background: var(--accent-blue); color: white; padding: 0.6rem 1.25rem; border-radius: var(--radius-md); text-decoration: none; font-weight: 700; font-size: 0.875rem; transition: 0.3s; }
        .btn-view-all:hover { opacity: 0.9; transform: translateX(3px); }
        .realtime-icon { color: var(--accent-blue); }
        
        [data-theme="light"] .dashboard-logo svg { stroke: var(--accent-blue); }
    </style>

    <div class="main-content">
        <div class="page-header">
            <div class="header-title-wrapper">
                <h1 class="page-title">E-Ticket <span class="title-highlight">Binjai</span></h1>
                <p class="page-subtitle">Pusat Layanan Terpadu</p>
            </div>
        </div>

        <div class="welcome-banner">
            <div class="banner-border"></div>
            <div class="banner-content">
                <h2 class="banner-title">BERANDA</h2>
                <p class="banner-subtitle">Pusat Layanan Terpadu Kota Binjai.</p>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-header">
                <div class="dashboard-logo">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dashboard-title-section">
                    <h2 class="dashboard-title">Dashboard <span class="title-admin" style="color: var(--accent-orange)">{{ auth()->user()->role === 'admin' ? 'Admin' : 'User' }}</span></h2>
                    <p class="dashboard-location">Kota Binjai - Sistem Pelaporan Terintegrasi</p>
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
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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