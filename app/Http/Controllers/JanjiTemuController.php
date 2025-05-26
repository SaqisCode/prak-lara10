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
        ]);

        $jadwal = JadwalDokter::findOrFail($jadwalId);

        JanjiTemu::create([
            'pasien_id' => Auth::id(), // Auth::user()->id juga bisa digunakan
            'dokter_id' => $jadwal->dokter_id,
            'jadwal_dokter_id' => $jadwal->id,
            'hari' => $request->hari,
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

    // Tambahkan method berikut ke JanjiTemuController
public function show(JanjiTemu $janjiTemu)
{
    $janjiTemu->load(['pasien', 'dokter', 'jadwalDokter']);
    return view('admin.janji-temu.show', compact('janjiTemu'));
}

public function edit(JanjiTemu $janjiTemu)
{
    return view('admin.janji-temu.edit', compact('janjiTemu'));
}

public function update(Request $request, JanjiTemu $janjiTemu)
{
    $request->validate([
        'hari' => 'required|string',
        'status' => 'required|in:menunggu,disetujui,ditolak,selesai'
    ]);

    $janjiTemu->update([
        'hari' => $request->hari,
        'status' => $request->status
    ]);

    return redirect()->route('janji-temu.show', $janjiTemu->id)->with('success', 'Janji temu berhasil diperbarui!');
}

public function destroy(JanjiTemu $janjiTemu)
{
    $janjiTemu->delete();
    return redirect()->route('janji-temu.index')->with('success', 'Janji temu berhasil dihapus!');
}
}
