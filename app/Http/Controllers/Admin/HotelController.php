<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Kabupaten;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('kabupaten')->get();

        
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.hotels.create', compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hotel' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabupaten' => 'required|string|max:255',
           
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('hotel', 'public');

        Hotel::create([
            'nama_hotel' => $request->nama_hotel,
            'lokasi' => $request->lokasi,
            'rating' => $request->rating,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'kabupaten' => $request->kabupaten,
            

        ]);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'sometimes',
            'lokasi' => 'sometimes|url',
            'rating' => 'sometimes',
            'harga' => 'sometimes',
            'gambar' => 'sometimes',
            'kabupaten' => 'sometimes',
        ]);

        $hotel->update($request->all());

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }



}

