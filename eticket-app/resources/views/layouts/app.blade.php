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
            --diskominfo-navy: #1e3a8a;
            --diskominfo-blue: #1e40af;
            --diskominfo-orange: #f97316;
            --sidebar-width: 320px;
        }

        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e0f2fe 50%, #fed7aa 100%);
            margin: 0;
            overflow-x: hidden;
        }

        /* --- KEYFRAME ANIMATIONS --- */
        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(249, 115, 22, 0.2); }
            50% { box-shadow: 0 0 30px rgba(249, 115, 22, 0.4); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes signal-pulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        /* --- SIDEBAR CONFIG --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--diskominfo-navy) 0%, var(--diskominfo-blue) 100%);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.6s ease-out;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(249, 115, 22, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(249, 115, 22, 0.1) 0%, transparent 40%);
            pointer-events: none;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }
/* --- REDESIGNED LOGO SECTION --- */
.sidebar-logo-section {
    padding: 2.5rem 1.5rem; /* Padding lebih proporsional */
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.08) 0%, transparent 100%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
}

.sidebar-logo-container {
    background: #ffffff;
    padding: 1rem;
    border-radius: 1.25rem; /* Siku sedikit lebih tegas tapi tetap modern */
    box-shadow: 
        0 10px 25px -5px rgba(0, 0, 0, 0.2),
        0 8px 10px -6px rgba(0, 0, 0, 0.1),
        inset 0 0 0 1px rgba(255, 255, 255, 0.5); /* Inner border untuk efek kristal */
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 85px;  /* Ukuran tetap agar tidak merusak layout sidebar */
    height: 85px;
    position: relative;
}

/* Efek Hover: Logo sedikit naik dan bersinar */
.sidebar-logo-container:hover {
    transform: translateY(-5px) rotate(2deg);
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.25);
    background: #f8fafc;
}

