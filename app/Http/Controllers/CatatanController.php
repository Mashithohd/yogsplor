<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan; // Import model Catatan

class CatatanController extends Controller
{
    public function show()
    {
        // Mengambil data dari database
        $catatan = Catatan::all();
        return view('catatan', ['catatan' => $catatan]);
    }

    public function saveNotes(Request $request)
    {
        // Validasi input
        $notes = $request->input('notes');
        
        // Hapus semua data lama
        Catatan::truncate();

        // Simpan data baru ke database
        foreach ($notes as $note) {
            $catatan = new Catatan();
            $catatan->hari = $note['day'];
            $catatan->hotelName = $note['hotelName'];
            $catatan->wisata = $note['wisata'];
            $catatan->makan = $note['makan'];
            $catatan->save();
        }

        // Berikan respons sukses
        return response()->json(['message' => 'Catatan berhasil disimpan.']);
    }

    public function tambah(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'id_hotel' => 'required|integer',
            'id_wisata' => 'required|integer',
            'id_makan' => 'required|integer',
        ]);

        // Simpan catatan ke database
        $catatan = new Catatan();
        $catatan->id_hotel = $validatedData['id_hotel'];
        $catatan->id_wisata = $validatedData['id_wisata'];
        $catatan->id_makan = $validatedData['id_makan'];
        $catatan->save();

        // Berikan respons JSON ke frontend
        return response()->json(['message' => 'Catatan berhasil ditambahkan ke catatan.']);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'hari' => 'required|integer',
            'id_hotel' => 'required|integer',
            'id_wisata' => 'required|integer',
            'id_makan' => 'required|integer',
        ]);
        
        try {
            // Membuat catatan baru
            $catatan = new Catatan();
            $catatan->hari = $validatedData['hari'];
            $catatan->id_hotel = $validatedData['id_hotel'];
            $catatan->id_wisata = $validatedData['id_wisata'];
            $catatan->id_makan = $validatedData['id_makan'];
            
            // Menyimpan catatan ke dalam database
            $catatan->save();
            
            // Mengembalikan respons sukses dengan ID catatan yang baru saja dibuat
            return response()->json([
                'message' => 'Catatan berhasil disimpan',
                'id_catatan' => $catatan->id
            ], 201);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, mengembalikan respons dengan status kode 500 (Internal Server Error)
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan catatan'], 500);
        }
    }
}
