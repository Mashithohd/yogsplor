<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataUserController extends Controller
{
    public function index()
    {
        $hotels = Wisata::all();
        return view('user.wisatas.index', compact('wisatas'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->gambar = explode(',', $wisata->gambar);
        return view('user.wisatas.show', compact('wisata'));
    }
    
}
