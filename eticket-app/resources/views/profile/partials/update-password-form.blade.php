<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-white uppercase tracking-wider">Perbarui Password</h2>
        <p class="text-xs font-medium text-slate-500 mt-1 uppercase tracking-tight">Gunakan kombinasi karakter yang kuat untuk keamanan maksimal.</p>
    </header>

    {{-- AREA NOTIFIKASI TAMBAHAN --}}
    @if (session('success'))
        <div id="alert-success" class="bg-emerald-500/10 border border-emerald-500/30 p-4 rounded-2xl flex items-center justify-between shadow-xl backdrop-blur-md animate-in fade-in slide-in-from-top-4 duration-500">
            <div class="flex items-center gap-3">
                <div class="bg-emerald-500 p-2 rounded-xl shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-emerald-500 text-[10px] font-black uppercase tracking-widest leading-none">Berhasil</p>
                    <p class="text-emerald-200/80 text-[11px] font-bold mt-1 uppercase">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div id="alert-error" class="bg-red-500/10 border border-red-500/30 p-4 rounded-2xl flex items-center gap-3 shadow-xl backdrop-blur-md">
            <div class="bg-red-500 p-2 rounded-xl shadow-[0_0_15px_rgba(239,68,68,0.4)]">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <div>
                <p class="text-red-500 text-[10px] font-black uppercase tracking-widest leading-none">Kesalahan</p>
                <p class="text-red-200/80 text-[11px] font-bold mt-1 uppercase">Gagal memperbarui password. Silakan periksa kembali.</p>
            </div>
        </div>
    @endif

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- PASSWORD SAAT INI --}}
        <div class="space-y-2">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Password Saat Ini</label>
            <div class="relative group">
                <input type="password" id="current_password" name="current_password" 
                    class="w-full bg-white/5 border-white/10 rounded-2xl px-5 py-4 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 placeholder-slate-600 pr-14"
                    placeholder="••••••••">
                <button type="button" onclick="togglePass('current_password', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-indigo-400 transition-colors p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            @error('current_password', 'updatePassword') <p class="text-red-400 text-[10px] font-bold mt-1 uppercase tracking-tight ml-1">{{ $message }}</p> @enderror
        </div>

        {{-- PASSWORD BARU --}}
        <div class="space-y-2">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Password Baru</label>
            <div class="relative group">
                <input type="password" id="password" name="password" 
                    class="w-full bg-white/5 border-white/10 rounded-2xl px-5 py-4 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 placeholder-slate-600 pr-14"
                    placeholder="••••••••">
                <button type="button" onclick="togglePass('password', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-indigo-400 transition-colors p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            @error('password', 'updatePassword') <p class="text-red-400 text-[10px] font-bold mt-1 uppercase tracking-tight ml-1">{{ $message }}</p> @enderror
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="space-y-2">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] ml-1">Konfirmasi Password Baru</label>
            <div class="relative group">
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="w-full bg-white/5 border-white/10 rounded-2xl px-5 py-4 text-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 placeholder-slate-600 pr-14"
                    placeholder="••••••••">
                <button type="button" onclick="togglePass('password_confirmation', this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-indigo-400 transition-colors p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-black py-4 px-10 rounded-2xl text-[10px] uppercase tracking-[0.2em] transition-all shadow-lg shadow-indigo-600/20 active:scale-95">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                   class="text-emerald-500 text-[10px] font-black uppercase tracking-widest animate-pulse">
                    Tersimpan!
                </p>
            @endif
        </div>
    </form>

    <script>
        function togglePass(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector('svg');
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>';
            } else {
                input.type = "password";
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
            }
        }

        setTimeout(() => {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-error');
            if(successAlert) {
                successAlert.style.transition = 'all 0.5s ease';
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 500);
            }
            if(errorAlert) {
                errorAlert.style.transition = 'all 0.5s ease';
                errorAlert.style.opacity = '0';
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 4000);
    </script>
</section>