<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
            {{ __('Hapus Akun') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Setelah akun dihapus, semua data akan hilang secara permanen.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center px-6 py-3 bg-red-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-lg shadow-red-600/20 hover:bg-red-700 active:scale-95 transition-all"
    >
        {{ __('Hapus Akun Permanen') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-0 overflow-hidden rounded-3xl bg-white dark:bg-slate-900">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                @csrf
                @method('delete')

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-red-500/10 flex items-center justify-center text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">
                            {{ __('Konfirmasi Hapus?') }}
                        </h2>
                        <p class="text-[10px] font-bold text-red-500 uppercase tracking-widest">{{ __('Tindakan ini permanen') }}</p>
                    </div>
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                    {{ __('Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun secara permanen dari sistem kami.') }}
                </p>

                <div class="space-y-2">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="block w-full px-5 py-4 bg-gray-50 dark:bg-white/5 border-gray-200 dark:border-white/10 rounded-2xl text-gray-900 dark:text-white focus:ring-4 focus:ring-red-500/10 focus:border-red-500 transition-all placeholder-gray-400"
                        placeholder="{{ __('Masukkan Password Konfirmasi') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[10px] font-bold uppercase" />
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <x-secondary-button 
                        x-on:click="$dispatch('close')" 
                        class="flex-1 justify-center py-4 rounded-2xl border-none bg-gray-100 dark:bg-white/5 text-[10px] font-black uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-white/10 transition-all"
                    >
                        {{ __('Batal') }}
                    </x-secondary-button>

                    <x-danger-button class="flex-1 justify-center py-4 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all ms-0 sm:ms-3">
                        {{ __('Ya, Hapus Akun') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</section>