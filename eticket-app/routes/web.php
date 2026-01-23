<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\ProfileController;

// 1. Jalankan rute bawaan Laravel Breeze dulu
require __DIR__.'/auth.php';

// 2. TIMPA rute login & register bawaan dengan view welcome kamu (Deep Slate)
// Dengan menaruhnya di bawah 'require', rute ini yang akan diprioritaskan
Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('welcome'); })->name('login');
Route::get('/register', function () { return view('welcome'); })->name('register');

// ROUTE SUPPORT
Route::get('/support', function () {
    return view('support');
})->name('support');

Route::middleware(['auth'])->group(function () {
    
    // DASHBOARD LOGIC
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $role = strtolower(trim($user->role));

        if ($role === 'admin') {
            return app(AdminTicketController::class)->dashboard();
        } else {
            $tickets = Ticket::where('user_id', $user->id)->latest()->get();
            $isAdmin = false;
            $stats = [
                'total'   => $tickets->count(),
                'waiting' => $tickets->where('status', 'waiting')->count(),
                'process' => $tickets->where('status', 'process')->count(),
                'done'    => $tickets->where('status', 'done')->count(),
            ];
            return view('dashboard', compact('tickets', 'isAdmin', 'stats'));
        }
    })->name('dashboard');

    // TICKET ROUTES
    Route::resource('tickets', TicketController::class);
    Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('my.tickets');

    // PROFILE ROUTES
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ADMIN ROUTES
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminTicketController::class, 'dashboard'])->name('dashboard');
        Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
        
        // Penambahan rute agar tombol "Buat Laporan" admin berfungsi
        Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
        Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
        
        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
        Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
        Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    });
});