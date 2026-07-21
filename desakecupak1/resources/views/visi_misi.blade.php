@extends('layouts.app')
@section('title', 'Visi & Misi - Desa Kecupak 1')
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
    .desa-site .card {
        background: #fff;
        border: 1px solid var(--garis);
        border-radius: 0.5rem;
    }
</style>

<div class="desa-site min-h-screen py-14">
    <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-12">

        <!-- MISI UTAMA -->
        <div class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-[var(--hijau-tua)]">Misi</h2>
                <p class="text-[var(--tinta-lembut)] max-w-2xl mx-auto mt-3">antara lain:</p>
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

            <div class="max-w-3xl mx-auto grid gap-4">
                @foreach($misiUtama as $index => $misi)
                <div class="card p-6 flex items-start gap-4">
                    <span class="font-bold text-[var(--hijau-tua)] text-lg shrink-0">{{ $index + 1 }}.</span>
                    <p class="text-[var(--tinta)] leading-relaxed">{{ $misi }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- RINCIAN MISI BERDASARKAN BIDANG -->
        <div>
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-[var(--hijau-tua)]">Visi</h2>
                <p class="text-[var(--tinta-lembut)] max-w-2xl mx-auto mt-3">Adapun rincian misi dari masing-masing bidang yaitu:</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Bidang Pemerintahan -->
                <div class="card p-8">
                    <h3 class="text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        A. Bidang Pemerintahan
                    </h3>
                    <ol class="space-y-3 text-[var(--tinta)] list-decimal list-inside">
                        <li>Meningkatkan Sumber Daya Manusia (SDM) Aparatur Desa;</li>
                        <li>Mewujudkan Tata Kelola Pemerintahan Desa yang lebih baik;</li>
                        <li>Memberdayakan Kelembagaan Masyarakat;</li>
                        <li>Memberdayakan LINMAS Desa.</li>
                    </ol>
                </div>

                <!-- Bidang Pembangunan -->
                <div class="card p-8">
                    <h3 class="text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        B. Bidang Pembangunan
                    </h3>
                    <ol class="space-y-3 text-[var(--tinta)] list-decimal list-inside">
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
                    <h3 class="text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        C. Bidang Pembinaan Masyarakat
                    </h3>
                    <ol class="space-y-3 text-[var(--tinta)] list-decimal list-inside">
                        <li>Membina kerukunan antar Suku, Ras, dan Agama;</li>
                        <li>Melestarikan Adat dan Budaya yang ada di Desa;</li>
                        <li>Melakukan kegiatan Pembinaan Generasi Muda melalui Karang Taruna dan Organisasi Kepemudaan yang ada di Desa.</li>
                    </ol>
                </div>

                <!-- Bidang Pemberdayaan Kemasyarakatan -->
                <div class="card p-8">
                    <h3 class="text-lg font-bold text-[var(--hijau-tua)] mb-4 pb-3 border-b border-[var(--garis)]">
                        D. Bidang Pemberdayaan Kemasyarakatan
                    </h3>
                    <ol class="space-y-3 text-[var(--tinta)] list-decimal list-inside">
                        <li>Memberdayakan dan memelihara hidup bergotong-royong;</li>
                        <li>Memberdayakan lembaga kemasyarakatan Desa.</li>
                    </ol>
                </div>

            </div>
        </div>

        <p class="text-center text-xs text-[var(--tinta-lembut)] mt-14">
            Sumber: Profil Desa Kecupak I &middot; Bagian II, Gambaran Umum Pemerintahan Desa
        </p>

    </div>
</div>

@endsection