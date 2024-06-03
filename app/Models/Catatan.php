<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'catatan'; // Ganti 'nama_tabel_catatan' dengan nama tabel Anda
    protected $fillable = ['hari', 'id_hotel', 'id_wisata', 'id_makan']; // Atur kolom yang dapat diisi secara massal
}
