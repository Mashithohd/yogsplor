<?php


namespace App\Http\Controllers;

use App\Models\Kabupaten; // Import model Kabupaten jika diperlukan
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $kabupaten = Kabupaten::all(); // Mengambil data kabupaten dari model
        return view('welcome', compact('kabupaten')); // Mengirimkan data ke tampilan
    }
}
