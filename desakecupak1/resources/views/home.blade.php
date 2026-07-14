@extends('layouts.app')

@section('title', ($profil->nama_desa ?? 'Website Desa') . ' - Beranda')

@section('content')

{{-- HERO SLIDER --}}
<section class="relative h-[520px] md:h-[620px] overflow-hidden bg-gray-900">
    @if($slider->count() > 0)
        @foreach($slider as $index => $item)
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
            <img src="{{ asset('storage/'.$item->gambar) }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/10"></div>
        </div>
        @endforeach
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -right-24 -top-24 w-[500px] h-[500px] bg-white rounded-full"></div>
            <div class="absolute -left-16 -bottom-40 w-96 h-96 bg-white rounded-full"></div>
        </div>
    @endif

    <div class="relative z-10 h-full flex flex-col justify-end px-6 sm:px-10 lg:px-16 pb-16 max-w-7xl mx-auto">
        <span class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/20 text-white text-xs font-medium px-4 py-1.5 rounded-full mb-5 w-fit">
            <span class="w-1.5 h-1.5 bg-primary-400 rounded-full"></span>
            Website Resmi Pemerintah Desa
        </span>
        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-3 max-w-2xl">
            {{ $profil->nama_desa ?? 'Desa Kami' }}
        </h1>
        <p class="text-white/80 text-base md:text-lg max-w-xl mb-8">
            {{ $profil->motto ?? 'Melayani dengan transparan, membangun bersama masyarakat.' }}
        </p>
        <div class="flex flex-wrap gap-3">
            <a href="#profil" class="bg-white text-primary-700 px-6 py-3 rounded-lg font-semibold text-sm hover:bg-primary-50 transition shadow-lg">
                Jelajahi Desa
            </a>
            <a href="#berita" class="border border-white/40 text-white px-6 py-3 rounded-lg font-semibold text-sm hover:bg-white/10 transition backdrop-blur-sm">
                Baca Berita Terbaru
            </a>
        </div>
    </div>

    @if($slider->count() > 1)
    <div class="absolute bottom-6 right-6 z-10 flex gap-2">
        <button onclick="changeSlide(-1)" class="bg-white/10 hover:bg-white/25 backdrop-blur-sm text-white rounded-full w-10 h-10 flex items-center justify-center border border-white/20 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="changeSlide(1)" class="bg-white/10 hover:bg-white/25 backdrop-blur-sm text-white rounded-full w-10 h-10 flex items-center justify-center border border-white/20 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
    @endif
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    function showSlide(i) {
        slides.forEach((s, idx) => {
            s.classList.toggle('opacity-100', idx === i);
            s.classList.toggle('opacity-0', idx !== i);
        });
    }
    function changeSlide(dir) {
        if (slides.length === 0) return;
        currentSlide = (currentSlide + dir + slides.length) % slides.length;
        showSlide(currentSlide);
    }
    if (slides.length > 1) setInterval(() => changeSlide(1), 5000);
</script>

