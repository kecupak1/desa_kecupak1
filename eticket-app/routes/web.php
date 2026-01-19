<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminTicketController;

Route::get('/', function () {
    return view('welcome');
});

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

    // TICKET ROUTES (USER)
    Route::resource('tickets', TicketController::class);
    Route::get('/my-tickets', [TicketController::class, 'myTickets'])->name('my.tickets');

    // ADMIN ROUTES (DIBUNGKUS DALAM PREFIX ADMIN)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminTicketController::class, 'dashboard'])->name('dashboard');
        Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/{ticket}', [AdminTicketController::class, 'show'])->name('tickets.show');
        
        // Aksi Status & Hapus (Sekarang memiliki nama admin.tickets.destroy)
        Route::patch('/tickets/{ticket}/status', [AdminTicketController::class, 'updateStatus'])->name('tickets.updateStatus');
        Route::delete('/tickets/{ticket}', [AdminTicketController::class, 'destroy'])->name('tickets.destroy');
    });
});

require __DIR__.'/auth.php';