<?php
    namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupatens'; // sesuaikan nama tabel sesuai dengan yang Anda gunakan
    protected $fillable = ['nama_kabupaten','gambar']; // sesuaikan dengan kolom-kolom yang dapat diisi
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}

