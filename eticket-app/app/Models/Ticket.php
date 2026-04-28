<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar semua kolom bisa diisi oleh Controller
    protected $fillable = [
        'ticket_number',
        'user_id',
        'instansi',
        'opd',
        'category',
        'title',
        'description',
        'image',
        'whatsapp',
        'status',
        'priority',
        'admin_note',
        'created_at',
        'updated_at',
        'completed_at'
    ];

    // Cast timestamps
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relasi ke User (Agar Admin bisa melihat siapa yang melapor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hitung jumlah hari hingga ticket selesai
     */
    public function getDaysToCompleteAttribute()
    {
        if ($this->completed_at && $this->created_at) {
            return $this->completed_at->diffInDays($this->created_at);
        }
        return null;
    }

    /**
     * Scope untuk filter berdasarkan bulan
     */
    public function scopeByMonth($query, $month, $year)
    {
        return $query->whereYear('created_at', $year)
                     ->whereMonth('created_at', $month);
    }

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeByYear($query, $year)
    {
        return $query->whereYear('created_at', $year);
    }

    /**
     * Scope untuk filter berdasarkan OPD
     */
    public function scopeByOpd($query, $opd)
    {
        return $query->where('opd', $opd);
    }

    /**
     * Scope untuk ticket yang sudah selesai
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'done')->whereNotNull('completed_at');
    }
}