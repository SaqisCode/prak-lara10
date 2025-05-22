<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get();
        return view('janji_temu', compact('jadwals'));
    }
}