@extends('layouts.app')

@section('title', ($profil->nama_desa ?? 'Website Desa') . ' - Beranda')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap');

    .desa-site {
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
        color: var(--tinta);
        background: var(--kertas);
    }
    .desa-site .f-display { font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif; }
    .desa-site .f-mono { font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif; }

    .desa-site .kicker {
        font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--hijau);
    }
    .desa-site .rule-double {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 0.6rem;
        margin-bottom: 1.75rem;
    }
    .desa-site .rule-double span:first-child {
        width: 40px; height: 3px; background: var(--emas); border-radius: 2px;
    }
    .desa-site .rule-double span:last-child {
        width: 14px; height: 3px; background: var(--hijau); border-radius: 2px;
    }
    .desa-site .shield-frame {
        clip-path: polygon(50% 0%, 100% 34%, 82% 100%, 18% 100%, 0% 34%);
    }
</style>

<div class="desa-site">

{{-- HERO SLIDER FOTO DESA --}}
<section class="relative h-[600px] md:h-[700px] overflow-hidden bg-[var(--tinta)]">

    {{-- SLIDE 1: FOTO GAPURA DESA 1 --}}
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
        <img src="{{ asset('images/fotogapuradesa1.jpeg') }}" class="w-full h-full object-cover" alt="Gapura Desa 1">
        <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(10,10,8,0.15) 0%, rgba(10,10,8,0.35) 45%, rgba(10,10,8,0.75) 100%);"></div>
        <div class="absolute inset-0 flex items-end md:items-center justify-center text-center px-4 pb-16 md:pb-0 z-10">
            <div class="max-w-3xl mx-auto">
                <p class="inline-block kicker text-[var(--emas-terang)] mb-4 bg-black/35 backdrop-blur-sm px-3 py-1.5 rounded-full">Selamat Datang</p>
                <h1 class="f-display text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight leading-[1.05]" style="text-shadow: 0 2px 18px rgba(0,0,0,0.45);">
                    {{ $profil->nama_desa ?? 'Desa Kami' }}
                </h1>
                <p class="text-white text-sm md:text-base font-medium tracking-[0.08em] uppercase" style="text-shadow: 0 1px 10px rgba(0,0,0,0.5);">
                    {{ $profil->motto ?? 'Desa Kecupak 1' }}
                </p>
            </div>
        </div>
    </div>

    {{-- SLIDE 2: FOTO GAPURA DESA 2 --}}
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0">
        <img src="{{ asset('images/airterjun.jpeg') }}" class="w-full h-full object-cover" alt="Gapura Desa 2">
        <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(10,10,8,0.15) 0%, rgba(10,10,8,0.35) 45%, rgba(10,10,8,0.75) 100%);"></div>
        <div class="absolute inset-0 flex items-end md:items-center justify-center text-center px-4 pb-16 md:pb-0 z-10">
            <div class="max-w-3xl mx-auto">
                <p class="inline-block kicker text-[var(--emas-terang)] mb-4 bg-black/35 backdrop-blur-sm px-3 py-1.5 rounded-full">Wisata &amp; Potensi</p>
                <h1 class="f-display text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight leading-[1.05]" style="text-shadow: 0 2px 18px rgba(0,0,0,0.45);">
                    {{ strtoupper($profil->nama_desa ?? 'Desa') }}
                </h1>
                <p class="text-white text-sm md:text-base font-medium tracking-[0.04em]" style="text-shadow: 0 1px 10px rgba(0,0,0,0.5);">
                    Jelajahi keindahan alam dan potensi unggulan yang ada di desa kami
                </p>
            </div>
        </div>
    </div>

    {{-- TOMBOL NAVIGASI --}}
    <button onclick="changeSlide(-1)" class="absolute left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border border-white/40 text-white flex items-center justify-center hover:bg-[var(--emas)] hover:border-[var(--emas)] hover:text-[var(--tinta)] transition">
        &#8592;
    </button>
    <button onclick="changeSlide(1)" class="absolute right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border border-white/40 text-white flex items-center justify-center hover:bg-[var(--emas)] hover:border-[var(--emas)] hover:text-[var(--tinta)] transition">
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
<section class="py-20 bg-white border-b border-[var(--garis)]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 pr-0 lg:pr-6">
                <p class="kicker">Mulai Dari Sini</p>
                <h2 class="f-display text-3xl md:text-4xl font-bold text-[var(--tinta)] mt-2 mb-5">Jelajahi Desa</h2>
                <div class="rule-double"><span></span><span></span></div>
                <p class="text-[var(--tinta-lembut)] leading-relaxed text-base md:text-lg -mt-4">
                    Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan desa. Aspek pemerintahan, penduduk, demografi, dan juga berita tentang desa.
                </p>
            </div>
            <div class="lg:col-span-7 grid grid-cols-2 gap-6 sm:gap-8">
                <a href="{{ route('profil.visimisi') }}" class="group bg-[var(--kertas)] border border-[var(--garis)] rounded-lg p-8 sm:p-10 text-center hover:border-[var(--hijau)] hover:shadow-[0_10px_30px_rgba(29,92,58,0.10)] transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-14 h-14 mb-5 text-[var(--hijau-tua)] group-hover:text-[var(--emas)] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l8-4v18M13 21V11l6 3v7M9 9h1m-1 3h1m-1 3h1"/></svg>
                    <p class="font-semibold text-[var(--tinta)] text-xs sm:text-sm tracking-[0.1em] uppercase">Profil Desa</p>
                </a>
                <a href="{{ route('demografi') }}" class="group bg-[var(--kertas)] border border-[var(--garis)] rounded-lg p-8 sm:p-10 text-center hover:border-[var(--hijau)] hover:shadow-[0_10px_30px_rgba(29,92,58,0.10)] transition duration-300 flex flex-col items-center justify-center">
                    <svg class="w-14 h-14 mb-5 text-[var(--hijau-tua)] group-hover:text-[var(--emas)] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <p class="font-semibold text-[var(--tinta)] text-xs sm:text-sm tracking-[0.1em] uppercase">Infografis</p>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- SAMBUTAN KEPALA DESA --}}
