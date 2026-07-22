@extends('admin.layout')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Berita</h2>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1">Judul Berita</label>
            <input type="text" name="judul" value="{{ $berita->judul }}" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1">Isi Berita</label>
            <textarea name="isi" rows="5" required class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-green-500 focus:outline-none">{{ $berita->isi }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-1">Ganti Foto (Opsional)</label>
            @if($berita->gambar)
                <div class="mb-2"><img src="{{ asset('storage/' . $berita->gambar) }}" class="w-24 h-16 object-cover rounded-lg border"></div>
            @endif
            <input type="file" name="gambar" class="w-full text-xs text-gray-500 border rounded-xl p-2 bg-gray-50">
        </div>

        <div class="flex gap-2 pt-2">
            <button type="submit" class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold transition">Simpan Perubahan</button>
            <a href="{{ route('berita.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-semibold transition">Batal</a>
        </div>
    </form>
</div>
@endsection