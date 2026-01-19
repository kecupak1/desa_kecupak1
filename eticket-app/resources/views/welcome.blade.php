<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticket | DISKOMINFO BINJAI</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f0f7ff;
            background-image: 
                radial-gradient(at 0% 0%, rgba(20, 83, 161, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(245, 130, 32, 0.05) 0px, transparent 50%);
            min-height: 100vh;
        }
        .text-kominfo-blue { color: #1453a1; }
        .bg-kominfo-blue { background-color: #1453a1; }
        .text-kominfo-orange { color: #f58220; }
        .bg-kominfo-orange { background-color: #f58220; }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 25px 50px -12px rgba(20, 83, 161, 0.08);
        }
        .input-focus-effect:focus {
            background-color: white !important;
            box-shadow: 0 0 0 4px rgba(20, 83, 161, 0.1);
            border-color: #1453a1 !important;
        }
        .hidden-form { display: none; }
    </style>
</head>
<body class="flex flex-col">
    
    <header class="w-full px-12 py-8 flex justify-start items-center relative z-10">
        <div class="flex items-center gap-6">
            <img src="{{ asset('images/kominfo.png') }}" alt="Logo Kominfo" class="h-16 w-auto object-contain">
            <div class="border-l-2 border-slate-200 pl-6">
                <h1 class="font-black text-kominfo-blue leading-none text-2xl tracking-tighter uppercase">Diskominfo</h1>
                <p class="text-[11px] text-kominfo-orange tracking-[0.4em] font-black uppercase mt-1">Kota Binjai</p>
            </div>
        </div>
    </header>

    <main class="flex-1 w-full max-w-7xl mx-auto px-12 flex flex-col lg:flex-row items-center justify-between gap-12 py-10 relative">
        <div class="lg:w-1/2 space-y-8">
            <div class="inline-flex items-center gap-3 px-5 py-2 bg-white/80 border border-white rounded-full shadow-sm">
                <span class="w-2 h-2 bg-kominfo-orange rounded-full animate-pulse"></span>
                <span class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Portal Layanan OPD</span>
            </div>
            <h2 class="text-7xl lg:text-8xl font-black text-kominfo-blue leading-[0.9] tracking-tighter">
                Sistem <br> <span class="text-kominfo-orange italic">E-Ticket.</span>
            </h2>
            <p class="text-slate-500 text-2xl max-w-xl leading-relaxed font-medium">
                E-Ticket adalah platform integrasi internal yang dirancang khusus bagi Organisasi Perangkat Daerah (OPD) di lingkungan Pemerintah Kota Binjai.
            </p>
        </div>

        <div class="lg:w-[480px] w-full">
            <div class="glass-card p-12 lg:p-14 rounded-[3.5rem] relative overflow-hidden">
                
                <div id="login-form">
                    <div class="mb-10">
                        <h3 class="text-4xl font-extrabold text-kominfo-blue tracking-tight">Selamat Datang</h3>
                        <p class="text-slate-400 mt-3 font-medium text-lg">Silakan masuk ke portal E-Ticket.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Alamat Email</label>
                            <input type="email" name="email" required placeholder="admin@binjaikota.go.id" class="w-full px-8 py-5 bg-[#f1f5f9] border-2 border-transparent rounded-[1.5rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" name="password" id="login_pass" required placeholder="••••••••" class="w-full px-8 py-5 bg-[#f1f5f9] border-2 border-transparent rounded-[1.5rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                                <button type="button" onclick="togglePassword('login_pass')" class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 hover:text-kominfo-blue transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-5 bg-kominfo-blue text-white rounded-[1.5rem] font-bold text-base shadow-xl shadow-blue-900/20 hover:bg-black transform hover:-translate-y-1 transition-all duration-300">Masuk ke Portal →</button>
                    </form>

                    <div class="mt-10 text-center relative z-50">
                        <p class="text-slate-400 font-medium">Belum punya akun? <a href="javascript:void(0)" onclick="toggleForm('register')" class="text-kominfo-orange font-black hover:underline">Daftar Sekarang</a></p>
                    </div>
                </div>

                <div id="register-form" class="hidden-form">
                    <div class="mb-8">
                        <h3 class="text-4xl font-extrabold text-kominfo-blue tracking-tight">Buat Akun</h3>
                        <p class="text-slate-400 mt-3 font-medium text-lg">Lengkapi data Anda di bawah ini.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <div class="space-y-1">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Nama Lengkap</label>
                            <input type="text" name="name" required placeholder="Masukkan nama lengkap" class="w-full px-7 py-4 bg-[#f1f5f9] border-2 border-transparent rounded-[1.2rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Email</label>
                            <input type="email" name="email" required placeholder="email@binjaikota.go.id" class="w-full px-7 py-4 bg-[#f1f5f9] border-2 border-transparent rounded-[1.2rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" name="password" id="reg_pass" required placeholder="••••••••" class="w-full px-7 py-4 bg-[#f1f5f9] border-2 border-transparent rounded-[1.2rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                                <button type="button" onclick="togglePassword('reg_pass')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-kominfo-orange transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Konfirmasi Sandi</label>
                            <input type="password" name="password_confirmation" id="confirm_pass" required placeholder="••••••••" class="w-full px-7 py-4 bg-[#f1f5f9] border-2 border-transparent rounded-[1.2rem] font-semibold text-slate-700 outline-none transition-all input-focus-effect">
                        </div>

                        <button type="submit" class="w-full py-5 bg-kominfo-orange text-white rounded-[1.5rem] font-bold text-base shadow-xl shadow-orange-900/20 hover:bg-black transform hover:-translate-y-1 transition-all duration-300 mt-2">Daftar Sekarang →</button>
                    </form>

                    <div class="mt-8 text-center relative z-50">
                        <p class="text-slate-400 font-medium">Sudah punya akun? <a href="javascript:void(0)" onclick="toggleForm('login')" class="text-kominfo-blue font-black hover:underline">Masuk Sekarang</a></p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="p-10 text-center relative z-10">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.6em]">&copy; 2026 DISKOMINFO KOTA BINJAI</p>
    </footer>

    <script>
        function togglePassword(id) {
            const passField = document.getElementById(id);
            passField.type = passField.type === 'password' ? 'text' : 'password';
        }
        function toggleForm(target) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            if (target === 'register') {
                loginForm.classList.add('hidden-form');
                registerForm.classList.remove('hidden-form');
            } else {
                registerForm.classList.add('hidden-form');
                loginForm.classList.remove('hidden-form');
            }
        }
    </script>
</body>
</html>