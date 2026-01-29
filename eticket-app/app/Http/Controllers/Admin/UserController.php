<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua administrator
     */
    public function index()
    {
        // Mengambil semua user yang memiliki role 'admin'
        // Ini akan menarik data 'safira nazwa' dan admin lainnya ke tabel
        $users = User::where('role', 'admin')->latest()->get();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menambah admin baru secara otomatis
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Simpan sebagai admin secara otomatis
        // Kamu tidak perlu lagi edit manual di phpMyAdmin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', 
        ]);

        return back()->with('success', 'Admin baru berhasil didaftarkan.');
    }

    /**
     * Menghapus admin dari database
     */
    public function destroy(User $user)
    {
        // Proteksi agar tidak menghapus akun sendiri
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();
        return back()->with('success', 'Admin berhasil dihapus.');
    }

    /**
     * Reset password dengan input manual dari admin
     */
    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'new_password' => 'required|min:8'
        ]);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', "Password {$user->name} berhasil diperbarui.");
    }
}