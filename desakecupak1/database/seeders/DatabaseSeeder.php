<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Di dalam method run():
User::updateOrCreate(
    ['email' => 'admin@desa.com'],
    [
        'name' => 'Administrator Desa',
        'password' => Hash::make('password123'),
    ]
);