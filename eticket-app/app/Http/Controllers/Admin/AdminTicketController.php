<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
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

    public function index(Request $request)
    {
        $query = Ticket::with('user');

        // 1. Filter Berdasarkan Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 2. Filter Berdasarkan Urutan (Terbaru / Terlama)
        if ($request->sort == 'oldest') {
            $query->oldest();
        } else {
            $query->latest(); // Default terbaru
        }

        $tickets = $query->get();
        
        $stats = [
            'total' => Ticket::count(),
            'waiting' => Ticket::where('status', 'waiting')->count(),
        ];

        return view('admin.tickets.index', compact('tickets', 'stats'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load('user'); 
        return view('admin.tickets.show', compact('ticket'));
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate(['status' => 'required|in:waiting,process,done']);
        $ticket->update(['status' => $request->status]);
        
        return back()->with('success', 'Status tiket #' . ($ticket->ticket_number ?? $ticket->id) . ' berhasil diperbarui!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Laporan berhasil dihapus secara permanen!');
    }
}