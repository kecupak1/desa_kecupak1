<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticket | DISKOMINFO BINJAI</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            color: #f8fafc;
            min-height: 100vh;
        }

        .bg-pattern {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(59, 130, 246, 0.05) 0%, transparent 40%);
        }

        .bg-grid {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            background-size: 50px 50px;
            background-image: 
                linear-gradient(to right, rgba(148, 163, 184, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(148, 163, 184, 0.03) 1px, transparent 1px);
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.15);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.05) inset;
        }

        .input-tech {
            background: rgba(15, 23, 42, 0.7);
            border: 1.5px solid rgba(148, 163, 184, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
        }

        .input-tech:focus {
            border-color: #3b82f6;
            background: rgba(15, 23, 42, 0.9);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(59, 130, 246, 0.4);
        }

        .text-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 2rem 0;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(148, 163, 184, 0.3), transparent);
        }

        .divider span {
            position: relative;
            background: rgba(30, 41, 59, 0.85);
            padding: 0 1rem;
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
        }

        .status-dot {
            width: 8px; height: 8px; border-radius: 50%; background: #10b981;
            box-shadow: 0 0 12px rgba(16, 185, 129, 0.6);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .hidden-form { display: none; opacity: 0; transform: translateY(20px); }
        .visible-form { display: block; animation: fadeInUp 0.5s ease forwards; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="antialiased">
    <div class="bg-pattern"></div>
    <div class="bg-grid"></div>

    <header class="w-full px-6 lg:px-16 py-6 flex justify-between items-center relative z-10">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-white flex items-center justify-center rounded-xl logo-glow overflow-hidden">
                <img src="{{ asset('images/kominfo.png') }}" alt="Logo Kominfo" class="w-9 h-9 object-contain">
            </div>
            <div>
                <h1 class="font-bold text-white leading-none text-lg tracking-tight">E-TICKET</h1>
                <p class="text-[9px] text-blue-400 tracking-[0.3em] font-bold uppercase mt-0.5">Diskominfo Binjai</p>
            </div>
        </div>
        </header>

    <main class="flex-1 w-full max-w-[1400px] mx-auto px-6 lg:px-16 flex flex-col lg:flex-row items-center justify-center gap-16 py-8 lg:py-4 relative z-10">
        <div class="lg:w-1/2 space-y-8">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500/10 border border-blue-500/20 rounded-full mb-6">
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-semibold text-blue-400 tracking-wide">Sistem Terintegrasi</span>
                </div>
                <h2 class="text-5xl lg:text-7xl font-extrabold text-gradient leading-[1.1] mb-6 tracking-tight">E-TICKET.</h2>
                <p class="text-slate-400 text-base lg:text-lg max-w-xl leading-relaxed font-light">
                    Sistem manajemen layanan IT terpadu untuk efisiensi komunikasi antar Organisasi Perangkat Daerah Kota Binjai.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-xl">
                <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-800/30 border border-slate-700/30">
                    <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center flex-shrink-0 text-blue-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-1">Respons Cepat</h3>
                        <p class="text-xs text-slate-400">Penanganan tiket real-time</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-800/30 border border-slate-700/30">
                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center flex-shrink-0 text-purple-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-1">Aman</h3>
                        <p class="text-xs text-slate-400">Keamanan data terjamin</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-[480px] w-full max-w-md">
            <div class="glass-card rounded-3xl p-8 lg:p-10 relative overflow-hidden">
                <div id="login-form" class="visible-form">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">Selamat Datang</h3>
                        <p class="text-slate-400 text-sm">Masuk dengan akun resmi Anda</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-2 block">Email Address</label>
                            <input type="email" name="email" required placeholder="admin@binjaikota.go.id" class="w-full px-5 py-3.5 rounded-xl text-sm text-white font-medium input-tech">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-2 block">Password</label>
                            <input type="password" name="password" required placeholder="••••••••" class="w-full px-5 py-3.5 rounded-xl text-sm text-white font-medium input-tech">
                        </div>
                        <button type="submit" class="w-full py-3.5 btn-primary text-white rounded-xl font-semibold text-sm shadow-lg">Masuk ke Sistem</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="text-center text-slate-400 text-sm">Belum punya akun? <a href="javascript:void(0)" onclick="toggleForm('register')" class="text-blue-400 hover:text-blue-300 font-semibold ml-1">Daftar Sekarang</a></p>
                </div>

                <div id="register-form" class="hidden-form">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">Daftar Akun</h3>
                        <p class="text-slate-400 text-sm">Lengkapi data untuk mendaftar</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <input type="text" name="name" required placeholder="Nama Lengkap" class="w-full px-5 py-3.5 rounded-xl text-sm text-white input-tech">
                        <input type="email" name="email" required placeholder="Email Resmi" class="w-full px-5 py-3.5 rounded-xl text-sm text-white input-tech">
                        <input type="password" name="password" required placeholder="Password" class="w-full px-5 py-3.5 rounded-xl text-sm text-white input-tech">
                        <button type="submit" class="w-full py-3.5 bg-white/10 hover:bg-white/20 text-white rounded-xl font-semibold text-sm transition-all">Daftar Sekarang</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="text-center text-slate-400 text-sm">Sudah ada akun? <a href="javascript:void(0)" onclick="toggleForm('login')" class="text-blue-400 hover:text-blue-300 font-semibold ml-1">Masuk</a></p>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full px-6 lg:px-16 py-6 relative z-10 flex flex-col md:flex-row justify-between items-center gap-4 max-w-[1400px] mx-auto">
        <div class="text-xs text-slate-500 font-medium">&copy; 2026 DISKOMINFO BINJAI.</div>
        <div class="flex items-center gap-2 px-3 py-1.5 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
            <div class="status-dot"></div>
            <span class="text-[10px] font-bold text-emerald-400 uppercase tracking-tight">System Online</span>
        </div>
    </footer>

    <script>
        function toggleForm(target) {
            const login = document.getElementById('login-form');
            const register = document.getElementById('register-form');
            if (target === 'register') {
                login.classList.replace('visible-form', 'hidden-form');
                setTimeout(() => { login.style.display = 'none'; register.style.display = 'block'; setTimeout(() => register.classList.replace('hidden-form', 'visible-form'), 50); }, 300);
            } else {
                register.classList.replace('visible-form', 'hidden-form');
                setTimeout(() => { register.style.display = 'none'; login.style.display = 'block'; setTimeout(() => login.classList.replace('hidden-form', 'visible-form'), 50); }, 300);
            }
        }
    </script>
</body>
</html>