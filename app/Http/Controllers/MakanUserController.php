<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makan;

class MakanUserController extends Controller
{
    public function index()
    {
        $makans = Makan::all();
        return view('user.makans.index', compact('makans'));
    }

    public function show($id)
    {
        $makan = Makan::findOrFail($id);
        $makan->gambar = explode(',', $makan->gambar);
        return view('user.makans.show', compact('makan'));
    }
    
}
