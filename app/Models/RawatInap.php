<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tempat_tidur_id',
        'tanggal_masuk',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function tempatTidur()
    {
        return $this->belongsTo(TempatTidur::class);
    }
}
