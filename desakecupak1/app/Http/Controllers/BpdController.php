<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BpdController extends Controller
{
    public function index()
    {
        return view('bpd');
    }
}