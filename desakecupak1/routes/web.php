<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/demografi', [App\Http\Controllers\InfografisController::class, 'index'])->name('demografi');

require __DIR__.'/auth.php';