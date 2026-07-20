<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function visiMisi()
    {
        // Langsung tampilkan view tanpa mengambil data dari database
        // Karena di file visi_misi.blade.php sudah kita sediakan teks bawaan (default)
        return view('visi_misi');
    }
}