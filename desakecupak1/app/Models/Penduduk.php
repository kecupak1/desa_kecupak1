<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $guarded = ['id'];

    // Menghitung umur otomatis dari tanggal lahir
    public function getUmurAttribute()
    {
        if (!$this->tanggal_lahir) return null;
        return \Carbon\Carbon::parse($this->tanggal_lahir)->age;
    }
}