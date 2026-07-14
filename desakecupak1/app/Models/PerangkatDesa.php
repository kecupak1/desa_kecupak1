<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desa';

    protected $guarded = ['id'];

    public function scopeUrut($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}