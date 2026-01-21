<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Ticket Binjai | DISKOMINFO Premium</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0b1120;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background: var(--primary-dark);
            background-image: 
                radial-gradient(circle at 20% 10%, rgba(59, 130, 246, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 80% 90%, rgba(249, 115, 22, 0.06) 0%, transparent 40%);
            margin: 0;
            overflow-x: hidden;
            color: #f8fafc;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(59, 130, 246, 0.15);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        /* Logo Section */
        .sidebar-header {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.05) 0%, transparent 100%);
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .logo-icon img {
            width: 28px;
            height: auto;
        }

        .logo-text h1 {
            font-size: 1.125rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
            letter-spacing: -0.02em;
            margin-bottom: 2px;
        }

        .logo-text p {
            font-size: 0.6875rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        /* Navigation */
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem 0;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(59, 130, 246, 0.3);
            border-radius: 4px;
        }

        .nav-section {
            margin-bottom: 1.5rem;
        }

        .nav-section-title {
            padding: 0 1.5rem 0.75rem;
            font-size: 0.6875rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.875rem 1.5rem;
            margin: 0.25rem 1rem;
            border-radius: 10px;
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.9375rem;
            transition: all 0.2s ease;
            text-decoration: none;
            position: relative;
        }

        .nav-link:hover {
            color: #e2e8f0;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.05) 100%);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            background: #60a5fa;
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
        }

        .badge-notification {
            margin-left: auto;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            font-size: 0.6875rem;
            font-weight: 800;
            padding: 0.25rem 0.625rem;
            border-radius: 6px;
            min-width: 24px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(249, 115, 22, 0.4);
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 1rem 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .logout-btn {
            width: 100%;
            padding: 0.875rem;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #ef4444;
            border-color: #ef4444;
            color: white;
        }

        /* ========== TOP HEADER ========== */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .main-wrapper.full-width {
            margin-left: 0;
        }

        .top-header {
            height: 72px;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid rgba(59, 130, 246, 0.15);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .menu-toggle {
            padding: 0.625rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-right: 1.5rem;
        }

        .menu-toggle:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
            color: #60a5fa;
        }

        .header-brand h2 {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.02em;
        }

        .header-brand h2 span {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* User Profile */
        .user-profile-wrapper {
            margin-left: auto;
        }

        .user-profile-btn {
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .user-profile-btn:hover {
            background: rgba(30, 41, 59, 0.8);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9375rem;
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .user-info {
            text-align: left;
        }

        .user-role {
            font-size: 0.6875rem;
            font-weight: 700;
            color: #f97316;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            line-height: 1;
            margin-bottom: 4px;
        }

        .user-name {
            font-size: 0.9375rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1;
        }

        /* ========== MAIN CONTENT ========== */
        .content-wrapper {
            padding: 2rem;
        }

        .content-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            z-index: 999;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .main-wrapper {
                margin-left: 0;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .top-header {
                padding: 0 1rem;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .header-brand h2 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebarOverlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <!-- Logo Section -->
        <div class="sidebar-header">
            <div class="logo-wrapper">
                <div class="logo-icon">
                    <img src="{{ asset('images/kominfo.png') }}" alt="DISKOMINFO">
                </div>
                <div class="logo-text">
                    <h1>DISKOMINFO</h1>
                    <p>Kota Binjai</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Menu Utama</div>
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>

            @if(Auth::user()->role == 'admin')
                <div class="nav-section">
                    <div class="nav-section-title">Administrator</div>
                    <a href="/tickets" class="nav-link {{ request()->is('tickets') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <span>Kelola Tiket</span>
                        <span class="badge-notification">{{ \App\Models\Ticket::count() }}</span>
                    </a>
                </div>
            @endif

            @if(Auth::user()->role == 'user')
                <div class="nav-section">
                    <div class="nav-section-title">Layanan Saya</div>
                    <a href="/tickets/create" class="nav-link {{ request()->is('tickets/create') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Buat Laporan</span>
                    </a>
                    <a href="/my-tickets" class="nav-link {{ request()->is('my-tickets') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Riwayat Tiket</span>
                    </a>
                </div>
            @endif
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <button onclick="confirmLogout()" class="logout-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Keluar Sistem</span>
            </button>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div id="mainWrapper" class="main-wrapper">
        <!-- Top Header -->
        <header class="top-header">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
            </button>

            <div class="header-brand">
                <h2>E-TICKET <span>DISKOMINFO</span></h2>
            </div>

            <div class="user-profile-wrapper">
                <div class="user-profile-btn">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <div class="user-role">{{ Auth::user()->role }}</div>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="content-wrapper">
            <div class="content-container">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const wrapper = document.getElementById('mainWrapper');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (window.innerWidth >= 1024) {
                sidebar.classList.toggle('hidden');
                wrapper.classList.toggle('full-width');
            } else {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            }
        }

        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: "Sesi Anda akan diakhiri secara aman.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3b82f6',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                background: '#1e293b',
                color: '#fff',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            })
        }

        // Close sidebar on outside click (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth < 1024 && 
                sidebar.classList.contains('active') && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target)) {
                toggleSidebar();
            }
        });
    </script>
</body>
</html>