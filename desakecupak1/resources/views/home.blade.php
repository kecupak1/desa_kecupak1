@extends('layouts.app')

@section('title', ($profil->nama_desa ?? 'Website Desa') . ' - Beranda')

@section('content')

{{-- HERO SLIDER FOTO DESA --}}
<section class="relative h-[600px] md:h-[700px] overflow-hidden bg-gray-900">
    {{-- SLIDE 1: FOTO GAPURA DESA 1 --}}
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
        <img src="{{ asset('images/fotogapuradesa1.jpeg') }}" class="w-full h-full object-cover" alt="Gapura Desa 1">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center px-4 z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight drop-shadow-md font-sans">
                    SELAMAT DATANG DI {{ strtoupper($profil->nama_desa ?? 'DESA KAMI') }}
                </h1>
                <p class="text-white/95 text-lg md:text-2xl font-bold tracking-wide drop-shadow-md uppercase">
                    {{ $profil->motto ?? 'DESA KECUPAK 1' }}
                </p>
            </div>
        </div>
    </div>

    {{-- SLIDE 2: FOTO GAPURA DESA 2 --}}
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0">
        <img src="{{ asset('images/airterjun.jpeg') }}" class="w-full h-full object-cover" alt="Gapura Desa 2">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center px-4 z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight drop-shadow-md font-sans">
                    WISATA & POTENSI {{ strtoupper($profil->nama_desa ?? 'DESA') }}
                </h1>
                <p class="text-white/95 text-lg md:text-2xl font-bold tracking-wide drop-shadow-md uppercase">
                    Jelajahi keindahan alam dan potensi unggulan yang ada di desa kami
                </p>
            </div>
        </div>
    </div>

    {{-- TOMBOL NAVIGASI --}}
    <button onclick="changeSlide(-1)" class="absolute left-6 top-1/2 -translate-y-1/2 z-20 text-white hover:text-green-400 transition text-2xl">
        &#8592;
    </button>
    <button onclick="changeSlide(1)" class="absolute right-6 top-1/2 -translate-y-1/2 z-20 text-white hover:text-green-400 transition text-2xl">
        &#8594;
    </button>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    function showSlide(i) {
        slides.forEach((s, idx) => {
            s.classList.toggle('opacity-100', idx === i);
            s.classList.toggle('z-10', idx === i);
            s.classList.toggle('opacity-0', idx !== i);
            s.classList.toggle('z-0', idx !== i);
        });
    }
    function changeSlide(dir) {
        if (slides.length === 0) return;
        currentSlide = (currentSlide + dir + slides.length) % slides.length;
        showSlide(currentSlide);
    }
    if (slides.length > 1) setInterval(() => changeSlide(1), 5000);
</script>

{{-- JELAJAHI DESA --}}
<section class="bg-gray-50/60 py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 pr-0 lg:pr-6">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#5CB338] mb-6 tracking-wide uppercase">Jelajahi Desa</h2>
                <p class="text-gray-700 leading-relaxed text-base md:text-lg font-normal">
                    Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan desa. Aspek pemerintahan, penduduk, demografi, potensi desa, dan juga berita tentang desa.
                </p>
            </div>
            <div class="lg:col-span-7 grid grid-cols-2 gap-6 sm:gap-8">
                <a href="#profil" class="bg-white border border-gray-100 rounded-2xl p-8 sm:p-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 mb-5 text-[#1a5c38]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l8-4v18M13 21V11l6 3v7M9 9h1m-1 3h1m-1 3h1"/></svg>
                    <p class="font-bold text-gray-700 text-xs sm:text-sm tracking-wider uppercase">Profil Desa</p>
                </a>
                <a href="#sotk" class="bg-white border border-gray-100 rounded-2xl p-8 sm:p-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 mb-5 text-[#1a5c38]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <p class="font-bold text-gray-700 text-xs sm:text-sm tracking-wider uppercase">Infografis</p>
                </a>
                <a href="#" class="bg-white border border-gray-100 rounded-2xl p-8 sm:p-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 mb-5 text-[#1a5c38]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    <p class="font-bold text-gray-700 text-xs sm:text-sm tracking-wider uppercase">IDM</p>
                </a>
                <a href="#berita" class="bg-white border border-gray-100 rounded-2xl p-8 sm:p-10 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_25px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 mb-5 text-[#1a5c38]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <p class="font-bold text-gray-700 text-xs sm:text-sm tracking-wider uppercase">PPID</p>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- SAMBUTAN KEPALA DESA --}}
