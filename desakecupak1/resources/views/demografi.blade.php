@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800">Dashboard Statistik Kependudukan</h1>
            <p class="text-gray-500 mt-2">Data Monografi Desa Kecupak 1 Tahun 2026</p>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            @php
                $stats = [
                    ['👥', 'Total Penduduk', '914'],
                    ['🏠', 'Kepala Keluarga', '248'],
                    ['👨', 'Laki-Laki', '454'],
                    ['👩', 'Perempuan', '460']
                ];
            @endphp
            @foreach($stats as $s)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-2">{{ $s[0] }}</div>
                <p class="text-sm text-gray-500 font-medium">{{ $s[1] }}</p>
                <p class="text-2xl font-bold text-gray-800">{{ $s[2] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Grid Data -->
        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Penduduk Berdasarkan Dusun -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">📍 Penduduk Berdasarkan Dusun</h3>
                <div class="space-y-4">
                    @foreach(['Dusun Delamdam I' => '211', 'Dusun Delamdam II' => '188', 'Dusun Nambunga Buluh' => '212', 'Dusun Tuppak Beak' => '134', 'Dusun Pulo Namuk' => '169'] as $dusun => $jumlah)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                        <span class="font-medium text-gray-700">{{ $dusun }}</span>
                        <span class="font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full text-sm">{{ $jumlah }} Jiwa</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Penduduk Berdasarkan Agama -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">☪️ Penduduk Berdasarkan Agama</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 border rounded-xl bg-gray-50">
                        <p class="text-gray-500 text-sm">Islam</p>
                        <p class="text-xl font-bold text-gray-800">455 Jiwa</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50">
                        <p class="text-gray-500 text-sm">Kristen</p>
                        <p class="text-xl font-bold text-gray-800">452 Jiwa</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50">
                        <p class="text-gray-500 text-sm">Katolik</p>
                        <p class="text-xl font-bold text-gray-800">7 Jiwa</p>
                    </div>
                    <div class="p-4 border rounded-xl bg-gray-50">
                        <p class="text-gray-500 text-sm">Masjid</p>
                        <p class="text-xl font-bold text-gray-800">2 Unit</p>
                    </div>
                </div>
            </div>

            <!-- Pekerjaan -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 md:col-span-2">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">💼 Penduduk Berdasarkan Pekerjaan</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach(['Wiraswasta' => '44', 'PNS' => '4', 'TNI/POLRI' => '7', 'Pengangguran' => '0', 'Lain-lain' => '344', 'Petani' => '511'] as $job => $jml)
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-gray-500 text-sm">{{ $job }}</p>
                        <p class="text-lg font-bold text-gray-800">{{ $jml }} Orang</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection