<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Wisata;
use App\Models\Makan;
use App\Models\Kabupaten;

class UserKabupatenController extends Controller
{
    public function show($id)
    {
        // Fetch the kabupaten details
        $kabupaten = Kabupaten::find($id);

        // If kabupaten not found, handle the error
        if (!$kabupaten) {
            return redirect()->back()->with('error', 'Kabupaten not found');
        }

        // Retrieve the hotels, wisatas, and tempatMakans associated with the kabupaten
        $hotels = Hotel::where('kabupaten', $id)->get();
        $wisatas = Wisata::where('kabupaten', $id)->get();
        $makans = Makan::where('kabupaten', $id)->get();

        // Pass the data to the view
        return view('user.kabupaten.index', [
            'kabupaten' => $kabupaten, // Pass the kabupaten model instance to the view
            'hotels' => $hotels,
            'wisatas' => $wisatas,
            'makans' => $makans
        ]);
    }
}
