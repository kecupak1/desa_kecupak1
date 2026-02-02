<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    // 1. Method Dashboard
    public function dashboard()
    {
        $stats = [
            'total' => Ticket::count(),
            'waiting' => Ticket::where('status', 'waiting')->count(),
            'process' => Ticket::where('status', 'process')->count(),
            'done' => Ticket::where('status', 'done')->count(),
        ];

        $waitingCount = $stats['waiting'];
        $tickets = Ticket::with('user')->latest()->take(5)->get();
        $isAdmin = true;

        return view('admin.dashboard', compact('tickets', 'stats', 'isAdmin', 'waitingCount'));
    }

    // 2. Method Index untuk Halaman Kelola Tiket
    public function index(Request $request)
    {
        $query = Ticket::with('user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tickets = $query->latest()->get();
        
        $stats = [
            'total' => Ticket::count(),
            'waiting' => Ticket::where('status', 'waiting')->count(),
        ];

        return view('admin.tickets.index', compact('tickets', 'stats'));
    }
}