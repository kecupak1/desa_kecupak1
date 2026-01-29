<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = strtolower(trim($user->role));

        // 1. Jika Admin, arahkan ke logika Admin
        if ($role === 'admin') {
            return app(AdminTicketController::class)->dashboard();
        }

        // 2. Logika untuk User Biasa
        $search = $request->query('search');
        $status = $request->query('status'); // Tambahan filter status agar sinkron dengan UI sebelumnya

        $query = Ticket::where('user_id', $user->id)->latest();

        // Filter Search
        $query->when($search, function ($q, $search) {
            return $q->where(function($sub) use ($search) {
                $sub->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('ticket_number', 'LIKE', "%{$search}%");
            });
        });

        // Filter Status (Jika ada)
        $query->when($status, function ($q, $status) {
            return $q->where('status', $status);
        });

        // Eksekusi Pagination
        $tickets = $query->paginate(10)->withQueryString();

        // 3. Hitung Stats (Lebih efisien menggunakan count() langsung di DB)
        $stats = [
            'total'   => Ticket::where('user_id', $user->id)->count(),
            'waiting' => Ticket::where('user_id', $user->id)->where('status', 'waiting')->count(),
            'process' => Ticket::where('user_id', $user->id)->where('status', 'process')->count(),
            'done'    => Ticket::where('user_id', $user->id)->where('status', 'done')->count(),
        ];

        $isAdmin = false;

        return view('dashboard', compact('tickets', 'isAdmin', 'stats'));
    }
}