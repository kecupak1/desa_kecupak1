@extends('layouts.app')

@section('title', 'Struktur Organisasi - Desa Kecupak 1')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <!-- ========================================== -->
        <!-- BAGIAN 1: BAGAN STRUKTUR ORGANISASI -->
        <!-- ========================================== -->
        <div class="mb-20">
            <div class="mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 tracking-wide">Bagan Desa</h2>
                <p class="text-gray-600 mt-2">Struktur Organisasi Pemerintahan Desa Kecupak 1</p>
                <div class="w-20 h-1.5 bg-[#6CE045] mt-4 rounded-full"></div>
            </div>
            
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-200">
                <!-- Memanggil file gambar bagan bernama 'struktur' -->
                <!-- Pastikan kamu sudah menaruh file struktur.png atau struktur.jpg di folder public/images -->
                <img src="{{ asset('images/struktur.png') }}" class="w-full h-auto rounded-xl object-contain" alt="Bagan Struktur Organisasi">
            </div>
        </div>

        <!-- ========================================== -->
        <!-- BAGIAN 2: SOTK (KARTU PERANGKAT DESA) -->
        <!-- ========================================== -->
        <div>
            <div class="mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#6CE045] uppercase tracking-wide">SOTK</h2>
                <p class="text-gray-800 mt-1 font-medium">Struktur Organisasi dan Tata Kerja Desa Kecupak 1</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($perangkat as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col border border-gray-100">
                    
                    <!-- Area Foto -->
                    <div class="relative w-full h-72 bg-gray-100">
                        @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}" class="w-full h-full object-cover object-top" alt="{{ $item->nama }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 font-medium text-sm">Foto Belum Tersedia</div>
                        @endif
                    </div>

                    <!-- Label Nama & Jabatan (Warna Hijau) -->
                    <!-- Warna bg-[#6CE045] disesuaikan agar mirip dengan contoh fotomu -->
                    <div class="bg-[#6CE045] text-white text-center py-4 px-3 flex-grow flex flex-col justify-center">
                        <h3 class="font-bold text-base uppercase tracking-wide drop-shadow-sm">{{ $item->nama }}</h3>
                        <p class="text-xs mt-1 uppercase tracking-wider text-white/90 font-medium">{{ $item->jabatan }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 bg-white rounded-xl border border-gray-200 text-gray-500">
                    Data perangkat desa belum tersedia.
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection