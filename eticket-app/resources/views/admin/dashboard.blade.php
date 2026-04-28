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
            --inner-card-bg: rgba(15, 23, 42, 0.4); 
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.3);
            --spacing-lg: 1.25rem;
            --spacing-xl: 2rem;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 20px;
        }

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

        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 1.5rem; 
        }

        @media (max-width: 1200px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { .stats-grid { grid-template-columns: 1fr; } }
        
        .stat-card { 
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.9) 0%, rgba(37, 99, 235, 0.85) 100%);
            border: none;
            border-radius: 20px; 
            padding: 2rem 1.75rem; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%; right: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat-card:hover::before { opacity: 1; }
        .stat-card:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4); }

        .stat-card.orange { background: linear-gradient(135deg, rgba(249, 115, 22, 0.9) 0%, rgba(234, 88, 12, 0.85) 100%); box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3); }
        .stat-card.orange:hover { box-shadow: 0 15px 40px rgba(249, 115, 22, 0.4); }
        .stat-card.green { background: linear-gradient(135deg, rgba(16, 185, 129, 0.9) 0%, rgba(5, 150, 105, 0.85) 100%); box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3); }
        .stat-card.green:hover { box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4); }
        .stat-card.cyan { background: linear-gradient(135deg, rgba(6, 182, 212, 0.9) 0%, rgba(8, 145, 178, 0.85) 100%); box-shadow: 0 10px 30px rgba(6, 182, 212, 0.3); }
        .stat-card.cyan:hover { box-shadow: 0 15px 40px rgba(6, 182, 212, 0.4); }

        .stat-icon { width: 48px; height: 48px; background: rgba(255, 255, 255, 0.15); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; backdrop-filter: blur(10px); }
        .stat-icon svg { width: 24px; height: 24px; stroke: white; }
        .stat-label { color: rgba(255, 255, 255, 0.95); font-size: 0.75rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 0.75rem; }
        .stat-value { font-size: 2.75rem; font-weight: 800; color: white; line-height: 1; margin-bottom: 0.25rem; }
        .stat-description { color: rgba(255, 255, 255, 0.85); font-size: 0.875rem; font-weight: 500; margin-top: 0.5rem; }

        .realtime-card { background: var(--inner-card-bg); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.25rem; display: grid; grid-template-columns: auto 1fr auto; gap: var(--spacing-lg); align-items: center; margin-top: var(--spacing-xl); }
        .realtime-title { color: var(--text-primary); font-weight: 800; font-size: 1rem; }
        .realtime-subtitle { color: var(--text-secondary); font-size: 0.875rem; }
        .btn-view-all { background: var(--accent-blue); color: white; padding: 0.6rem 1.25rem; border-radius: var(--radius-md); text-decoration: none; font-weight: 700; font-size: 0.875rem; transition: 0.3s; }
        .btn-view-all:hover { opacity: 0.9; transform: translateX(3px); }
        .realtime-icon { color: var(--accent-blue); }
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
                    <h2 class="dashboard-title">Dashboard <span style="color: var(--accent-orange)">Admin</span></h2>
                    <p class="dashboard-location">Kota Binjai - Sistem Pelaporan Terintegrasi</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="stat-label">TOTAL TIKET</div>
                    <h3 class="stat-value">{{ $stats['total'] }}</h3>
                    <div class="stat-description">Semua laporan</div>
                </div>

                <div class="stat-card orange">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-label">MENUNGGU</div>
                    <h3 class="stat-value">{{ $stats['waiting'] }}</h3>
                    <div class="stat-description">Belum diproses</div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-label">TUNTAS</div>
                    <h3 class="stat-value">{{ $stats['done'] }}</h3>
                    <div class="stat-description">Selesai ditangani</div>
                </div>

                <div class="stat-card cyan">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="stat-label">USER AKTIF</div>
                    <h3 class="stat-value">{{ \App\Models\User::count() }}</h3>
                    <div class="stat-description">OPD Terdaftar</div>
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
                <a href="{{ route('admin.tickets.index') }}" class="btn-view-all">
                    LIHAT SEMUA
                </a>
            </div>
        </div>
    </div>

@endsection