<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\UserController;

// 1. AUTHENTICATION & GUEST ROUTES
require __DIR__.'/auth.php';

Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('welcome'); })->name('login');
Route::get('/register', function () { return view('welcome'); })->name('register');
Route::get('/support', function () { return view('support'); })->name('support');

// 2. PROTECTED ROUTES (AUTH)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tickets', TicketController::class);
    Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('my.tickets');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::patch('/profile/update-password', 'updatePassword')->name('profile.password.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // 3. ADMIN ROUTES
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard Khusus Admin
        Route::get('/dashboard', [AdminTicketController::class, 'dashboard'])->name('dashboard');
        
        // Ticket Management untuk Admin
        Route::controller(AdminTicketController::class)->group(function () {
            Route::get('/tickets', 'index')->name('tickets.index');
            
            // Tambahkan rute ini agar tombol "Create" dan "Delete" di halaman admin tidak error
            Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
            Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
            Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

            // Menampilkan detail tiket
            Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
            
            // Rute Update Status yang baru kita buat
            Route::patch('/tickets/{ticket}/status', 'updateStatus')->name('tickets.updateStatus');
        });

        // User Management
        Route::resource('users', UserController::class);
        Route::patch('users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
    });
});