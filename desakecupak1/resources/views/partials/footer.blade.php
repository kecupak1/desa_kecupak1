<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white font-bold text-lg mb-3">{{ $profil->nama_desa ?? 'Desa Kecupak 1' }}</h3>
                <p class="text-sm text-gray-400">{{ $profil->gambaran_umum ?? 'Website resmi desa untuk informasi dan pelayanan masyarakat.' }}</p>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Profil Desa</a></li>
                    <li><a href="#" class="hover:text-white">Berita</a></li>
                    <li><a href="#" class="hover:text-white">Agenda</a></li>
                    <li><a href="#" class="hover:text-white">Pengumuman</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3">Layanan</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">UMKM Desa</a></li>
                    <li><a href="#" class="hover:text-white">Wisata Desa</a></li>
                    <li><a href="#" class="hover:text-white">Dokumen Desa</a></li>
                    <li><a href="#" class="hover:text-white">APBDes</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-3">Kontak</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>📍 {{ $profil->alamat_kantor ?? 'Alamat Kantor Desa' }}</li>
                    <li>📞 {{ $profil->no_hp ?? '-' }}</li>
                    <li>✉️ {{ $profil->email ?? '-' }}</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ $profil->nama_desa ?? 'KKN' }}. Seluruh Hak Cipta Dilindungi.
        </div>
    </div>
</footer>