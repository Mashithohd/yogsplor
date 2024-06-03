<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   
     public function authenticate(Request $request)
     {
         // Ambil ID sesi sebelum otentikasi
         $previousSessionId = $request->session()->getId();
     
         $credentials = $request->validate([
             'nama_user' => ['required', 'string'],
             'password' => ['required', 'string'],
         ]);
     
         Log::info('Attempting login for user: ' . $credentials['nama_user']);
     
         if (Auth::attempt(['nama_user' => $credentials['nama_user'], 'password' => $credentials['password']])) {
             // Pastikan sesi diperbarui setelah login berhasil
             $request->session()->regenerate(); 
     
             // Ambil ID sesi setelah otentikasi
             $currentSessionId = $request->session()->getId();
     
             // Periksa apakah ID sesi telah berubah
             if ($previousSessionId !== $currentSessionId) {
                 Log::info('Session regenerated for user: ' . $credentials['nama_user']);
             }
     
             return redirect()->route('welcome'); // Mengarahkan ke halaman welcome
         }
     
         Log::warning('Login failed for user: ' . $credentials['nama_user']);
     
         return back()->withErrors([
             'nama_user' => 'The provided credentials do not match our records.',
         ]);
     }
     

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}