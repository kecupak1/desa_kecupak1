@extends('admin.layout')

@section('content')
<div class="space-y-8 pb-10">
    <!-- Header Halaman & Tombol Tambah Berita -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Manajemen Berita Desa</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi, pengumuman, dan berita kegiatan desa.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-semibold rounded-full border border-green-200">
                Total Berita: {{ count($beritas) }}
            </span>
            <!-- Tombol Membuka Modal Tambah -->
            <button type="button" onclick="openModalForm()" class="px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-green-600/20 transition-all duration-200 flex items-center gap-2 cursor-pointer">
                <span>+</span> Tambah Berita
            </button>
        </div>
    </div>

    <!-- MODAL / POPUP FORM TAMBAH BERITA -->
    <div id="agendaModal" class="fixed inset-0 z-50 overflow-y-auto bg-black/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all">
            
            <!-- Header Modal -->
            <div class="flex items-center justify-between p-6 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center font-bold text-lg">
                        📰
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Tambah Berita Baru</h2>
                        <p class="text-xs text-gray-400">Isi formulir untuk menerbitkan informasi desa</p>
                    </div>
                </div>
                <!-- Tombol Silang X -->
                <button type="button" onclick="closeModalForm()" class="text-gray-400 hover:text-gray-600 text-xl font-bold p-2 cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Form di dalam Modal -->
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Gotong Royong Kebersihan Desa" required class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Isi Berita</label>
                    <textarea name="isi" rows="4" placeholder="Tuliskan isi berita secara lengkap..." required class="w-full px-4 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-green-500 focus:outline-none transition">{{ old('isi') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1.5">Foto Berita (Opsional)</label>
                    <input type="file" name="gambar" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer border border-gray-200 rounded-xl bg-gray-50">
                </div>

                <!-- Tombol Aksi Modal -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeModalForm()" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-semibold transition cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-green-600/20 transition cursor-pointer">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Berita -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-800">Daftar Berita Terbit</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-100 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="p-4">Foto</th>
                        <th class="p-4">Judul & Isi Berita</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($beritas as $item)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="p-4 align-top">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Berita" class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow-sm">
                            @else
                                <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-xl flex items-center justify-center text-xs font-medium border border-gray-200">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td class="p-4 align-top">
                            <div class="font-bold text-gray-900 text-base mb-1">{{ $item->judul }}</div>
                            <!-- Menggunakan kolom 'isi' sesuai migrasi database -->
                            <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ Str::limit($item->isi, 100) }}</p>
                        </td>
                        <td class="p-4 align-top text-center space-x-1">
                            <!-- Tombol Edit -->
                            <a href="{{ route('berita.edit', $item->id) }}" class="inline-block p-2 bg-yellow-50 hover:bg-yellow-100 text-yellow-600 rounded-xl text-xs font-medium transition border border-yellow-100" title="Edit Berita">
                                ✏️
                            </a>
                            
                            <!-- Tombol Hapus -->
                            <form action="{{ route('berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" class="inline-block">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl text-xs font-medium transition border border-red-100 cursor-pointer" title="Hapus Berita">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-12 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center space-y-2">
                                <span class="text-3xl">📭</span>
                                <p class="text-sm font-medium">Belum ada berita yang ditambahkan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script JavaScript untuk Modal -->
<script>
    function openModalForm() {
        document.getElementById('agendaModal').classList.remove('hidden');
    }

    function closeModalForm() {
        document.getElementById('agendaModal').classList.add('hidden');
    }
</script>
@endsection