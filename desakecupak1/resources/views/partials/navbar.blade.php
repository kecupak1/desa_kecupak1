<nav class="bg-white shadow-md sticky top-0 z-50">
    {{-- Hapus max-w-7xl dan mx-auto agar navbar memenuhi lebar layar --}}
    <div class="px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/lambangpakpak.jpg') }}" alt="Logo Pakpak Bharat" class="h-12 w-12 object-contain">
                <div>
                    <p class="font-bold text-gray-800 text-lg leading-tight">Desa Kecupak 1</p>
                    <p class="text-xs text-gray-500">Kabupaten Pakpak Bharat</p>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Beranda</a>

                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition flex items-center gap-1">
                        Profil Desa
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Sejarah Desa</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Visi & Misi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Kondisi Geografis</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Demografi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Peta Desa</a>
                    </div>
                </div>

                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition flex items-center gap-1">
                        Pemerintahan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Struktur Organisasi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Perangkat Desa</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">BPD</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">PKK</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Karang Taruna</a>
                    </div>
                </div>

                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Berita</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Wisata</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">UMKM</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Galeri</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Kontak</a>
            </div>

            <button id="mobile-menu-btn" class="lg:hidden text-gray-700">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Beranda</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Profil Desa</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Pemerintahan</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Berita</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Wisata</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">UMKM</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Galeri</a>
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Kontak</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>