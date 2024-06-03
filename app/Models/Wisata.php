<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_wisata','deskripsi','lokasi','gambar','kabupaten'
        // Tambahkan properti lain yang ingin Anda izinkan untuk mass assignment di sini
    ];
}
