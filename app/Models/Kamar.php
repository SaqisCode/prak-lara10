<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kamar', 'lantai', 'kelas'];

    public function tempatTidur()
    {
        return $this->hasMany(TempatTidur::class);
    }
}
