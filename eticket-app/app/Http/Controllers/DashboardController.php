<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = strtolower(trim($user->role));

        // --- LOGIKA UNTUK ADMIN ---
        if ($role === 'admin') {
            $stats = [
                'total' => Ticket::count(),
                'waiting' => Ticket::where('status', 'waiting')->count(),
                'process' => Ticket::where('status', 'process')->count(),
                'done' => Ticket::where('status', 'done')->count(),
            ];

            $waitingCount = $stats['waiting'];
            $tickets = Ticket::with('user')->latest()->take(5)->get();
            $isAdmin = true;

            // Pastikan view ini ada: resources/views/admin/dashboard.blade.php
            return view('admin.dashboard', compact('tickets', 'stats', 'isAdmin', 'waitingCount'));
        }

        // --- LOGIKA UNTUK USER BIASA ---
        $search = $request->query('search');
        $status = $request->query('status');

        $query = Ticket::where('user_id', $user->id)->latest();

        $query->when($search, function ($q, $search) {
            return $q->where(function($sub) use ($search) {
                $sub->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('ticket_number', 'LIKE', "%{$search}%");
            });
        });

        $query->when($status, function ($q, $status) {
            return $q->where('status', $status);
        });

        $tickets = $query->paginate(10)->withQueryString();

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