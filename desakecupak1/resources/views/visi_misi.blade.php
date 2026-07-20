@extends('layouts.app')

@section('title', 'Visi & Misi - Desa Kecupak 1')

@section('content')

<style>
    .desa-dashboard {
        --hijau-tua: #14532d;
        --hijau: #1f7a43;
        --emas: #a9822b;
        --krem: #f8f6f1;
        --garis: #e6e2d8;
        --teks: #262622;
        --teks-muted: #6b6b63;
        font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
        background: var(--krem);
        color: var(--teks);
    }
    .desa-dashboard .font-serif-display {
        font-family: 'Lora', Georgia, 'Times New Roman', serif;
    }
    .desa-dashboard .eyebrow {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--emas);
    }
    .desa-dashboard .card {
        background: #fff;
        border: 1px solid var(--garis);
        border-radius: 0.5rem;
    }
    .desa-dashboard .section-head {
        border-bottom: 2px solid var(--hijau-tua);
        padding-bottom: 0.85rem;
        margin-bottom: 1.75rem;
    }
    .desa-dashboard .gold-rule {
        width: 56px;
        height: 3px;
        background: var(--emas);
        border-radius: 2px;
    }
    .desa-dashboard .misi-item {
        position: relative;
        padding-left: 3.25rem;
    }
    .desa-dashboard .misi-item::before {
        content: '';
        position: absolute;
        left: 1.1rem;
        top: 2.6rem;
        bottom: -1.75rem;
        width: 1px;
        background: var(--garis);
    }
    .desa-dashboard .misi-item:last-child::before {
        display: none;
    }
    .desa-dashboard .misi-num {
        position: absolute;
        left: 0;
        top: 0;
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 9999px;
        border: 1.5px solid var(--hijau-tua);
        color: var(--hijau-tua);
        font-family: 'Lora', serif;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        z-index: 1;
    }
</style>

<div class="desa-dashboard min-h-screen py-14">
    <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-12">

        <!-- Letterhead -->
        <div class="relative border-b border-[var(--garis)] pb-8 mb-14 text-center">
            <p class="eyebrow mb-2">Bagian II &middot; Gambaran Umum Pemerintahan Desa</p>
            <h1 class="font-serif-display text-3xl md:text-5xl font-bold text-[var(--hijau-tua)] tracking-tight">
                A. Visi &amp; Misi
            </h1>
            <div class="gold-rule mt-5 mx-auto"></div>
        </div>

        <!-- MISI UTAMA -->
        <div class="mb-16">
            <div class="section-head text-center">
                <p class="eyebrow mb-1">Misi</p>
                <h2 class="font-serif-display text-2xl md:text-3xl font-bold text-[var(--teks)]">
                </h2>
                <p class="text-[var(--teks-muted)] mt-3 max-w-2xl mx-auto">antara lain:</p>
            </div>

            @php
                $misiUtama = [
                    'Mengoptimalkan kinerja Pemerintah Desa, memberikan pelayanan yang maksimal kepada masyarakat secara efektif yang tepat, cepat dan benar;',
                    'Mewujudkan Program penyedian air minum / PAMSIMAS;',
                    'Menyediakan pelayanan kebutuhan dasar Masyarakat dengan memprioritaskan pembangunan di bidang kesehatan bagi Masyarakat dan mengupayakan penurunan stunting;',
                    'Meningkatkan Peran Lembaga Desa dalam rangka meningkatkan Pembangunan Desa melalui pembinaan yang terarah dan berkelanjutan;',
                    'Mengoptimalkan Pembangunan di sektor Pertanian dengan menyediakan pelatihan, menyalurkan bantuan bibit dan pupuk yang berkualitas dan menyediakan sarana dan prasarana pertanian yang terarah sekaligus memberdayakan kelompok Tani yang ada di Desa Kecupak I;',
                    'Melaksanakan pembangunan di segala bidang dalam usaha memajukan Desa Kecupak I yang lebih baik, dengan mengedepankan aspirasi masyarakat;'
                ];
            @endphp

            <div class="max-w-3xl mx-auto">
                @foreach($misiUtama as $index => $misi)
                <div class="misi-item pb-7">
                    <div class="misi-num">{{ $index + 1 }}</div>
                    <div class="card p-5">
                        <p class="text-[var(--teks)] leading-relaxed">{{ $misi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- RINCIAN MISI BERDASARKAN BIDANG -->
        <div>
            <div class="section-head text-center">
                <p class="eyebrow mb-1">Visi</p>
                <h2 class="font-serif-display text-2xl md:text-3xl font-bold text-[var(--teks)]">
                    Rincian Misi dari Masing-Masing Bidang
                </h2>
                <p class="text-[var(--teks-muted)] mt-3 max-w-2xl mx-auto">Adapun rincian misi dari masing-masing bidang yaitu:</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Bidang Pemerintahan -->
                <div class="card p-8">
                    <h3 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        A. Bidang Pemerintahan
                    </h3>
                    <ol class="space-y-3 text-[var(--teks)] list-decimal list-inside">
                        <li>Meningkatkan Sumber Daya Manusia (SDM) Aparatur Desa;</li>
                        <li>Mewujudkan Tata Kelola Pemerintahan Desa yang lebih baik;</li>
                        <li>Memberdayakan Kelembagaan Masyarakat;</li>
                        <li>Memberdayakan LINMAS Desa.</li>
                    </ol>
                </div>

                <!-- Bidang Pembangunan -->
                <div class="card p-8">
                    <h3 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        B. Bidang Pembangunan
                    </h3>
                    <ol class="space-y-3 text-[var(--teks)] list-decimal list-inside">
                        <li>Meningkatkan Sarana dan Prasarana Umum;</li>
                        <li>Meningkatkan Sarana dan Prasarana Pertanian;</li>
                        <li>Meningkatkan Sarana dan Prasarana Kesehatan;</li>
                        <li>Memberdayakan dan meningkatkan Swadaya Masyarakat;</li>
                        <li>Memanfaatkan Sumberdaya alam dan Pemanfaatannya;</li>
                        <li>Memelihara Sarana dan Prasarana Keamanan dan Ketertiban Masyarakat (KANTRANTIBMAS);</li>
                        <li>Memelihara sarana dan prasarana pendidikan Usia Dini (PAUD).</li>
                    </ol>
                </div>

                <!-- Bidang Pembinaan Masyarakat -->
                <div class="card p-8">
                    <h3 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        C. Bidang Pembinaan Masyarakat
                    </h3>
                    <ol class="space-y-3 text-[var(--teks)] list-decimal list-inside">
                        <li>Membina kerukunan antar Suku, Ras, dan Agama;</li>
                        <li>Melestarikan Adat dan Budaya yang ada di Desa;</li>
                        <li>Melakukan kegiatan Pembinaan Generasi Muda melalui Karang Taruna dan Organisasi Kepemudaan yang ada di Desa.</li>
                    </ol>
                </div>

                <!-- Bidang Pemberdayaan Kemasyarakatan -->
                <div class="card p-8">
                    <h3 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        D. Bidang Pemberdayaan Kemasyarakatan
                    </h3>
                    <ol class="space-y-3 text-[var(--teks)] list-decimal list-inside">
                        <li>Memberdayakan dan memelihara hidup bergotong-royong;</li>
                        <li>Memberdayakan lembaga kemasyarakatan Desa.</li>
                    </ol>
                </div>

            </div>
        </div>

        <p class="text-center text-xs text-[var(--teks-muted)] mt-14">
            Sumber: Profil Desa Kecupak I &middot; Bagian II, Gambaran Umum Pemerintahan Desa
        </p>

    </div>
</div>

@endsection