{{-- MENU AKSES CEPAT (mengambang di atas hero, style kartu) --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl border p-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="#" class="group flex flex-col items-center text-center p-4 rounded-xl hover:bg-primary-50 transition">
            <div class="w-12 h-12 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V7l8-4v18M13 21V11l6 3v7"/></svg>
            </div>
            <p class="text-sm font-semibold text-gray-700">Profil Desa</p>
        </a>
        <a href="#" class="group flex flex-col items-center text-center p-4 rounded-xl hover:bg-primary-50 transition">
            <div class="w-12 h-12 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 012-2h2a2 2 0 012 2v6m-9 0h10a2 2 0 002-2V9.5a2 2 0 00-.6-1.4l-4-4a2 2 0 00-2.8 0l-4 4A2 2 0 005 9.5V17a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-sm font-semibold text-gray-700">Data Penduduk</p>
        </a>
        <a href="#" class="group flex flex-col items-center text-center p-4 rounded-xl hover:bg-primary-50 transition">
            <div class="w-12 h-12 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2m9-8a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-sm font-semibold text-gray-700">UMKM & Wisata</p>
        </a>
        <a href="#" class="group flex flex-col items-center text-center p-4 rounded-xl hover:bg-primary-50 transition">
            <div class="w-12 h-12 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <p class="text-sm font-semibold text-gray-700">Dokumen Desa</p>
        </a>
    </div>
</section>

{{-- SAMBUTAN KEPALA DESA --}}
<section id="profil" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid md:grid-cols-5 gap-12 items-center">
        <div class="md:col-span-2 flex justify-center">
            <div class="relative">
                <div class="absolute -inset-3 border-2 border-primary-200 rounded-2xl -rotate-3"></div>
                @if($profil && $profil->foto_kepala_desa)
                    <img src="{{ asset('storage/'.$profil->foto_kepala_desa) }}" class="relative rounded-2xl w-64 h-72 object-cover shadow-lg">
                @else
                    <div class="relative w-64 h-72 rounded-2xl bg-gray-100 flex items-center justify-center text-gray-400 text-sm text-center px-4 shadow-lg">
                        Foto Kepala Desa
                    </div>
                @endif
            </div>
        </div>
        <div class="md:col-span-3">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Sambutan</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2 mb-1">
                {{ $profil->nama_kepala_desa ?? 'Kepala Desa' }}
            </h2>
            <p class="text-sm text-gray-400 mb-6">Kepala Desa {{ $profil->nama_desa ?? '' }}</p>
            <p class="text-gray-600 leading-relaxed">
                {{ $profil->sambutan_kepala_desa ?? 'Sambutan kepala desa akan tampil di sini setelah diisi melalui dashboard admin.' }}
            </p>
        </div>
    </div>
</section>

{{-- STATISTIK PENDUDUK --}}
<section class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-primary-400 font-semibold text-sm uppercase tracking-wider">Statistik</span>
            <h2 class="text-2xl md:text-3xl font-bold text-white mt-2">Data Kependudukan</h2>
        </div>
        <div class="grid grid-cols-3 gap-6 max-w-3xl mx-auto">
            <div class="text-center border-r border-white/10 last:border-0">
                <p class="text-3xl md:text-4xl font-bold text-white">{{ number_format($totalPenduduk) }}</p>
                <p class="text-gray-400 text-sm mt-2">Total Penduduk</p>
            </div>
            <div class="text-center border-r border-white/10 last:border-0">
                <p class="text-3xl md:text-4xl font-bold text-white">{{ number_format($totalLaki) }}</p>
                <p class="text-gray-400 text-sm mt-2">Laki-laki</p>
            </div>
            <div class="text-center">
                <p class="text-3xl md:text-4xl font-bold text-white">{{ number_format($totalPerempuan) }}</p>
                <p class="text-gray-400 text-sm mt-2">Perempuan</p>
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section id="berita" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="flex justify-between items-end mb-10">
        <div>
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Kabar Desa</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2">Berita Terbaru</h2>
        </div>
        <a href="#" class="text-primary-600 font-medium text-sm hover:underline flex items-center gap-1">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($beritaTerbaru as $berita)
        <a href="#" class="group bg-white rounded-2xl border overflow-hidden hover:shadow-xl transition">
            <div class="relative h-48 overflow-hidden">
                @if($berita->gambar)
                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-full bg-gray-100"></div>
                @endif
                @if($berita->kategori)
                <span class="absolute top-3 left-3 bg-white/95 text-primary-700 text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $berita->kategori->nama_kategori }}
                </span>
                @endif
            </div>
            <div class="p-5">
                <p class="text-xs text-gray-400 mb-2">{{ $berita->tanggal_publish?->translatedFormat('d F Y') }}</p>
                <h3 class="font-semibold text-gray-800 line-clamp-2 group-hover:text-primary-600 transition">{{ $berita->judul }}</h3>
                <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $berita->ringkasan }}</p>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center py-16 bg-gray-50 rounded-2xl">
            <p class="text-gray-400">Belum ada berita yang dipublikasikan.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- AGENDA & PENGUMUMAN --}}
<section class="bg-primary-50/50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-12">
        <div>
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Jadwal</span>
            <h2 class="text-2xl font-bold text-gray-800 mt-2 mb-6">Agenda Desa</h2>
            <div class="space-y-3">
                @forelse($agenda as $item)
                <div class="flex gap-4 bg-white p-4 rounded-xl border hover:border-primary-300 transition">
                    <div class="bg-primary-600 text-white rounded-lg w-14 h-14 flex flex-col items-center justify-center flex-shrink-0">
                        <span class="font-bold text-lg leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
                        <span class="text-[10px] uppercase">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-sm">{{ $item->judul_kegiatan }}</h4>
                        <p class="text-xs text-gray-500 mt-1">{{ $item->lokasi }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-400 py-4 text-sm">Belum ada agenda mendatang.</p>
                @endforelse
            </div>
        </div>
        <div>
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Info</span>
            <h2 class="text-2xl font-bold text-gray-800 mt-2 mb-6">Pengumuman</h2>
            <div class="space-y-3">
                @forelse($pengumuman as $item)
                <div class="bg-white p-4 rounded-xl border hover:border-primary-300 transition">
                    <div class="flex justify-between items-start gap-3">
                        <h4 class="font-semibold text-gray-800 text-sm">{{ $item->judul }}</h4>
                        <span class="text-xs text-gray-400 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $item->isi }}</p>
                    @if($item->file)
                    <a href="{{ asset('storage/'.$item->file) }}" class="inline-flex items-center gap-1 text-xs text-primary-600 font-medium mt-2 hover:underline" target="_blank">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                        Unduh Lampiran
                    </a>
                    @endif
                </div>
                @empty
                <p class="text-gray-400 py-4 text-sm">Belum ada pengumuman.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-10">
        <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Dokumentasi</span>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2">Galeri Kegiatan</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($galeri as $foto)
        <div class="relative rounded-xl overflow-hidden h-44 group cursor-pointer">
            <img src="{{ asset('storage/'.$foto->file) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>
        </div>
        @empty
        <p class="text-gray-400 col-span-4 text-center py-16">Belum ada foto galeri.</p>
        @endforelse
    </div>
</section>

{{-- PETA LOKASI --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="text-center mb-10">
        <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Lokasi</span>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2">Peta Desa</h2>
    </div>
    <div class="rounded-2xl overflow-hidden border shadow-sm h-96">
        @if($profil && $profil->link_maps)
            <iframe src="{{ $profil->link_maps }}" class="w-full h-full" style="border:0;" allowfullscreen loading="lazy"></iframe>
        @else
            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">Peta belum tersedia</div>
        @endif
    </div>
</section>

@endsection