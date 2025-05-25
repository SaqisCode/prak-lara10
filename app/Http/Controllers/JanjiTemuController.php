<?php

namespace App\Http\Controllers;

use App\Models\JanjiTemu;
use App\Models\JadwalDokter;
use App\Models\Pasien; // <-- Tambahkan ini untuk import model Pasien
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JanjiTemuController extends Controller
{
    /**
     * Menampilkan halaman utama janji temu untuk pasien
     */
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get();
        return view('janji_temu', compact('jadwals'));
    }

    /**
     * Menampilkan halaman admin untuk mengelola janji temu
     */
    public function adminIndex()
    {
        $janjiTemus = JanjiTemu::with(['pasien', 'dokter', 'jadwalDokter'])
            ->orderBy('created_at', 'desc')
            ->get();
        $janjitemu = JanjiTemu::all();
        return view('admin.janji-temu.index', compact('janjiTemus', 'janjitemu'));
    }


    public function store(Request $request, $jadwalId)
    {
        // Perbaikan: Gunakan instanceof untuk mengecek tipe user
        if (!Auth::check() || !(Auth::user() instanceof Pasien)) {
            return redirect()->route('login')->with('error', 'Silakan login sebagai pasien terlebih dahulu.');
        }

        $request->validate([
            'hari' => 'required|string',
            'waktu' => 'required|string',
            'keluhan' => 'nullable|string',
        ]);

        $jadwal = JadwalDokter::findOrFail($jadwalId);

        JanjiTemu::create([
            'pasien_id' => Auth::id(), // Auth::user()->id juga bisa digunakan
            'dokter_id' => $jadwal->dokter_id,
            'jadwal_dokter_id' => $jadwal->id,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu'
        ]);

        return redirect()->back()->with('success', 'Janji temu berhasil dibuat!');
    }

    public function showForm($jadwalId)
    {
        // Perbaikan yang sama di sini
        if (!Auth::check() || !(Auth::user() instanceof Pasien)) {
            return redirect()->route('login')->with('error', 'Silakan login sebagai pasien terlebih dahulu.');
        }

        $jadwal = JadwalDokter::with('dokter')->findOrFail($jadwalId);
        return view('form_janji_temu', compact('jadwal'));
    }
}
