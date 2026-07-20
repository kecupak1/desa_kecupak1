<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InfografisController;

// 1. Rute Publik (Akses umum pengunjung)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demografi', [InfografisController::class, 'index'])->name('demografi');

// 2. Rute Login (Akses masuk admin)
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);

// 3. Rute Terproteksi (Hanya admin yang sudah login bisa akses)
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Fitur Agenda Admin
    Route::get('/admin/agenda', [AgendaController::class, 'index']);
    Route::post('/admin/agenda', [AgendaController::class, 'store']);
    Route::delete('/admin/agenda/{id}', [AgendaController::class, 'destroy']);
});

// Rute bawaan Laravel (Autentikasi Breeze jika digunakan)
require __DIR__.'/auth.php';