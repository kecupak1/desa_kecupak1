<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    use HasFactory;

    protected $table = 'lembaga_desa';

    protected $guarded = ['id'];

    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis_lembaga', $jenis);
    }
}