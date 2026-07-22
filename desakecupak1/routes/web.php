<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\PetaDesaController;
use App\Http\Controllers\BpdController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProfileController;

// 1. Rute Publik (Akses umum pengunjung) - TIDAK TERGANGGU
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demografi', [InfografisController::class, 'index'])->name('demografi');
Route::get('/pemerintahan/struktur-organisasi', [PemerintahanController::class, 'strukturOrganisasi'])->name('pemerintahan.struktur');
Route::get('/profil-desa/visi-misi', [ProfilDesaController::class, 'visiMisi'])->name('profil.visimisi');
Route::get('/profil-desa/peta-desa', [PetaDesaController::class, 'index'])->name('profil.peta');
Route::get('/pemerintahan/bpd', [BpdController::class, 'index'])->name('pemerintahan.bpd');
Route::get('/profil/sejarah', [ProfilDesaController::class, 'sejarah'])->name('profil.sejarah');

// Route Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// 3. Rute Terproteksi (Hanya admin yang sudah login bisa akses)
Route::middleware(['auth'])->group(function () {
    // Rute untuk mengatasi error 'Route [dashboard] not defined'
    Route::get('/dashboard', function () {
        return redirect('/admin/berita'); 
    })->name('dashboard');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Fitur Agenda Admin
    Route::get('/admin/agenda', [AgendaController::class, 'index'])->name('admin.agenda');
    Route::post('/admin/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::delete('/admin/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

    // Fitur CRUD Berita Admin (Otomatis mencakup index, create, store, edit, update, destroy)
    Route::resource('/admin/berita', BeritaController::class);

    // Route untuk Admin (Kelola Slider)
    Route::prefix('admin')->name('admin.slider.')->group(function () {
        Route::get('/slider', [SliderController::class, 'index'])->name('index');
        Route::get('/slider/tambah', [SliderController::class, 'create'])->name('create');
        Route::post('/slider', [SliderController::class, 'store'])->name('store');
        Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('edit');
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('update');
        Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('destroy');
    });

    // Route untuk Edit Profil & Email Admin
    Route::prefix('admin')->name('admin.profile.')->group(function () {
        Route::get('/profil', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/profil', [ProfileController::class, 'update'])->name('update');
    });
});

// Rute bawaan Laravel (Autentikasi Breeze jika digunakan)
require __DIR__.'/auth.php';