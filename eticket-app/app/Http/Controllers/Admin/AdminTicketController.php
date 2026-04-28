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

    // 2. Method Index untuk Halaman Kelola Tiket (FIXED PAGINATION)
    public function index(Request $request)
    {
        $query = Ticket::with('user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // PERBAIKAN: Menggunakan paginate() agar method currentPage() tersedia di Blade
        $tickets = $query->latest()->paginate(10); 
        
        $stats = [
            'total' => Ticket::count(),
            'waiting' => Ticket::where('status', 'waiting')->count(),
        ];

        return view('admin.tickets.index', compact('tickets', 'stats'));
    }

    // Tambahan Method Update Status & WhatsApp (Sudah Diperbaiki)
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $statusMap = [
            'waiting' => 'MENUNGGU ANTRIAN',
            'process' => 'SEDANG DIPROSES',
            'done'    => 'SELESAI KERJAKAN'
        ];

        $newStatus = $request->status;
        
        // Update status dan set completed_at jika status menjadi 'done'
        $updateData = ['status' => $newStatus];
        if ($newStatus === 'done') {
            $updateData['completed_at'] = now();
        }
        
        $ticket->update($updateData);

        // Ambil nomor langsung dari kolom 'whatsapp' di tabel tickets
        $phone = $ticket->whatsapp ?? '0'; 
        
        // Bersihkan nomor HP jika ada karakter non-digit
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        
        // Pastikan format internasional (62)
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }

        // Format pesan WhatsApp
        $txtStatus = $statusMap[$newStatus] ?? strtoupper($newStatus);
        $pesan = "Halo, kami menginformasikan bahwa laporan Anda dengan nomor tiket *{$ticket->ticket_number}* telah diperbarui menjadi: *{$txtStatus}*. Terima kasih.";
        
        $waUrl = "https://api.whatsapp.com/send?phone=" . $cleanPhone . "&text=" . urlencode($pesan);

        return back()->with([
            'success' => "Status Tiket #{$ticket->ticket_number} Berhasil diperbarui!",
            'waUrl' => $waUrl
        ]);
    }
}