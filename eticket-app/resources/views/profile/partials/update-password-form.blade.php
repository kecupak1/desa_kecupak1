<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-white uppercase tracking-wider">Perbarui Password</h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Password Saat Ini</label>
            <input type="password" name="current_password" class="w-full bg-slate-800/50 border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:ring-orange-500">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Password Baru</label>
            <input type="password" name="password" class="w-full bg-slate-800/50 border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:ring-orange-500">
        </div>

        <button type="submit" class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-6 rounded-lg text-xs uppercase tracking-widest transition-all">
            Update Password
        </button>
    </form>
</section>