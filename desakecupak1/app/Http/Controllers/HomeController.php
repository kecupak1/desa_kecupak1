<?php

namespace App\Http\Controllers;

use App\Models\DesaProfil;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Slider;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;

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
        $perangkat = PerangkatDesa::urut()->take(4)->get();

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
            'perangkat',
            'totalPenduduk',
            'totalLaki',
            'totalPerempuan'
        ));
    }
}