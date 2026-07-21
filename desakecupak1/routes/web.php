<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\PetaDesaController;
use App\Http\Controllers\BpdController;

// 1. Rute Publik (Akses umum pengunjung) - TIDAK TERGANGGU
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demografi', [InfografisController::class, 'index'])->name('demografi');
Route::get('/pemerintahan/struktur-organisasi', [PemerintahanController::class, 'strukturOrganisasi'])->name('pemerintahan.struktur');
Route::get('/profil-desa/visi-misi', [ProfilDesaController::class, 'visiMisi'])->name('profil.visimisi');
Route::get('/profil-desa/peta-desa', [PetaDesaController::class, 'index'])->name('profil.peta');
Route::get('/pemerintahan/bpd', [BpdController::class, 'index'])->name('pemerintahan.bpd');
Route::get('/profil/sejarah', [ProfilDesaController::class, 'sejarah'])->name('profil.sejarah');

// 2. Rute Login (Akses masuk admin)
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);

// 3. Rute Terproteksi (Hanya admin yang sudah login bisa akses)
Route::middleware(['auth'])->group(function () {
    // Tambahkan baris ini untuk mengatasi error 'Route [dashboard] not defined'
    Route::get('/dashboard', function () {
        return redirect('/admin/berita'); // atau ke /admin/agenda
    })->name('dashboard');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Fitur Agenda Admin
    Route::get('/admin/agenda', [AgendaController::class, 'index']);
    Route::post('/admin/agenda', [AgendaController::class, 'store']);
    Route::delete('/admin/agenda/{id}', [AgendaController::class, 'destroy']);

    // Fitur CRUD Berita Admin yang baru saja kita buat
    Route::resource('/admin/berita', \App\Http\Controllers\Admin\BeritaController::class);
});

// Rute bawaan Laravel (Autentikasi Breeze jika digunakan)
require __DIR__.'/auth.php';