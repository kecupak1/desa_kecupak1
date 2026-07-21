@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-2xl mx-auto">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Berita</h2>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
            @error('judul') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Konten / Isi Berita</label>
            <textarea name="konten" rows="5" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">{{ old('konten', $berita->konten) }}</textarea>
            @error('konten') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
            @if($berita->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Preview" class="w-32 h-24 object-cover rounded-lg border">
                </div>
            @else
                <p class="text-xs text-gray-400 mb-2">Tidak ada gambar.</p>
            @endif
            
            <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            @error('gambar') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('berita.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition">Perbarui Berita</button>
        </div>
    </form>
</div>
@endsection