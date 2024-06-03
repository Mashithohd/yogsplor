<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        dd($user); // Tambahkan ini untuk memeriksa apakah pengguna telah diotentikasi
        return view('profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->input('username'),
            'email' => $request->input('email'),
        ];

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                Storage::delete('public/profile/' . $user->photo);
            }

            $photoPath = $request->file('photo')->store('public/profile');
            $data['photo'] = basename($photoPath);
        }

        $user->update($data);

        return redirect()->route('profil')->with('success', 'Profile updated successfully');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/profile');
            $data['photo'] = basename($photoPath);
        }

        $user = User::create($data);

        // You might want to log in the user after registration
        Auth::login($user);

        return redirect('/home'); // Redirect to whatever route you want after registration
    }
}
