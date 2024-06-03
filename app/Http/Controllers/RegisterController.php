<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'nama_user' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login the newly registered user
        Auth::login($user);

        return redirect()->route('profil')->with('success', 'Registration successful. Welcome to your profile.');
    }
}
