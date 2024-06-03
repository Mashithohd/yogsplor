<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelUserController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('user.hotels.index', compact('hotels'));
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->gambar = explode(',', $hotel->gambar);
        return view('user.hotels.show', compact('hotel'));
    }
    
    // Method to fetch hotel details as JSON
    public function getHotelDetails($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->gambar = explode(',', $hotel->gambar);
        return response()->json($hotel);
    }
}