<section id="profil" class="py-24 bg-[#F8F9FA]">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid md:grid-cols-12 gap-10 md:gap-14 items-center">
            <div class="md:col-span-5 flex justify-center">
                <div class="relative w-64 h-64 sm:w-72 sm:h-72 lg:w-80 lg:h-80 rounded-full overflow-hidden shadow-2xl border-4 border-white bg-white">
                    @if($profil && $profil->foto_kepala_desa)
                        <img src="{{ asset('storage/'.$profil->foto_kepala_desa) }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 font-medium text-sm text-center px-4">Foto Kepala Desa</div>
                    @endif
                </div>
            </div>
            <div class="md:col-span-7 text-left">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#5CB338] mb-3 tracking-wide">
                    Sambutan Kepala Desa {{ $profil->nama_desa ?? '' }}
                </h2>
                <h3 class="font-extrabold text-gray-900 text-lg sm:text-xl uppercase tracking-wider mb-1">
                    {{ $profil->nama_kepala_desa ?? 'Nama Kepala Desa' }}
                </h3>
                <p class="text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-widest mb-6">
                    Kepala Desa
                </p>
                <div class="border-l-4 border-gray-400 pl-4 py-1 my-4">
                    <p class="text-gray-700 leading-relaxed text-xs sm:text-sm md:text-base font-medium uppercase tracking-wide">
                        {{ $profil->sambutan_kepala_desa ?? 'Selamat datang di website resmi desa kami. Website ini dibangun untuk mempermudah sistem dan tatakelola kerja pemerintah desa serta mempermudah penyampaian informasi di setiap agenda dan kegiatan pemerintah desa kepada masyarakat agar terbangun keterbukaan informasi.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PETA DESA --}}
<section class="py-20 bg-gray-100/70 border-y border-gray-200/60">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <h2 class="text-3xl md:text-4xl font-extrabold text-[#5CB338] mb-2 tracking-wide uppercase">Peta Desa</h2>
        <p class="text-gray-600 mb-8 text-sm md:text-base font-normal">
            Menampilkan Peta Desa Dengan <span class="italic">Interest Point</span> {{ $profil->nama_desa ?? 'Desa Tamang' }}
        </p>
        
        <div class="flex flex-wrap gap-4 mb-6">
            <div class="bg-white border border-gray-300 rounded-md px-4 py-2 text-xs text-gray-400 flex items-center justify-between w-64 shadow-sm">
                <span>Telusuri Peta</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="bg-white border border-gray-300 rounded-md px-4 py-2 text-xs text-gray-400 flex items-center justify-between w-48 shadow-sm">
                <span>Lihat Semua</span>
                <span class="text-gray-300">&#8597;</span>
            </div>
        </div>

        <div class="rounded-xl overflow-hidden border border-gray-300 shadow-md h-[450px] bg-gray-300 relative">
            @if($profil && $profil->link_maps)
                <iframe src="{{ $profil->link_maps }}" class="w-full h-full" style="border:0;" allowfullscreen loading="lazy"></iframe>
            @else
                <div class="w-full h-full bg-[#B3C0D1] flex flex-col items-center justify-center text-white font-medium shadow-inner">
                    <svg class="w-12 h-12 mb-2 text-[#2c7744] drop-shadow" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    <span class="text-gray-700 font-semibold text-base drop-shadow-sm">Use Ctrl + scroll to zoom the map</span>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- SOTK / STRUKTUR ORGANISASI --}}
