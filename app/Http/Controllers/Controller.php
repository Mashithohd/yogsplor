<?php

namespace App\Http\Controllers;
use App\Models\Kabupaten; // Sesuaikan dengan model Anda

abstract class Controller
{
    //use App\Models\Kabupaten; // Sesuaikan dengan model Anda

public function index()
{
    $kabupaten = Kabupaten::all(); // Mengambil semua data kabupaten dari database
    return view('kabupaten.index', compact('kabupaten')); // Mengirimkan data ke tampilan
}

}