<section id="profil" class="py-24 bg-[var(--kertas)]">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid md:grid-cols-12 gap-10 md:gap-16 items-center">
            <div class="md:col-span-5 flex justify-center">
                <div class="relative w-64 h-72 sm:w-72 sm:h-80 lg:w-80 lg:h-[22rem]">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 w-7 h-7 text-[var(--merah)]">
                        <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12,2 14.9,9.1 22,9.3 16.5,14.4 18.2,21.4 12,17.5 5.8,21.4 7.5,14.4 2,9.3 9.1,9.1"/></svg>
                    </div>
                    <div class="absolute inset-0 shield-frame" style="background: linear-gradient(160deg, var(--hijau-tua), var(--biru-tua));"></div>
                    <div class="absolute inset-[6px] shield-frame overflow-hidden bg-white">
                        @if($profil && $profil->foto_kepala_desa)
                            <img src="{{ asset('storage/'.$profil->foto_kepala_desa) }}" class="w-full h-full object-cover object-top">
                        @else
                            <div class="w-full h-full bg-[var(--garis)]/60 flex items-center justify-center text-[var(--tinta-lembut)] font-medium text-sm text-center px-4">Foto Kepala Desa</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="md:col-span-7 text-left">
                <p class="kicker">Sambutan</p>
                <h2 class="f-display text-2xl sm:text-3xl font-bold text-[var(--tinta)] mt-2 mb-1">
                    Kepala Desa {{ $profil->nama_desa ?? '' }}
                </h2>
                <div class="rule-double"><span></span><span></span></div>
                <h3 class="font-bold text-[var(--tinta)] text-lg sm:text-xl tracking-wide -mt-3 mb-1">
                    {{ $profil->nama_kepala_desa ?? 'Nama Kepala Desa' }}
                </h3>
                <p class="text-xs sm:text-sm font-semibold text-[var(--emas)] uppercase tracking-[0.15em] mb-6">
                    Kepala Desa
                </p>
                <div class="relative border-l-2 border-[var(--hijau)] pl-6 py-1">
                    <span class="f-display absolute -left-1 -top-4 text-6xl text-[var(--hijau)]/20 select-none">&ldquo;</span>
                    <p class="text-[var(--tinta-lembut)] leading-relaxed text-sm sm:text-base italic relative">
                        {{ $profil->sambutan_kepala_desa ?? 'Selamat datang di website resmi desa kami. Website ini dibangun untuk mempermudah sistem dan tatakelola kerja pemerintah desa serta mempermudah penyampaian informasi di setiap agenda dan kegiatan pemerintah desa kepada masyarakat agar terbangun keterbukaan informasi.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PETA DESA --}}
<section class="py-20 bg-white border-y border-[var(--garis)]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <p class="kicker">Orientasi Wilayah</p>
        <h2 class="f-display text-3xl md:text-4xl font-bold text-[var(--tinta)] mt-2 mb-1">Peta Desa</h2>
        <div class="rule-double"><span></span><span></span></div>
        <p class="text-[var(--tinta-lembut)] mb-8 text-sm md:text-base -mt-4">
            Menampilkan peta wilayah dan jalur navigasi menuju <span class="italic">{{ $profil->nama_desa ?? 'Desa Kecupak 1' }}</span>
        </p>

        <div class="rounded-lg overflow-hidden border border-[var(--garis)] shadow-sm h-[450px] bg-[var(--kertas)] relative">
            <iframe 
                src="https://maps.google.com/maps?q=Kecupak+I,+Pergetteng+Getteng+Sengkut,+Pakpak+Bharat+Regency&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

{{-- SOTK / STRUKTUR ORGANISASI --}}
<section id="sotk" class="py-24 bg-[var(--kertas)]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="mb-12">
            <p class="kicker">Struktur Organisasi</p>
            <h2 class="f-display text-3xl md:text-4xl font-bold text-[var(--tinta)] mt-2">Bagan Desa</h2>
            <div class="rule-double"><span></span><span></span></div>
            <p class="text-[var(--tinta-lembut)] -mt-4">Struktur Organisasi Pemerintah Desa &amp; BPD</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-5 rounded-lg border border-[var(--garis)]">
                <h3 class="font-semibold text-[var(--tinta)] mb-4 text-sm uppercase tracking-wide">Struktur Organisasi Pemerintahan Desa</h3>
                <img src="{{ asset('images/struktur.png') }}" class="w-full h-auto rounded" alt="SOTK 1">
            </div>
            <div class="bg-white p-5 rounded-lg border border-[var(--garis)]">
                <h3 class="font-semibold text-[var(--tinta)] mb-4 text-sm uppercase tracking-wide">Struktur Organisasi BPD</h3>
                <img src="{{ asset('images/bpd.png') }}" class="w-full h-auto rounded" alt="SOTK 2">
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section id="berita" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-end mb-10 pb-5 border-b border-[var(--garis)]">
            <div>
                <p class="kicker">Informasi Terkini</p>
                <h2 class="f-display text-3xl md:text-4xl font-bold text-[var(--tinta)] mt-2">Berita Terbaru</h2>
            </div>
            <a href="#" class="text-[var(--tinta-lembut)] font-semibold text-xs sm:text-sm uppercase tracking-wider hover:text-[var(--hijau-tua)] transition flex items-center gap-1">
                Lihat Semua
                <span class="text-lg leading-none">&rarr;</span>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($beritaTerbaru as $berita)
            <div class="bg-white rounded-lg border border-[var(--garis)] overflow-hidden hover:shadow-lg transition duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-52 bg-[var(--garis)]/40 overflow-hidden">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[var(--tinta-lembut)] text-sm">Tidak ada gambar</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <p class="f-mono text-[11px] text-[var(--hijau-tua)] font-medium tracking-widest mb-2">{{ $berita->tanggal_publish?->translatedFormat('d F Y') }}</p>
                        <h3 class="font-bold text-[var(--tinta)] text-lg line-clamp-2 hover:text-[var(--hijau-tua)] transition leading-snug">{{ $berita->judul }}</h3>
                        <p class="text-sm text-[var(--tinta-lembut)] mt-3 line-clamp-3 leading-relaxed">{{ $berita->ringkasan }}</p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2">
                    <a href="#" class="text-xs font-semibold text-[var(--hijau-tua)] uppercase tracking-wider hover:underline">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            @empty
            <p class="text-[var(--tinta-lembut)] col-span-3 text-center py-12 font-medium">Belum ada berita.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- AGENDA & PENGUMUMAN --}}
