<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Ticket Binjai | DISKOMINFO Premium</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0b1120;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            
            /* Variabel Warna Dinamis */
            --bg-main: var(--primary-dark);
            --bg-sidebar: rgba(15, 23, 42, 0.95);
            --bg-header: rgba(15, 23, 42, 0.9);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-ui: rgba(59, 130, 246, 0.15);
            --card-bg: rgba(30, 41, 59, 0.5);
        }

        /* Mode Terang */
        [data-theme="light"] {
            --bg-main: #f1f5f9;
            --bg-sidebar: rgba(255, 255, 255, 0.95);
            --bg-header: rgba(255, 255, 255, 0.9);
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-ui: rgba(0, 0, 0, 0.1);
            --card-bg: rgba(255, 255, 255, 0.8);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background: var(--bg-main);
            background-image: 
                radial-gradient(circle at 20% 10%, rgba(59, 130, 246, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 80% 90%, rgba(249, 115, 22, 0.06) 0%, transparent 40%);
            margin: 0;
            overflow-x: hidden;
            color: var(--text-main);
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-sidebar);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border-ui);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Sidebar Saat Tertutup (Mini) */
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar.collapsed .logo-text,
        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .nav-section-title,
        .sidebar.collapsed .logout-btn span {
            opacity: 0;
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 0.875rem 0;
            margin: 0.25rem 0.75rem;
        }

        .sidebar.collapsed .logo-wrapper {
            justify-content: center;
        }

        .sidebar-header {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid var(--border-ui);
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.05) 0%, transparent 100%);
            transition: padding 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logo-icon img {
            /* Ukuran diperbesar dari 34px ke 44px agar lebih jelas */
            width: 44px;
            height: auto;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar.collapsed .logo-icon {
            transform: scale(0.9);
        }

        .sidebar.collapsed .logo-icon img {
            transform: rotate(360deg);
        }

        .logo-text h1 {
            font-size: 1.125rem;
            font-weight: 800;
            color: var(--text-main);
            line-height: 1.2;
            letter-spacing: -0.02em;
            margin-bottom: 2px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .logo-text p {
            font-size: 0.6875rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 1.5rem 0;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(59, 130, 246, 0.2);
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: rgba(59, 130, 246, 0.3);
        }

        .nav-section {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        .nav-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .nav-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .nav-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-section-title {
            padding: 0 1.5rem 0.75rem;
            font-size: 0.6875rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: all 0.3s ease;
            overflow: hidden;
            white-space: nowrap;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.875rem 1.5rem;
            margin: 0.25rem 1rem;
            border-radius: 10px;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.9375rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(180deg, #60a5fa 0%, #3b82f6 100%);
            transform: scaleY(0);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::before {
            transform: scaleY(1);
        }

        .nav-link span {
            transition: all 0.3s ease;
            overflow: hidden;
            white-space: nowrap;
        }

        .nav-link svg {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .nav-link:hover {
            color: var(--text-main);
            background: rgba(59, 130, 246, 0.05);
            transform: translateX(4px);
        }

        .nav-link:hover svg {
            transform: scale(1.1) rotate(5deg);
        }

        .nav-link.active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.05) 100%);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
            transform: translateX(4px);
        }

        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link.active svg {
            transform: scale(1.05);
        }

        /* ========== TOP HEADER ========== */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-wrapper.full-width {
            margin-left: var(--sidebar-collapsed-width);
        }

        .top-header {
            height: 72px;
            background: var(--bg-header);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid var(--border-ui);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .menu-toggle {
            padding: 0.625rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-ui);
            color: var(--text-muted);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-toggle:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.4);
            transform: rotate(90deg);
        }

        .menu-toggle:active {
            transform: rotate(90deg) scale(0.95);
        }

        .header-brand h2 {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-main);
            text-transform: uppercase;
        }

        .header-brand h2 span {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Theme Toggle Button */
        .theme-toggle-btn {
            margin-right: 1rem;
            padding: 0.625rem;
            background: rgba(59, 130, 246, 0.05);
            border: 1px solid var(--border-ui);
            color: var(--text-main);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .theme-toggle-btn:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.4);
            transform: rotate(180deg) scale(1.1);
        }

        .theme-toggle-btn:active {
            transform: rotate(180deg) scale(0.95);
        }

        /* User Profile */
        .user-profile-wrapper {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .user-profile-btn {
            background: var(--card-bg);
            border: 1px solid var(--border-ui);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .user-profile-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
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
            color: white;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .user-profile-btn:hover .user-avatar {
            transform: scale(1.05);
        }

        .user-role {
            font-size: 0.6875rem;
            font-weight: 700;
            color: #f97316;
            text-transform: uppercase;
        }

        .user-name {
            font-size: 0.9375rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .sidebar-footer {
            padding: 1rem 1rem 1.5rem;
            border-top: 1px solid var(--border-ui);
            transition: padding 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logout-btn {
            width: 100%;
            padding: 0.875rem;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            border-radius: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .logout-btn:hover::before {
            left: 100%;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        .logout-btn svg {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .logout-btn:hover svg {
            transform: translateX(4px);
        }

        .logout-btn span {
            transition: all 0.3s ease;
        }

        .badge-notification {
            background: #ef4444;
            color: white;
            font-size: 0.65rem;
            padding: 2px 6px;
            border-radius: 6px;
            margin-left: auto;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }
        }

        .sidebar.collapsed .badge-notification {
            position: absolute;
            top: 5px;
            right: 5px;
            margin-left: 0;
        }
    </style>
</head>
<body>

    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div class="logo-wrapper">
                <div class="logo-icon">
                    <img src="{{ asset('images/binjai.png') }}" alt="Binjai">
                </div>
                <div class="logo-text">
                    <h1>E-TICKET</h1>
                    <p>DISKOMINFO</p>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Menu Utama</div>
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                @if(isset(Auth::user()->role) && strtolower(trim(Auth::user()->role)) === 'user')
                <a href="{{ route('tickets.create') }}" class="nav-link {{ request()->is('tickets/create') ? 'active' : '' }}">
                    <svg class="nav-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Buat Laporan</span>
                </a>
                @endif
            </div>

            @if(isset(Auth::user()->role) && strtolower(trim(Auth::user()->role)) === 'admin')
                <div class="nav-section">
                    <div class="nav-section-title">Administrator</div>
                    <a href="/tickets" class="nav-link {{ request()->is('tickets') ? 'active' : '' }}">
                        <svg class="nav-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <span>Kelola Tiket</span>
                        <span class="badge-notification">{{ \App\Models\Ticket::count() }}</span>
                    </a>
                </div>
            @endif

            <div class="nav-section">
                <div class="nav-section-title">Akun & Layanan</div>
                <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                    <svg class="nav-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Profil Saya</span>
                </a>
            </div>
        </nav>

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

    <div id="mainWrapper" class="main-wrapper">
        <header class="top-header">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
            </button>

            <div class="header-brand ml-4">
                <h2>E-TICKET <span>BINJAI</span></h2>
            </div>

            <div class="user-profile-wrapper">
                <button class="theme-toggle-btn" onclick="toggleTheme()" id="themeBtn">
                    <svg id="themeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"></svg>
                </button>

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

        <main class="content-wrapper p-8">
            <div class="content-container max-w-[1400px] mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        // === LOGIKA DARK/LIGHT MODE ===
        const htmlElement = document.documentElement;
        const themeIcon = document.getElementById('themeIcon');
        
        const savedTheme = localStorage.getItem('theme') || 'dark';
        htmlElement.setAttribute('data-theme', savedTheme);
        updateThemeIcon(savedTheme);

        function toggleTheme() {
            const currentTheme = htmlElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        function updateThemeIcon(theme) {
            if (theme === 'light') {
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>';
            } else {
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.364 17.636l-.707.707M6.364 6.364l.707.707m12.728 12.728l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path>';
            }
        }

        // === LOGIKA SIDEBAR TERTUTUP (MINI) ===
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const wrapper = document.getElementById('mainWrapper');
            
            sidebar.classList.toggle('collapsed');
            wrapper.classList.toggle('full-width');
        }

        function confirmLogout() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: "Sesi Anda akan diakhiri secara aman.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3b82f6',
                background: currentTheme === 'dark' ? '#1e293b' : '#fff',
                color: currentTheme === 'dark' ? '#fff' : '#000',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            })
        }
    </script>
</body>
</html>