/* Dekorasi Tambahan di belakang logo */
.sidebar-logo-container::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: linear-gradient(135deg, var(--orange-primary), var(--orange-light));
    border-radius: 1.5rem;
    z-index: -1;
    opacity: 0.3;
    filter: blur(8px);
}

        .sidebar-logo-container:hover {
            /* transform: scale(1.05) rotate(-2deg); */
        }

        /* --- MAIN CONTENT ADJUSTMENT --- */
        .main-wrapper {
            transition: margin-left 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .main-wrapper.full-width {
            margin-left: 0;
        }

        /* --- NAV SECTION LABELS --- */
        .nav-section-label {
            padding: 0.5rem 1.5rem;
            margin: 1.5rem 1rem 0.5rem;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--diskominfo-orange);
            background: rgba(249, 115, 22, 0.1);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* --- NAV LINKS --- */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            margin: 0.375rem 1rem;
            border-radius: 1rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.2) 0%, rgba(251, 146, 60, 0.2) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-link:hover::before {
            opacity: 1;
        }

        .nav-link:hover {
            color: white;
            transform: translateX(8px);
            box-shadow: 0 4px 20px rgba(249, 115, 22, 0.3);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--diskominfo-orange) 0%, #fb923c 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4);
            animation: pulse-glow 2s infinite;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .nav-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .badge {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            font-size: 10px;
            padding: 4px 10px;
            border-radius: 20px;
            margin-left: auto;
            font-weight: 800;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.4);
            animation: pulse-glow 2s infinite;
        }

        /* --- LOGOUT SECTION --- */
        .logout-section {
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.2);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .logout-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(220, 38, 38, 0.2) 100%);
            border: 2px solid rgba(239, 68, 68, 0.3);
            color: white;
            border-radius: 1rem;
            font-weight: 700;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-color: #dc2626;
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
            transform: translateY(-2px);
        }

        /* --- TOP HEADER --- */
        .top-header {
            height: 90px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .hamburger-btn {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            background: white;
            margin-right: 1.5rem;
            color: var(--diskominfo-navy);
        }

        .hamburger-btn:hover {
            background: var(--diskominfo-navy);
            color: white;
            border-color: var(--diskominfo-navy);
            transform: rotate(90deg);
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-badge {
            background: linear-gradient(135deg, var(--diskominfo-navy) 0%, #2563eb 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            font-weight: 800;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
        }

        .user-info-card {
            background: linear-gradient(135deg, #eff6ff 0%, #fee2e2 100%);
            padding: 1rem 1.5rem;
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 2px solid rgba(30, 58, 138, 0.1);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--diskominfo-navy) 0%, var(--diskominfo-orange) 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 900;
            font-size: 1.25rem;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        /* --- SIGNAL ANIMATION --- */
        .signal-indicator {
            position: relative;
            width: 12px;
            height: 12px;
        }

        .signal-indicator::before,
        .signal-indicator::after {
            content: '';
            position: absolute;
            border: 2px solid currentColor;
            border-radius: 50%;
            animation: signal-pulse 2s infinite;
        }

        .signal-indicator::before {
            width: 100%;
            height: 100%;
        }

        .signal-indicator::after {
            width: 150%;
            height: 150%;
            top: -25%;
            left: -25%;
            animation-delay: 1s;
            opacity: 0.6;
        }

        /* --- SCROLLBAR STYLING --- */
        .nav-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .nav-scroll::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .nav-scroll::-webkit-scrollbar-thumb {
            background: rgba(249, 115, 22, 0.5);
            border-radius: 10px;
        }

        .nav-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(249, 115, 22, 0.8);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 1024px) {
            .main-wrapper { margin-left: 0 !important; }
            .sidebar-overlay {
                position: fixed; inset: 0;
                background: rgba(0, 0, 0, 0.6);
                z-index: 999; display: none;
                backdrop-filter: blur(4px);
            }
            .sidebar-overlay.show { display: block; }
            .user-info-card { padding: 0.75rem 1rem; }
            .user-avatar { width: 40px; height: 40px; font-size: 1rem; }
        }
    </style>
</head>
<body>

    <div id="overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <aside id="sidebar" class="sidebar">
        <div class="sidebar-logo-section">
            <div class="sidebar-logo-container">
                <img src="{{ asset('images/kominfo.png') }}" alt="DISKOMINFO" class="w-full h-auto">
            </div>
            <div class="mt-4 text-center">
                {{-- <div class="flex items-center justify-center gap-2 text-white/60 text-xs font-bold">
                    <div class="signal-indicator text-orange-400"></div>
                    <span class="uppercase tracking-wider">Sistem Terintegrasi</span>
                </div> --}}
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4 nav-scroll">
            <div class="nav-section-label">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                <span>Menu Utama</span>
            </div>

            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <div class="nav-icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <span>Dashboard Utama</span>
            </a>

            {{-- CEK APAKAH YANG LOGIN ADALAH ADMIN --}}
            @if(Auth::user()->role == 'admin')
                <div class="nav-section-label">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                    <span>Panel Administrator</span>
                </div>
                <a href="/tickets" class="nav-link {{ request()->is('tickets') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                    <span>Semua Tiket Masuk</span>
                    {{-- Perbaikan: Angka menjadi otomatis sesuai jumlah database --}}
                    <span class="badge">
                        {{ \App\Models\Ticket::count() }}
                    </span>
                </a>
            @endif

            {{-- CEK APAKAH YANG LOGIN ADALAH USER BIASA --}}
            @if(Auth::user()->role == 'user')
                <div class="nav-section-label">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                    <span>Menu Pengguna</span>
                </div>
                <a href="/tickets/create" class="nav-link {{ request()->is('tickets/create') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <span>Buat Laporan Baru</span>
                </a>
                <a href="/my-tickets" class="nav-link {{ request()->is('my-tickets') ? 'active' : '' }}">
                    <div class="nav-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <span>Status Tiket Saya</span>
                </a>
            @endif
        </nav>

        <div class="logout-section">
            <div class="mb-3 px-2">
                <div class="flex items-center gap-2 text-white/50 text-xs">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="font-semibold">Online • Sesi Aktif</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <button type="button" onclick="confirmLogout()" class="logout-btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    LOGOUT SYSTEM
                </button>
            </form>
        </div>
    </aside>

    <div id="mainWrapper" class="main-wrapper">
        <header class="top-header">
            <button class="hamburger-btn" onclick="toggleSidebar()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <div class="header-title">
                <div class="header-badge">DISKOMINFO</div>
                <div>
                    <h2 class="text-2xl font-black text-slate-800 tracking-tight">
                        E-Ticket <span class="bg-gradient-to-r from-blue-900 to-orange-600 bg-clip-text text-transparent">Binjai</span>
                    </h2>
                    <p class="text-xs text-slate-500 font-semibold mt-0.5">Pusat Layanan Terpadu</p>
                </div>
            </div>

            <div class="ml-auto">
                <div class="user-info-card">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-[10px] font-black uppercase tracking-wider mb-1 {{ Auth::user()->role == 'admin' ? 'text-red-600' : 'text-blue-600' }}">
                            {{ Auth::user()->role == 'admin' ? '🔐 Administrator' : '👤 User Aktif' }}
                        </p>
                        <p class="font-bold text-slate-800 text-sm leading-none">{{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-6 md:p-12">
            <div class="max-w-6xl mx-auto">
                <div class="mb-10 border-l-4 border-orange-600 pl-6 bg-gradient-to-r from-orange-50 to-transparent p-6 rounded-r-2xl">
                    <h3 class="text-4xl font-extrabold bg-gradient-to-r from-blue-900 via-blue-700 to-orange-600 bg-clip-text text-transparent tracking-tight leading-none uppercase italic">
                        {{ $header ?? 'Beranda' }}
                    </h3>
                    <p class="text-slate-500 mt-2 font-medium">Pusat Layanan Terpadu DISKOMINFO Kota Binjai.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200/60 min-h-[400px]">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('mainWrapper');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('hidden');
            mainWrapper.classList.toggle('full-width');
            
            if (window.innerWidth <= 1024) {
                overlay.classList.toggle('show');
            }
        }

        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin keluar dari sistem?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1e3a8a',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-3xl',
                    confirmButton: 'rounded-xl font-bold px-6',
                    cancelButton: 'rounded-xl font-bold px-6'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'b') {
                e.preventDefault();
                toggleSidebar();
            }
        });
    </script>
</body>
</html>