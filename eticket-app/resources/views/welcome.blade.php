<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticket Binjai</title>

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
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }

        .input-tech {
            background: rgba(15, 23, 42, 0.7);
            border: 1.5px solid rgba(148, 163, 184, 0.2);
            transition: all 0.3s ease;
            color: white;
        }

        .input-tech:focus {
            border-color: #3b82f6;
            background: rgba(15, 23, 42, 0.9);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
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
            background: #1e293b;
            padding: 0 1rem;
            font-size: 0.75rem;
            color: #64748b;
        }

        .hidden-form { display: none; opacity: 0; }
        .visible-form { display: block; animation: fadeInUp 0.5s ease forwards; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Style khusus untuk icon mata */
        .eye-button {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s;
        }
        .eye-button:hover { color: #3b82f6; }
    </style>
</head>
<body class="antialiased">
    <div class="bg-pattern"></div>
    <div class="bg-grid"></div>

    <header class="w-full px-6 lg:px-16 py-6 flex justify-between items-center relative z-10">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-white flex items-center justify-center rounded-xl overflow-hidden">
                <img src="{{ asset('images/binjai.png') }}" alt="Logo Binjai" class="w-9 h-9 object-contain">
            </div>
            <h1 class="font-bold text-white text-lg tracking-tight uppercase">E-TICKET BINJAI</h1>
        </div>
    </header>

    <main class="flex-1 w-full max-w-[1400px] mx-auto px-6 lg:px-16 flex flex-col lg:flex-row items-center justify-center gap-16 py-8 relative z-10">
        <div class="lg:w-1/2 space-y-8">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500/10 border border-blue-500/20 rounded-full mb-6">
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-semibold text-blue-400">Sistem Terintegrasi</span>
                </div>
                <h2 class="text-5xl lg:text-7xl font-extrabold text-gradient leading-tight mb-6">E-TICKET BINJAI.</h2>
                <p class="text-slate-400 text-lg max-w-xl font-light">
                    Sistem manajemen layanan IT terpadu untuk efisiensi komunikasi antar Organisasi Perangkat Daerah Kota Binjai.
                </p>
            </div>
        </div>

        <div class="lg:w-[480px] w-full max-w-md">
            <div class="glass-card rounded-3xl p-8 lg:p-10">
                <div id="login-form" class="visible-form">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">Selamat Datang</h3>
                        <p class="text-slate-400 text-sm">Masuk dengan akun resmi Anda</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-2 block uppercase">Email Address</label>
                            <input type="email" name="email" required class="w-full px-5 py-3.5 rounded-xl text-sm input-tech" placeholder="admin@binjaikota.go.id">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-2 block uppercase">Password</label>
                            <div class="relative">
                                <input type="password" id="loginPass" name="password" required class="w-full px-5 py-3.5 rounded-xl text-sm input-tech" placeholder="••••••••">
                                <button type="button" onclick="toggleVisibility('loginPass')" class="eye-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-3.5 btn-primary text-white rounded-xl font-semibold text-sm">Masuk ke Sistem</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="text-center text-slate-400 text-sm">Belum punya akun? <a href="#" onclick="toggleForm('register')" class="text-blue-400 font-bold ml-1">Daftar Sekarang</a></p>
                </div>

                <div id="register-form" class="hidden-form">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">Daftar Akun</h3>
                        <p class="text-slate-400 text-sm">Lengkapi data pendaftaran Anda</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-1.5 block uppercase">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-5 py-3 rounded-xl text-sm input-tech" placeholder="Nama Lengkap">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 mb-1.5 block uppercase">Email Instansi</label>
                            <input type="email" name="email" required class="w-full px-5 py-3 rounded-xl text-sm input-tech" placeholder="nama@binjaikota.go.id">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-semibold text-slate-400 mb-1.5 block uppercase">Password</label>
                                <div class="relative">
                                    <input type="password" id="regPass" name="password" required class="w-full px-5 py-3 rounded-xl text-sm input-tech" placeholder="••••••••">
                                    <button type="button" onclick="toggleVisibility('regPass')" class="eye-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-slate-400 mb-1.5 block uppercase">Konfirmasi</label>
                                <div class="relative">
                                    <input type="password" id="regConf" name="password_confirmation" required class="w-full px-5 py-3 rounded-xl text-sm input-tech" placeholder="••••••••">
                                    <button type="button" onclick="toggleVisibility('regConf')" class="eye-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-3.5 mt-2 btn-primary text-white rounded-xl font-semibold text-sm">Buat Akun Sekarang</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="text-center text-slate-400 text-sm">Sudah ada akun? <a href="#" onclick="toggleForm('login')" class="text-blue-400 font-bold ml-1">Masuk Kembali</a></p>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full px-6 lg:px-16 py-6 relative z-10 flex flex-col md:flex-row justify-between items-center gap-4 max-w-[1400px] mx-auto text-xs text-slate-500">
        <div>&copy; 2026 E-TICKET BINJAI.</div>
        <div class="flex items-center gap-2 px-3 py-1.5 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
            <span class="text-emerald-400 font-bold uppercase">System Online</span>
        </div>
    </footer>

    <script>
        // Fungsi untuk toggle password (lihat/sembunyi)
        function toggleVisibility(id) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }

        // Fungsi pindah form
        function toggleForm(target) {
            const login = document.getElementById('login-form');
            const register = document.getElementById('register-form');
            if (target === 'register') {
                login.classList.add('hidden-form');
                login.classList.remove('visible-form');
                setTimeout(() => {
                    login.style.display = 'none';
                    register.style.display = 'block';
                    register.classList.add('visible-form');
                    register.classList.remove('hidden-form');
                }, 300);
            } else {
                register.classList.add('hidden-form');
                register.classList.remove('visible-form');
                setTimeout(() => {
                    register.style.display = 'none';
                    login.style.display = 'block';
                    login.classList.add('visible-form');
                    login.classList.remove('hidden-form');
                }, 300);
            }
        }
    </script>
</body>
</html>