<section id="sotk" class="py-24 bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#5CB338] uppercase tracking-wide">Bagan Desa</h2>
            <p class="text-gray-600 mt-2">Struktur Organisasi Pemerintah Desa & BPD</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                <h3 class="font-bold text-gray-700 mb-4">Struktur Organisasi Pemerintahan Desa</h3>
                <img src="{{ asset('images/struktur.png') }}" class="w-full h-auto rounded-lg" alt="SOTK 1">
            </div>
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                <h3 class="font-bold text-gray-700 mb-4">Struktur Organisasi BPD</h3>
                <img src="{{ asset('images/bpd.png') }}" class="w-full h-auto rounded-lg" alt="SOTK 2">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($perangkat as $item)
            <div class="bg-white rounded-lg overflow-hidden border border-gray-200/80 shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between">
                <div class="relative w-full h-72 sm:h-64 md:h-60 lg:h-72 bg-gray-100 overflow-hidden">
                    @if($item->foto)
                        <img src="{{ asset('storage/'.$item->foto) }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm font-medium">Foto</div>
                    @endif
                </div>
                <div class="bg-[#78C841] text-white text-center py-4 px-3 flex flex-col justify-center items-center shadow-inner">
                    <p class="font-extrabold text-sm uppercase tracking-wider text-white">{{ $item->nama }}</p>
                    <p class="text-[11px] font-semibold uppercase tracking-widest text-white/90">{{ $item->jabatan }}</p>
                </div>
            </div>
            @empty
            <p class="col-span-4 text-center text-gray-400 py-12">Data perangkat belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section id="berita" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-end mb-10 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#5CB338] uppercase tracking-wide">Berita Terbaru</h2>
            </div>
            <a href="#" class="text-gray-600 font-bold text-xs sm:text-sm uppercase tracking-wider hover:text-[#5CB338] transition flex items-center gap-1">
                Lihat Semua 
                <span class="text-lg leading-none">&rarr;</span>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($beritaTerbaru as $berita)
            <div class="bg-white rounded-xl shadow-[0_4px_15px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden hover:shadow-[0_10px_25px_rgba(0,0,0,0.1)] transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-52 bg-gray-100 overflow-hidden">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm">Tidak ada gambar</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#5CB338] font-extrabold uppercase tracking-widest mb-2">{{ $berita->tanggal_publish?->translatedFormat('d F Y') }}</p>
                        <h3 class="font-bold text-gray-900 text-lg line-clamp-2 hover:text-[#5CB338] transition leading-snug">{{ $berita->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-3 line-clamp-3 leading-relaxed font-normal">{{ $berita->ringkasan }}</p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2">
                    <a href="#" class="text-xs font-bold text-[#5CB338] uppercase tracking-wider hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            @empty
            <p class="text-gray-400 col-span-3 text-center py-12 font-medium">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- AGENDA & PENGUMUMAN --}}
<section class="py-20 bg-gray-50 border-t border-gray-200/60">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 grid md:grid-cols-2 gap-12 lg:gap-16">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-800 uppercase tracking-wide mb-6 border-l-4 border-[#5CB338] pl-3">Agenda Desa</h2>
            <div class="space-y-4">
                @forelse($agenda as $item)
                <div class="flex items-center gap-5 bg-white p-5 rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition">
                    <div class="bg-[#F4F9F1] text-[#5CB338] border border-green-200 rounded-lg px-4 py-3 text-center min-w-[70px]">
                        <p class="font-extrabold text-2xl leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</p>
                        <p class="text-[11px] font-bold uppercase tracking-wider mt-1 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-base hover:text-[#5CB338] transition">{{ $item->judul_kegiatan }}</h4>
                        <p class="text-xs font-medium text-gray-500 mt-1 flex items-center gap-1">
                            <span>&#128205;</span> {{ $item->lokasi }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="text-gray-400 py-6 text-sm font-medium italic">Belum ada agenda mendatang.</p>
                @endforelse
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-extrabold text-gray-800 uppercase tracking-wide mb-6 border-l-4 border-[#5CB338] pl-3">Pengumuman</h2>
            <div class="space-y-4">
                @forelse($pengumuman as $item)
                <div class="bg-white p-6 rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start gap-4 mb-2">
                        <h4 class="font-bold text-gray-900 text-base leading-snug">{{ $item->judul }}</h4>
                        <span class="text-[11px] font-semibold bg-gray-100 text-gray-600 px-2.5 py-1 rounded whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                    </div>
                    <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">{{ $item->isi }}</p>
                </div>
                @empty
                <p class="text-gray-400 py-6 text-sm font-medium italic">Belum ada pengumuman.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <h2 class="text-2xl font-extrabold text-gray-800 uppercase tracking-wide mb-8 border-l-4 border-[#5CB338] pl-3">Galeri Terbaru</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
            @forelse($galeri as $foto)
            <div class="group relative rounded-xl overflow-hidden aspect-video bg-gray-100 shadow-sm">
                <img src="{{ asset('storage/'.$foto->file) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition duration-300"></div>
            </div>
            @empty
            <p class="text-gray-400 col-span-4 text-center py-12 font-medium">Belum ada foto galeri.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection