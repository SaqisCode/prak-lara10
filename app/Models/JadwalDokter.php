<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dokters';

    protected $fillable = [
        'dokter_id',
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'sabtu',
        'minggu',
    ];

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalDokter::class);
    }
}
