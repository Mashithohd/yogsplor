<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Storage;

class AdminKabupatenController extends Controller
{
    public function index()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.kabupatens.index', compact('kabupatens'));
    }

    public function create()
    {
        return view('admin.kabupatens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens,nama_kabupaten',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('kabupaten', 'public');

        Kabupaten::create([
            'nama_kabupaten' => $request->nama_kabupaten,
            'gambar' => $gambarPath
        ]);

        return redirect()->route('admin.kabupaten.index')->with('success', 'Kabupaten created successfully.');
    }

    public function edit(Kabupaten $kabupaten)
    {
        return view('admin.kabupatens.edit', compact('kabupaten'));
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens,nama_kabupaten,'.$kabupaten->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->only('nama_kabupaten');
        if ($request->hasFile('gambar')) {
            // Delete the old image
            if ($kabupaten->gambar) {
                Storage::disk('public')->delete($kabupaten->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kabupaten', 'public');
            $data['gambar'] = $gambarPath;
        }

        $kabupaten->update($data);

        return redirect()->route('admin.kabupaten.index')->with('success', 'Kabupaten updated successfully.');
    }

    public function destroy(Kabupaten $kabupaten)
    {
        // Delete the image
        if ($kabupaten->gambar) {
            Storage::disk('public')->delete($kabupaten->gambar);
        }

        $kabupaten->delete();

        return redirect()->route('admin.kabupaten.index')->with('success', 'Kabupaten deleted successfully.');
    }

        public function show(Kabupaten $kabupaten)
    {
        return view('admin.kabupatens.show', compact('kabupaten'));
    }

}
