<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hapus atau abaikan "use App\Models\ProfilDesa;" jika ada di atas sini

class ProfilDesaController extends Controller
{
    public function visiMisi()
    {
        return view('visi_misi');
    }

    public function sejarah()
    {
        // Langsung tampilkan view sejarah tanpa query database
        return view('sejarah');
    }
}