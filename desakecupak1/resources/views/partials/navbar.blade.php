<nav class="bg-white shadow-md sticky top-0 z-50">
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

                <!-- Dropdown Profil Desa -->
                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition flex items-center gap-1">
                        Profil Desa <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Sejarah Desa</a>
                        <!-- 👇 INI BAGIAN YANG DITAMBAHKAN LINK VISI & MISI 👇 -->
                        <a href="{{ route('profil.visimisi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Visi & Misi</a>
                        <!-- 👆 ----------------------------------------------- 👆 -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Kondisi Geografis</a>
                        <a href="{{ route('demografi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Demografi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Peta Desa</a>
                    </div>
                </div>

                <!-- Dropdown Pemerintahan -->
                <div class="relative group">
                <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition flex items-center gap-1">
                    Pemerintahan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                
                <!-- Bagian Dropdown (Kotak yang muncul saat diarahkan) -->
                <div class="absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border">
                    <!-- Cukup ubah href pada baris ini saja, jangan tambah baris baru di luar -->
                    <a href="{{ route('pemerintahan.struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Struktur Organisasi Pemerintahan Desa</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Badan Permusyawaratan Desa</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600">Pemberdayaan dan Kesejahteraan Keluarga</a>
                </div>
                </div>

                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Berita</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Wisata</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">UMKM</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Galeri</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">Kontak</a>
                
                <!-- TOMBOL LOGIN ADMIN (POSISI TERAKHIR) -->
                @guest
                    <a href="{{ route('login') }}" class="ml-4 px-6 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Login</a>
                @else
                    <a href="/admin/agenda" class="ml-4 px-6 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Admin</a>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-gray-700">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Beranda</a>
            <!-- 👇 TAMBAHAN UNTUK MOBILE MENU 👇 -->
            <a href="{{ route('profil.visimisi') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Visi & Misi</a>
            <!-- 👆 ---------------------------- 👆 -->
            <a href="{{ route('demografi') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Demografi</a>
            <!-- Tambahkan login untuk mobile juga -->
            @guest
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm font-medium text-primary-600 hover:bg-primary-50 rounded-lg">Login Admin</a>
            @else
                <a href="/admin/agenda" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Dashboard Admin</a>
            @endguest
            <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Kontak</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>