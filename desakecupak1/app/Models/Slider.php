<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'slider';

    protected $guarded = ['id'];

    public function scopeUrut($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}