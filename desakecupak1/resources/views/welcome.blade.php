<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profil->nama_desa ?? 'Desa Kecupak' }} - Portal Resmi Pemerintah Desa</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="font-['Inter'] bg-slate-50 text-slate-800 antialiased selection:bg-emerald-500 selection:text-white">

    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-md shadow-emerald-600/30">
                    K
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-tight text-slate-900">{{ $profil->nama_desa ?? 'Desa Kecupak' }}</h1>
                    <p class="text-xs text-slate-500">Kabupaten Pakpak Bharat</p>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="/" class="text-emerald-600 font-semibold">Beranda</a>
                <a href="#profil" class="hover:text-emerald-600 transition">Profil Desa</a>
                <a href="#pemerintahan" class="hover:text-emerald-600 transition">Pemerintahan</a>
                <a href="#statistik" class="hover:text-emerald-600 transition">Data Desa</a>
                <a href="#berita" class="hover:text-emerald-600 transition">Berita & Agenda</a>
                <a href="#potensi" class="hover:text-emerald-600 transition">UMKM & Wisata</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-lg bg-slate-900 text-white text-sm font-medium hover:bg-slate-800 transition shadow-sm">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg border border-emerald-600 text-emerald-600 text-sm font-medium hover:bg-emerald-50 transition">
                        Login Perangkat
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <section class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 text-white py-24 lg:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-5">
                Selamat Datang di Portal Resmi
            </span>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">
                {{ $profil->nama_desa ?? 'Desa Kecupak' }}
            </h2>
            <p class="text-lg sm:text-xl text-emerald-100 max-w-2xl mx-auto font-light mb-8 leading-relaxed">
                {{ $profil->motto ?? 'Mewujudkan tata kelola pemerintahan desa yang transparan, akuntabel, dan melayani masyarakat dengan sepenuh hati.' }}
            </p>
            <div class="flex justify-center gap-4">
                <a href="#profil" class="px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-medium shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5">
                    Jelajahi Desa
                </a>
                <a href="#berita" class="px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-medium backdrop-blur-sm transition">
                    Berita Terbaru
                </a>
            </div>
        </div>
    </section>

    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-3xl overflow-hidden shadow-2xl grid grid-cols-1 lg:grid-cols-12 items-center">
                <div class="lg:col-span-5 relative h-80 lg:h-full bg-slate-800">
                    @if(isset($profil->foto_kepala_desa))
                        <img src="{{ asset('storage/' . $profil->foto_kepala_desa) }}" alt="Kepala Desa" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-500 p-8 text-center bg-gradient-to-t from-slate-900 to-slate-800">
                            <svg class="w-20 h-20 mb-3 opacity-30" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span class="text-sm">Foto Kepala Desa Belum Diunggah</span>
                        </div>
                    @endif
                </div>
                <div class="lg:col-span-7 p-8 sm:p-12 text-white">
                    <span class="text-emerald-400 font-semibold text-sm uppercase tracking-wider block mb-2">Sambutan Kepala Desa</span>
                    <h3 class="text-2xl sm:text-3xl font-bold mb-6">Grha Karya & Pelayanan Warga</h3>
                    <p class="text-slate-300 leading-relaxed mb-6 font-light">
                        "{{ $profil->sambutan_kepala_desa ?? 'Selamat datang di website resmi Desa Kecupak. Melalui platform digital ini, kami berkomitmen menyajikan informasi keterbukaan publik, data kependudukan, serta mempromosikan potensi UMKM dan wisata desa kami kepada dunia luar.' }}"
                    </p>
                    <div>
                        <h4 class="font-bold text-lg text-white">Bapak Kepala Desa</h4>
                        <p class="text-sm text-emerald-400 font-medium">Kepala Desa Kecupak</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistik" class="py-16 bg-slate-100 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Demografi & Statistik Desa</h3>
                <p class="text-slate-600 text-sm">Data angka ringkas kependudukan dan potensi yang ada di {{ $profil->nama_desa ?? 'Desa Kecupak' }}.</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 font-bold text-xl">👥</div>
                    <h4 class="text-3xl font-extrabold text-slate-900 mb-1">2,450</h4>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Total Penduduk (Jiwa)</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 font-bold text-xl">👨</div>
                    <h4 class="text-3xl font-extrabold text-slate-900 mb-1">1,210</h4>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Laki-Laki</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center mx-auto mb-4 font-bold text-xl">👩</div>
                    <h4 class="text-3xl font-extrabold text-slate-900 mb-1">1,240</h4>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Perempuan</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mx-auto mb-4 font-bold text-xl">🏡</div>
                    <h4 class="text-3xl font-extrabold text-slate-900 mb-1">620</h4>
                    <p class="text-xs sm:text-sm text-slate-500 font-medium">Kepala Keluarga (KK)</p>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12">
                <div>
                    <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wider block mb-1">Kabar Desa</span>
                    <h3 class="text-3xl font-bold text-slate-900">Berita & Kegiatan Terbaru</h3>
                </div>
                <a href="#" class="mt-4 sm:mt-0 text-sm font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                    Lihat Semua Berita &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($berita as $item)
                    <article class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                        <div class="h-48 bg-slate-200 overflow-hidden relative">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400 text-sm">Tanpa Gambar</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <span class="inline-block py-1 px-3 rounded-full bg-emerald-50 text-emerald-600 font-medium text-xs mb-3">Berita Desa</span>
                            <h4 class="font-bold text-lg text-slate-900 mb-2 line-clamp-2 group-hover:text-emerald-600 transition">
                                <a href="#">{{ $item->judul }}</a>
                            </h4>
                            <p class="text-slate-600 text-sm line-clamp-3 mb-4">{{ $item->ringkasan ?? Str::limit(strip_tags($item->isi), 100) }}</p>
                            <div class="text-xs text-slate-400 flex items-center gap-2">
                                <span>📅 {{ $item->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300 text-slate-500">
                        Belum ada berita yang dipublikasikan oleh perangkat desa.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 text-sm py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4 text-white">
                    <div class="w-8 h-8 bg-emerald-600 rounded flex items-center justify-center font-bold">K</div>
                    <span class="font-bold text-lg">{{ $profil->nama_desa ?? 'Desa Kecupak' }}</span>
                </div>
                <p class="text-slate-400 max-w-sm mb-4 leading-relaxed">
                    Website Resmi Pemerintah {{ $profil->nama_desa ?? 'Desa Kecupak 1' }}. Membangun keterbukaan informasi publik dan mempercepat pelayanan administrasi warga secara digital.
                </p>
            </div>
            <div>
                <h5 class="text-white font-semibold mb-4">Tautan Cepat</h5>
                <ul class="space-y-2">
                    <li><a href="#profil" class="hover:text-emerald-400 transition">Sejarah & Profil</a></li>
                    <li><a href="#pemerintahan" class="hover:text-emerald-400 transition">Struktur Organisasi</a></li>
                    <li><a href="#berita" class="hover:text-emerald-400 transition">Berita & Agenda</a></li>
                    <li><a href="#potensi" class="hover:text-emerald-400 transition">Wisata & UMKM</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-semibold mb-4">Kontak Balai Desa</h5>
                <ul class="space-y-2">
                    <li>📍 {{ $profil->alamat_kantor ?? 'Kantor Kepala Desa Kecupak 1' }}</li>
                    <li>📞 {{ $profil->no_hp ?? '-' }}</li>
                    <li>📧 {{ $profil->email ?? '-' }}</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-800/80 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Pemerintah {{ $profil->nama_desa ?? 'Desa Kecupak' }}. Dikembangkan sebagai program kerja KKN.
        </div>
    </footer>

</body>
</html>