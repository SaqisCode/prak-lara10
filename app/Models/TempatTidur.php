<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTidur extends Model
{
    use HasFactory;

    protected $fillable = ['kamar_id', 'kode_tt', 'status'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
