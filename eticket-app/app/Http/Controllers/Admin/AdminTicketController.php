<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTicketController extends Controller
{
    /**
     * 1. Menampilkan Semua Tiket (Halaman Index)
     * PERBAIKAN: Menambahkan Request untuk menangkap Filter & Sort
     */
    public function index(Request $request)
    {
        $query = Ticket::with('user');

        // Filter berdasarkan Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Logika Pengurutan
        if ($request->get('sort') === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $tickets = $query->get();
        
        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * 2. Menampilkan Dashboard Admin (Statistik)
     */
    public function dashboard()
    {
        $stats = [
            'total'   => Ticket::count(),
            'waiting' => Ticket::where('status', 'waiting')->count(),
            'process' => Ticket::where('status', 'process')->count(),
            'done'    => Ticket::where('status', 'done')->count(),
        ];
        
        $tickets = Ticket::with('user')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'tickets'));
    }

    /**
     * 3. Menghapus Tiket (Fungsi Destroy)
     */
    public function destroy(Ticket $ticket)
    {
        try {
            // Hapus lampiran fisik dari storage jika ada
            if ($ticket->lampiran && Storage::exists('public/' . $ticket->lampiran)) {
                Storage::delete('public/' . $ticket->lampiran);
            }

            $ticket->delete();

            return redirect()->back()->with('success', 'Tiket berhasil dihapus secara permanen.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus tiket.');
        }
    }

    /**
     * 4. Update Status Tiket
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        // Tambahkan validasi agar data yang masuk konsisten
        $request->validate([
            'status' => 'required|in:waiting,process,done'
        ]);

        try {
            $ticket->update([
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Status tiket #' . $ticket->id . ' berhasil diperbarui menjadi ' . strtoupper($request->status));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }
}