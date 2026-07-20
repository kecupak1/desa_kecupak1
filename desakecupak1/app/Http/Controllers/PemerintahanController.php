<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerangkatDesa; // <--- Sesuaikan jika nama Model kamu berbeda (misal: Perangkat)

class PemerintahanController extends Controller
{
    public function strukturOrganisasi()
    {
        // Mengambil semua data perangkat desa dari database
        // Jika di tabelmu ada kolom 'urutan', bisa diganti jadi: PerangkatDesa::orderBy('urutan', 'asc')->get()
        $perangkat = PerangkatDesa::all();

        // Mengirim data $perangkat ke view
        // Pastikan nama file blade kamu sesuai (misal: struktur-organisasi.blade.php)
        return view('struktur_organisasi', compact('perangkat'));
        
    }
}