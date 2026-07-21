<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda; // Sesuaikan dengan model agenda kamu
use Illuminate\Support\Facades\Storage; // Wajib di-import untuk mengelola file

class AgendaController extends Controller
{
    // Menampilkan daftar agenda
    public function index()
    {
        // Ambil data agenda dari database
        $agendas = Agenda::latest()->get(); 
        
        // Kembalikan ke tampilan view agenda admin
        return view('admin.agenda.index', compact('agendas'));
    }

    // Menyimpan agenda baru beserta foto opsional
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Bersifat opsional, maks 2MB
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            // Menyimpan file gambar ke folder storage/app/public/agenda
            $gambarPath = $request->file('gambar')->store('agenda', 'public');
        }

        Agenda::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.agenda')->with('success', 'Agenda berhasil ditambahkan!');
    }

    // Menghapus agenda beserta file gambarnya
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Hapus file gambar fisik dari storage jika ada
        if ($agenda->gambar && Storage::disk('public')->exists($agenda->gambar)) {
            Storage::disk('public')->delete($agenda->gambar);
        }

        $agenda->delete();

        return redirect()->route('admin.agenda')->with('success', 'Agenda berhasil dihapus!');
    }
}