<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kabupaten;

class WisataController extends Controller
{
    public function index()
    {
      

        $wisatas = Wisata::all();
        return view('admin.wisatas.index', compact('wisatas'));
    }

    public function create()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.wisatas.create',compact('kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kabupaten' => 'required|string|max:255',
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('wisata', 'public');

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'gambar' =>  $gambarPath,
            'kabupaten' => $request->kabupaten,
        ]);

        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata created successfully.');
    }

    public function edit(Wisata $wisata)
    {
        return view('admin.wisatas.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'sometimes|url',
            'gambar' => 'sometimes|image',
            'kabupaten' => 'sometimes',

        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/image');
            $wisata->gambar = basename($path);
        }

        $wisata->update($request->all());

        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata updated successfully.');
    }

    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('admin.wisatas.index')->with('success', 'Wisata deleted successfully.');
    }
}
