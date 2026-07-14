<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }

    public function scopePopuler($query)
    {
        return $query->where('populer', true);
    }

    public function scopeTerbaru($query)
    {
        return $query->orderBy('tanggal_publish', 'desc');
    }
}