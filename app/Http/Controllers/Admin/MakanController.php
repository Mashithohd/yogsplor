<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Makan;
use App\Models\Kabupaten;

class MakanController extends Controller
{
    public function index()
    {

        $makans = Makan::all();
        return view('admin.makans.index', compact('makans'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.makans.create',compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makan' => 'required',
            'lokasi' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabupaten' => 'required|string|max:255',
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('makan','public');

        Makan::create([
            'nama_makan' => $request->nama_makan,
            'lokasi' => $request->lokasi,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'kabupaten' => $request->kabupaten,
        ]);

        return redirect()->route('admin.makans.index')->with('success', 'Makan created successfully.');
    }

    public function edit(Makan $makan)
    {
        return view('admin.makans.edit', compact('makan'));
    }

    public function update(Request $request, Makan $makan)
    {
        $request->validate([
            'nama_makan' => 'required',
            'lokasi' => 'sometimes|url',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'sometimes|image',
            'kabupaten' => 'sometimes',

        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/images');
            $makan->gambar = basename($path);
        }

        $makan->update($request->all());

        return redirect()->route('admin.makans.index')->with('success', 'Makan updated successfully.');
    }

    public function destroy(Makan $makan)
    {
        $makan->delete();
        return redirect()->route('admin.makans.index')->with('success', 'Makan deleted successfully.');
    }
}