<section class="py-20 bg-[var(--kertas)] border-t border-[var(--garis)]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 grid md:grid-cols-2 gap-12 lg:gap-16">
        <div>
            <p class="kicker">Jadwal</p>
            <h2 class="f-display text-2xl font-bold text-[var(--tinta)] mt-2 mb-6">Agenda Desa</h2>
            <div class="space-y-4">
                @forelse($agenda as $item)
                <div class="flex items-center gap-5 bg-white p-5 rounded-lg border border-[var(--garis)] hover:shadow-md transition">
                    <div class="bg-[var(--hijau-tua)] text-white rounded-md px-4 py-3 text-center min-w-[70px]">
                        <p class="f-display font-bold text-2xl leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</p>
                        <p class="text-[11px] font-medium uppercase tracking-wider mt-1 text-[var(--emas-terang)]">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-[var(--tinta)] text-base hover:text-[var(--hijau-tua)] transition">{{ $item->judul_kegiatan }}</h4>
                        <p class="text-xs font-medium text-[var(--tinta-lembut)] mt-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[var(--emas)]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            {{ $item->lokasi }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="text-[var(--tinta-lembut)] py-6 text-sm font-medium italic">Belum ada agenda mendatang.</p>
                @endforelse
            </div>
        </div>
        <div>
            <p class="kicker">Informasi Resmi</p>
            <h2 class="f-display text-2xl font-bold text-[var(--tinta)] mt-2 mb-6">Pengumuman</h2>
            <div class="space-y-4">
                @forelse($pengumuman as $item)
                <div class="bg-white p-6 rounded-lg border border-[var(--garis)] hover:shadow-md transition">
                    <div class="flex justify-between items-start gap-4 mb-2">
                        <h4 class="font-bold text-[var(--tinta)] text-base leading-snug">{{ $item->judul }}</h4>
                        <span class="f-mono text-[10px] font-medium bg-[var(--hijau-tua)]/10 text-[var(--hijau-tua)] px-2.5 py-1 rounded whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                    </div>
                    <p class="text-sm text-[var(--tinta-lembut)] line-clamp-2 leading-relaxed">{{ $item->isi }}</p>
                </div>
                @empty
                <p class="text-[var(--tinta-lembut)] py-6 text-sm font-medium italic">Belum ada pengumuman.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <p class="kicker">Dokumentasi</p>
        <h2 class="f-display text-2xl font-bold text-[var(--tinta)] mt-2 mb-8">Galeri Terbaru</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6">
            @forelse($galeri as $foto)
            <div class="group relative rounded-lg overflow-hidden aspect-video bg-[var(--garis)]/40">
                <img src="{{ asset('storage/'.$foto->file) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-[var(--hijau-tua)]/0 group-hover:bg-[var(--hijau-tua)]/20 transition duration-300"></div>
            </div>
            @empty
            <p class="text-[var(--t_inta-lembut)] col-span-4 text-center py-12 font-medium">Belum ada foto galeri.</p>
            @endforelse
        </div>
    </div>
</section>

</div>

@endsection