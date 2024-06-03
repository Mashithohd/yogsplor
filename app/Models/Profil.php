<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Tambahkan atribut fillable yang memungkinkan mass assignment
    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'photo',
        // Tambahkan kolom lainnya yang ingin Anda masukkan di sini
    ];

    // Tambahkan atribut hidden jika ada kolom yang ingin disembunyikan ketika diambil
    protected $hidden = [
        'password',
        'remember_token',
        // Tambahkan kolom lainnya yang ingin disembunyikan di sini
    ];
}
