<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'spesialis',
        'nik',
        'jenis_kelamin',
        'password',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    // Anda bisa menambahkan relasi dengan tabel lain di sini jika ada,
    // contohnya dengan tabel pasien atau jadwal.
    // public function patients() {
    //     return $this->hasMany(Patient::class);
    // }
}