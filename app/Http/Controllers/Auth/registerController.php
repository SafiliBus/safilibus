<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  // <=== ini yang penting
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name, // ✅ Ini bagian penting yang kemarin error
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'passenger'
    ]);

    // login user otomatis atau redirect
    Auth::login($user);

    return redirect()->back()->with('success', 'Register berhasil! Silakan login.');
}
}