<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // 1. Inisialisasi Query
        $query = Ticket::with('user');

        // 2. Filter berdasarkan Role (Admin lihat semua, User lihat milik sendiri)
        if (strtolower(trim($user->role)) !== 'admin') {
            $query->where('user_id', $user->id);
        }

        // 3. Logika Filter Status (dari dropdown "status")
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 4. Logika Urutkan (dari dropdown "sort")
        if ($request->sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc'); // Default terbaru
        }

        // 5. Eksekusi Pagination & pertahankan parameter URL saat pindah halaman
        $tickets = $query->paginate(10)->withQueryString();
        
        // --- PERBAIKAN LOGIKA VIEW DISINI ---
        // Jika yang login Admin, arahkan ke folder admin/tickets/index
        // Jika bukan, arahkan ke folder tickets/index
        if (strtolower(trim($user->role)) === 'admin') {
            return view('admin.tickets.index', compact('tickets', 'user'));
        }

        return view('tickets.index', compact('tickets', 'user'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'instansi'    => 'required|string', 
            'category'    => 'required',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        Ticket::create([
            'ticket_number' => 'TCK-' . strtoupper(Str::random(6)), 
            'user_id'       => Auth::id(), 
            'title'         => $validated['title'],
            'instansi'      => $validated['instansi'],
            'category'      => $validated['category'],
            'description'   => $validated['description'],
            'image'         => $imagePath,
            'status'        => 'waiting',
            'priority'      => $request->priority ?? 'low',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil terkirim!');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        if (strtolower(trim(auth()->user()->role)) !== 'admin') { 
            abort(403); 
        }

        $request->validate(['status' => 'required|in:waiting,process,done']);
        $ticket->update(['status' => $request->status]);

        return back()->with('success', 'Status Tiket #' . $ticket->ticket_number . ' Berhasil diperbarui!');
    }

    public function destroy(Ticket $ticket)
    {
        if (strtolower(trim(auth()->user()->role)) !== 'admin') { 
            abort(403); 
        }

        $ticket->delete();
        return back()->with('success', 'Laporan Berhasil dihapus secara permanen!');
    }

    public function show(Ticket $ticket)
    {
        if (strtolower(trim(auth()->user()->role)) !== 'admin' && $ticket->user_id !== auth()->id()) {
            abort(403);
        }

        $viewPath = View::exists('admin.tickets.show') ? 'admin.tickets.show' : 'tickets.show';
        return view($viewPath, compact('ticket'));
    }
}