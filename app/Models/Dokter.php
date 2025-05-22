<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    ];

    public function jadwalDokters(): HasMany
    {
        return $this->hasMany(JadwalDokter::class);
    }
    // Anda bisa menambahkan relasi dengan tabel lain di sini jika ada,
    // contohnya dengan tabel pasien atau jadwal.
    // public function patients() {
    //     return $this->hasMany(Patient::class);
    // }
}
