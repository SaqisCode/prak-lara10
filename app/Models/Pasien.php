<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pasien extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'nik',
        'jenis_kelamin',
        'password',
    ];

    public function rawatInap()
    {
        return $this->hasMany(RawatInap::class);
    }

}
