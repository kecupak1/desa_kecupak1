<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap');

    .desa-nav {
        --hijau-tua: #1d5c3a;
        --hijau: #2e7d52;
        --biru-tua: #1b5c6b;
        --emas: #c99a2e;
        --emas-terang: #eec25f;
        --merah: #b3272c;
        --tinta: #1c1b17;
        --tinta-lembut: #57564e;
        --kertas: #faf9f6;
        --garis: #e3dfd3;
        font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif;
    }
    .desa-nav .f-display { font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif; }
    .desa-nav .f-mono { font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif; }

    .desa-nav .nav-link {
        color: var(--tinta-lembut);
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        transition: background .15s, color .15s;
    }
    .desa-nav .nav-link:hover {
        color: var(--hijau-tua);
        background: rgba(29, 92, 58, 0.07);
    }
    .desa-nav .dropdown-panel a {
        display: block;
        padding: 0.55rem 1rem;
        font-size: 0.875rem;
        color: var(--tinta-lembut);
        border-left: 2px solid transparent;
        transition: background .15s, border-color .15s, color .15s;
    }
    .desa-nav .dropdown-panel a:hover {
        background: rgba(29, 92, 58, 0.06);
        border-left-color: var(--emas);
        color: var(--hijau-tua);
    }
    .desa-nav .btn-cta {
        background: var(--emas);
        color: var(--tinta);
        font-weight: 700;
        font-size: 0.875rem;
        padding: 0.5rem 1.4rem;
        border-radius: 0.375rem;
        transition: background .15s;
    }
    .desa-nav .btn-cta:hover {
        background: var(--emas-terang);
    }
</style>

<nav class="desa-nav bg-white sticky top-0 z-50 border-b border-[var(--garis)] shadow-[0_1px_0_rgba(0,0,0,0.02)]">
    <div class="h-[3px]" style="background: linear-gradient(90deg, var(--hijau-tua) 0%, var(--emas) 50%, var(--biru-tua) 100%);"></div>

    <div class="px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/lambangpakpak.jpg') }}" alt="Logo Pakpak Bharat" class="h-12 w-12 object-contain">
                <div>
                    <p class="f-display font-bold text-[var(--tinta)] text-lg leading-tight">Desa Kecupak 1</p>
                    <p class="f-mono text-[10px] tracking-[0.14em] uppercase text-[var(--hijau-tua)]">Kabupaten Pakpak Bharat</p>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>

                <!-- Dropdown Profil Desa -->
                <div class="relative group">
                    <button class="nav-link flex items-center gap-1">
                        Profil Desa <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="dropdown-panel absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border border-[var(--garis)]">
                        <a href="#">Sejarah Desa</a>
                        <!-- 👇 INI BAGIAN YANG DITAMBAHKAN LINK VISI & MISI 👇 -->
                        <a href="{{ route('profil.visimisi') }}">Visi &amp; Misi</a>
    
                        <a href="{{ route('demografi') }}">Demografi</a>
                        <a href="{{ route('profil.peta') }}">Peta Desa</a>
                    </div>
                </div>

                <!-- Dropdown Pemerintahan -->
                <div class="relative group">
                <button class="nav-link flex items-center gap-1">
                    Pemerintahan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <!-- Bagian Dropdown (Kotak yang muncul saat diarahkan) -->
                <div class="dropdown-panel absolute hidden group-hover:block top-full left-0 bg-white shadow-lg rounded-lg py-2 w-56 border border-[var(--garis)]">
                    <!-- Cukup ubah href pada baris ini saja, jangan tambah baris baru di luar -->
                    <a href="{{ route('pemerintahan.struktur') }}">Struktur Organisasi Pemerintahan Desa</a>
                    <a href="{{ route('pemerintahan.bpd') }}">Badan Permusyawaratan Desa</a>
                    <a href="#">Pemberdayaan dan Kesejahteraan Keluarga</a>
                </div>
                </div>

                <a href="#" class="nav-link">Berita</a>
                <a href="#" class="nav-link">Wisata</a>
                <a href="#" class="nav-link">UMKM</a>
                <a href="#" class="nav-link">Galeri</a>
                <a href="#" class="nav-link">Kontak</a>

                <!-- TOMBOL LOGIN ADMIN (POSISI TERAKHIR) -->
                @guest
                    <a href="{{ route('login') }}" class="btn-cta ml-4">Login</a>
                @else
                    <a href="/admin/agenda" class="btn-cta ml-4">Admin</a>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-[var(--tinta)]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-1 border-t border-[var(--garis)] pt-3">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-semibold text-[var(--tinta-lembut)] hover:bg-[var(--hijau-tua)]/5 hover:text-[var(--hijau-tua)] rounded-lg">Beranda</a>
            <!-- 👇 TAMBAHAN UNTUK MOBILE MENU 👇 -->
            <a href="{{ route('profil.visimisi') }}" class="block px-4 py-2 text-sm font-semibold text-[var(--tinta-lembut)] hover:bg-[var(--hijau-tua)]/5 hover:text-[var(--hijau-tua)] rounded-lg">Visi &amp; Misi</a>
            <!-- 👆 ---------------------------- 👆 -->
            <a href="{{ route('demografi') }}" class="block px-4 py-2 text-sm font-semibold text-[var(--tinta-lembut)] hover:bg-[var(--hijau-tua)]/5 hover:text-[var(--hijau-tua)] rounded-lg">Demografi</a>
            <!-- Tambahkan login untuk mobile juga -->
            @guest
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm font-bold text-[var(--emas)] hover:bg-[var(--emas)]/10 rounded-lg">Login Admin</a>
            @else
                <a href="/admin/agenda" class="block px-4 py-2 text-sm font-semibold text-[var(--tinta-lembut)] hover:bg-[var(--hijau-tua)]/5 hover:text-[var(--hijau-tua)] rounded-lg">Dashboard Admin</a>
            @endguest
            <a href="#" class="block px-4 py-2 text-sm font-semibold text-[var(--tinta-lembut)] hover:bg-[var(--hijau-tua)]/5 hover:text-[var(--hijau-tua)] rounded-lg">Kontak</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>