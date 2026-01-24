<section class="space-y-6">
    <header>
        <p class="text-xs font-medium text-slate-500 dark:text-slate-400 leading-relaxed">
            {{ __("Perbarui informasi profil akun dan alamat email Anda untuk menjaga kredibilitas identitas digital.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- FIELD: NAMA --}}
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="ml-1" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="block w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 rounded-2xl text-gray-900 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all duration-300" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- FIELD: EMAIL --}}
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Alamat Email')" class="ml-1" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="block w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 rounded-2xl text-gray-900 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all duration-300" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 rounded-2xl bg-amber-50 dark:bg-amber-500/5 border border-amber-200 dark:border-amber-500/20">
                    <p class="text-xs text-amber-800 dark:text-amber-400 font-medium">
                        {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="ml-2 underline hover:text-amber-600 dark:hover:text-amber-300 transition-colors uppercase font-black tracking-tighter">
                            {{ __('Klik di sini untuk mengirim ulang.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest">
                            {{ __('Link verifikasi baru telah dikirim.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex items-center gap-4 pt-2">
            <button 
                type="submit" 
                class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/40 active:scale-95 transition-all duration-300"
            >
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[10px] font-black text-emerald-500 uppercase tracking-widest animate-pulse"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>