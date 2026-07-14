<?php

namespace App\Http\Controllers;

use App\Models\DesaProfil;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Slider;
use App\Models\Penduduk;

class HomeController extends Controller
{
    public function index()
    {
        $profil = DesaProfil::first();
        $slider = Slider::urut()->get();
        $beritaTerbaru = Berita::terbaru()->take(6)->get();
        $agenda = Agenda::akanDatang()->take(5)->get();
        $pengumuman = Pengumuman::orderBy('tanggal', 'desc')->take(5)->get();
        $galeri = Galeri::where('tipe', 'foto')->latest()->take(8)->get();

        // Statistik penduduk
        $totalPenduduk = Penduduk::count();
        $totalLaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();

        return view('home', compact(
            'profil',
            'slider',
            'beritaTerbaru',
            'agenda',
            'pengumuman',
            'galeri',
            'totalPenduduk',
            'totalLaki',
            'totalPerempuan'
        ));
    }
}