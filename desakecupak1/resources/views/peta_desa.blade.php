@extends('layouts.app')

@section('title', 'Peta & Kondisi Geografis - Desa Kecupak 1')

@section('content')
<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 tracking-tight">Peta & Kondisi Geografis</h1>
            <p class="text-gray-600 mt-3 text-lg">Informasi Wilayah, Batas, dan Lokasi Google Maps Desa Kecupak 1</p>
            <div class="w-24 h-1.5 bg-[#6CE045] mx-auto mt-5 rounded-full"></div>
        </div>

        <!-- GRID UTAMA -->
        <div class="grid lg:grid-cols-3 gap-8 items-start">
            
            <!-- KIRI: INFORMASI LUAS & BATAS WILAYAH -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Luas Wilayah Card -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <div class="w-12 h-12 bg-green-100 text-[#4fa831] rounded-xl flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                        📐
                    </div>
                    <h3 class="text-gray-500 font-medium text-sm uppercase tracking-wider">Luas Wilayah Desa</h3>
                    <p class="text-3xl font-extrabold text-gray-800 mt-2">± 1.740 Ha</p>
                    <p class="text-xs text-gray-400 mt-1">Berdasarkan Data Monografi Desa</p>
                </div>

                <!-- Batas Wilayah Card -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2 border-b pb-3">
                        🧭 Batas Wilayah
                    </h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-gray-500 font-medium">Sebelah Utara</span>
                            <span class="font-bold text-gray-800 text-right">Desa Mahala Majanggut I</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-gray-500 font-medium">Sebelah Selatan</span>
                            <span class="font-bold text-gray-800 text-right">Desa Aornakan II</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-gray-50 pb-2">
                            <span class="text-gray-500 font-medium">Sebelah Timur</span>
                            <span class="font-bold text-gray-800 text-right">Desa Kecupak II</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-gray-500 font-medium">Sebelah Barat</span>
                            <span class="font-bold text-gray-800 text-right">Desa Simerpara</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- KANAN: GOOGLE MAPS EMBED -->
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        🗺️ Titik Lokasi Peta Desa Kecupak 1
                    </h3>
                    <p class="text-gray-500 text-sm mb-6">Peta interaktif wilayah Kecamatan Pergetteng Getteng Sengkut, Kabupaten Pakpak Bharat.</p>
                    
                    <!-- Kotak Google Maps -->
                    <div class="rounded-xl overflow-hidden shadow-sm border border-gray-200 h-[450px]">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.5!2d98.2!3d2.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031f!2sKecupak%20I%2C%20Pergetteng%20Getteng%20Sengkut%2C%20Pakpak%20Bharat%20Regency%2C%20North%20Sumatra!5e0!3m2!1sen!2sid!4v1650000000000!5m2!1sen!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-xs text-center text-gray-400 mt-3">*Anda dapat menggeser atau memperbesar tampilan peta di atas secara langsung.</p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection