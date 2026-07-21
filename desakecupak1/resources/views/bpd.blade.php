@extends('layouts.app')

@section('title', 'Badan Permusyawaratan Desa - Desa Kecupak 1')

@section('content')
<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 tracking-tight">Badan Permusyawaratan Desa (BPD)</h1>
            <p class="text-gray-600 mt-3 text-lg">Lembaga Perwujudan Demokrasi dalam Pemerintahan Desa Kecupak 1</p>
            <div class="w-24 h-1.5 bg-[#6CE045] mx-auto mt-5 rounded-full"></div>
        </div>

        <!-- GAMBAR / STRUKTUR BPD -->
        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 mb-12 text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center justify-center gap-2">
                STRUKTUR BADAN DAN PERMUSYAWARATAN DESA Kecupak 1
            </h3>        
            <div class="rounded-xl overflow-hidden bg-gray-100 border border-gray-200 max-w-3xl mx-auto">
                <img src="{{ asset('images/bpd.jpg') }}" onerror="this.src='{{ asset('images/bpd.png') }}'" class="w-full h-auto object-contain max-h-[550px] mx-auto" alt="Struktur BPD Desa Kecupak 1">
            </div>
        
        </div>

        <!-- INFORMASI / TUGAS BPD -->
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                    📋 Fungsi Utama BPD
                </h3>
                <ul class="space-y-3 text-gray-700 font-medium text-sm leading-relaxed">
                    <li class="flex items-start gap-2">• Membahas dan menyepakati Rancangan Peraturan Desa bersama Kepala Desa.</li>
                    <li class="flex items-start gap-2">• Menampung dan menyalurkan aspirasi masyarakat desa.</li>
                    <li class="flex items-start gap-2">• Mengawasan kinerja Kepala Desa dalam penyelenggaraan pemerintahan desa.</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                    ⚖️ Wewenang BPD
                </h3>
                <ul class="space-y-3 text-gray-700 font-medium text-sm leading-relaxed">
                    <li class="flex items-start gap-2">• Mengadakan musyawarah desa untuk hal-hal strategis.</li>
                    <li class="flex items-start gap-2">• Memberikan masukan dan evaluasi terhadap Laporan Keterangan Penyelenggaraan Pemerintahan Desa.</li>
                    <li class="flex items-start gap-2">• Membentuk panitia pemilihan kepala desa tingkat dusun/desa.</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection