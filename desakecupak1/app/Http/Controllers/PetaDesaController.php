<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PetaDesaController extends Controller
{
    public function index()
    {
        return view('peta_desa');
    }
}