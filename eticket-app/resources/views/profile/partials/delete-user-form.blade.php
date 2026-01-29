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

    
</section>