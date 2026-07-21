<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaProfil extends Model
{
    use HasFactory;

    protected $table = 'desa_profil';

    protected $guarded = ['id'];
}   