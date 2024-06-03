<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hotel','lokasi','rating','harga','gambar','kabupaten'
        // Tambahkan properti lain yang ingin Anda izinkan untuk mass assignment di sini
    ];
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten');
    }
}
