@extends('admin.layout')

@section('content')
<div class="space-y-8 pb-10">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Manajemen Agenda Desa</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola jadwal kegiatan dan agenda acara desa dengan mudah.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-semibold rounded-full border border-green-200">
                Total Agenda: {{ count($agendas) }}
            </span>
        </div>
    </div>

    <!-- Grid Konten: Form di Kiri/Atas & Tabel di Bawah/Kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Form Tambah Agenda (1 Kolom di Desktop) -->
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 sticky top-6">
                <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center font-bold text-lg">
                        +
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Tambah Agenda Baru</h2>
                        <p class="text-xs text-gray-400">Isi formulir untuk membuat kegiatan</p>
                    </div>
                </div>

                <form action="/admin/agenda" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Judul Agenda</label>
                        <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Rapat Koordinasi Desa" required class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}" required class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Lokasi</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Aula Kantor Desa" required class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" placeholder="Tuliskan keterangan detail kegiatan..." class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Foto Dokumentasi (Opsional)</label>
                        <input type="file" name="gambar" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer border border-gray-200 rounded-xl bg-gray-50">
                    </div>

                    <button type="submit" class="w-full mt-2 py-3 px-4 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-green-600/20 transition-all duration-200 flex items-center justify-center gap-2">
                        Simpan Agenda
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Agenda (2 Kolom di Desktop) -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-gray-800">Daftar Agenda Tersimpan</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 border-b border-gray-100 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                                <th class="p-4">Foto</th>
                                <th class="p-4">Informasi Agenda</th>
                                <th class="p-4">Waktu & Tempat</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse($agendas as $agenda)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-4 align-top">
                                    @if($agenda->gambar)
                                        <img src="{{ asset('storage/' . $agenda->gambar) }}" alt="Foto Agenda" class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-xl flex items-center justify-center text-xs font-medium border border-gray-200">
                                            No Image
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4 align-top">
                                    <div class="font-bold text-gray-900 text-base mb-1">{{ $agenda->judul }}</div>
                                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $agenda->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                </td>
                                <td class="p-4 align-top space-y-1">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-50 text-green-700 rounded-lg text-xs font-semibold">
                                        📅 {{ optional($agenda->tanggal)->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 flex items-center gap-1 pt-0.5">
                                        📍 {{ $agenda->lokasi }}
                                    </div>
                                </td>
                                <td class="p-4 align-top text-center">
                                    <form action="/admin/agenda/{{ $agenda->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')" class="inline-block">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-medium transition border border-red-100" title="Hapus Agenda">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <span class="text-3xl">📭</span>
                                        <p class="text-sm font-medium">Belum ada agenda desa yang ditambahkan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection