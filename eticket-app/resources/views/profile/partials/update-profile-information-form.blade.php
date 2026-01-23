<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-white uppercase tracking-wider">Informasi Profil</h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-slate-800/50 border-white/10 rounded-xl px-4 py-3 text-white focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-slate-800/50 border-white/10 rounded-xl px-4 py-3 text-white focus:border-blue-500 focus:ring-blue-500">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded-lg text-xs uppercase tracking-widest transition-all">
            Simpan
        </button>
    </form>
</section>