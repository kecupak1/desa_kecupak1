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
            background-color: #0f172a; /* Deep Slate */
            color: #f8fafc;
        }

        /* Desain Background Programmer: Subtle Mesh Gradient */
        .bg-pattern {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            background: 
                radial-gradient(circle at 0% 0%, rgba(59, 130, 246, 0.15) 0%, transparent 35%),
                radial-gradient(circle at 100% 100%, rgba(245, 130, 32, 0.1) 0%, transparent 35%),
                radial-gradient(circle at 50% 50%, rgba(15, 23, 42, 1) 0%, rgba(15, 23, 42, 1) 100%);
        }

        /* Abstract Glows */
        .glow {
            position: absolute;
            width: 400px;
            height: 400px;
            background: #3b82f6;
            filter: blur(120px);
            opacity: 0.15;
            border-radius: 50%;
            z-index: 0;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .input-tech {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-tech:focus {
            border-color: #3b82f6;
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .btn-primary {
            background: #3b82f6;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.5);
        }

        .text-gradient {
            background: linear-gradient(to right, #fff 30%, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hidden-form { display: none; opacity: 0; transform: translateY(10px); }
        .visible-form { display: block; opacity: 1; transform: translateY(0); transition: all 0.5s ease; }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased">
    <div class="bg-pattern"></div>
    <div class="glow top-[-100px] left-[-100px]"></div>
    <div class="glow bottom-[-100px] right-[-100px]" style="background: #f58220;"></div>

    <header class="w-full px-8 lg:px-20 py-10 flex justify-between items-center relative z-10">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white flex items-center justify-center rounded-2xl shadow-2xl">
                <img src="{{ asset('images/kominfo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            </div>
            <div>
                <h1 class="font-bold text-white leading-none text-xl tracking-tight">E-TICKET</h1>
                <p class="text-[9px] text-blue-400 tracking-[0.4em] font-black uppercase mt-1">Diskominfo Binjai</p>
            </div>
        </div>
        <nav class="hidden md:flex gap-10">
            <a href="#" class="text-xs font-bold text-slate-400 hover:text-white transition-colors tracking-widest uppercase">Support</a>
            <a href="#" class="text-xs font-bold text-slate-400 hover:text-white transition-colors tracking-widest uppercase">Network</a>
        </nav>
    </header>

    <main class="flex-1 w-full max-w-[1400px] mx-auto px-8 lg:px-20 flex flex-col lg:flex-row items-center justify-center gap-20 py-10">
        
        <div class="lg:w-1/2 z-10">
            <h2 class="text-6xl lg:text-8xl font-extrabold text-gradient leading-[1.1] mb-8 tracking-tighter">
                E-TICKET.
            </h2>
            <p class="text-slate-400 text-lg lg:text-xl max-w-lg leading-relaxed mb-10 font-light">
                Sistem manajemen layanan IT terpadu untuk efisiensi komunikasi antar Organisasi Perangkat Daerah Kota Binjai.
            </p>
            
            </div>

        <div class="lg:w-[460px] w-full z-10">
            <div class="glass-card rounded-[2.5rem] p-10 lg:p-12 relative overflow-hidden">
                <div class="absolute top-[-50px] right-[-50px] w-32 h-32 bg-blue-500/10 rounded-full blur-3xl"></div>

                <div id="login-form" class="visible-form">
                    <div class="mb-10">
                        <h3 class="text-2xl font-bold text-white tracking-tight mb-2">Authentication</h3>
                        <p class="text-slate-500 text-sm">Gunakan akun resmi Anda untuk masuk.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div class="group">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 block ml-1 transition-colors group-focus-within:text-blue-400">Email Address</label>
                            <input type="email" name="email" required placeholder="admin@binjaikota.go.id" 
                                class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                        </div>

                        <div class="group">
                            <div class="flex justify-between items-center mb-2">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] block ml-1 transition-colors group-focus-within:text-blue-400">Password</label>
                                <a href="#" class="text-[10px] text-blue-500 hover:text-blue-400 transition-colors uppercase font-bold tracking-tighter"></a>
                            </div>
                            <div class="relative">
                                <input type="password" name="password" id="login_pass" required placeholder="••••••••" 
                                    class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                                <button type="button" onclick="togglePassword('login_pass')" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-600 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 btn-primary text-white rounded-2xl font-bold text-sm tracking-wide shadow-2xl">
                            Sign In to System
                        </button>
                    </form>

                    <p class="mt-8 text-center text-slate-500 text-xs font-medium">
                        Belum terdaftar? <a href="javascript:void(0)" onclick="toggleForm('register')" class="text-white hover:text-blue-400 font-bold transition-colors">Request Account</a>
                    </p>
                </div>

                <div id="register-form" class="hidden-form">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-white tracking-tight mb-2">Request Access</h3>
                        <p class="text-slate-500 text-sm">Daftarkan identitas baru Anda.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf
                        <div class="group">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 block ml-1">Nama Lengkap</label>
                            <input type="text" name="name" required placeholder="Nama Operator" class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                        </div>

                        <div class="group">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 block ml-1">Email Resmi</label>
                            <input type="email" name="email" required placeholder="admin@opd.go.id" class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="group">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 block ml-1">Sandi</label>
                                <input type="password" name="password" class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                            </div>
                            <div class="group">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 block ml-1">Konfirmasi</label>
                                <input type="password" name="password_confirmation" class="w-full px-6 py-4 rounded-2xl text-white font-medium input-tech">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-white text-slate-900 hover:bg-slate-200 transition-all rounded-2xl font-bold text-sm tracking-wide mt-4">
                            Submit Registration
                        </button>
                    </form>

                    <p class="mt-8 text-center text-slate-500 text-xs font-medium">
                        Sudah ada akun? <a href="javascript:void(0)" onclick="toggleForm('login')" class="text-white hover:text-blue-400 font-bold transition-colors">Go back</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full px-8 lg:px-20 py-10 flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
        <div class="flex items-center gap-6">
            <span class="text-[10px] font-bold text-slate-600 uppercase tracking-[0.5em]">&copy; 2026 DISKOMINFO BINJAI</span>
        </div>
        <div class="flex gap-8">
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Global Node Status: Stable</span>
            </div>
        </div>
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
                loginForm.classList.replace('visible-form', 'hidden-form');
                setTimeout(() => {
                    loginForm.style.display = 'none';
                    registerForm.style.display = 'block';
                    setTimeout(() => registerForm.classList.replace('hidden-form', 'visible-form'), 50);
                }, 400);
            } else {
                registerForm.classList.replace('visible-form', 'hidden-form');
                setTimeout(() => {
                    registerForm.style.display = 'none';
                    loginForm.style.display = 'block';
                    setTimeout(() => loginForm.classList.replace('hidden-form', 'visible-form'), 50);
                }, 400);
            }
        }
    </script>
</body>
</html>