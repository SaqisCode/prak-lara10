<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->latest()->paginate(10); // Eager load relasi dokter dan paginasi
        return view('admin.dokter.jadwal', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.create-jadwal', compact('dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalDokter $jadwal)
    {
        $dokters = Dokter::all();
        return view('admin.dokter.edit-jadwal', compact('jadwal', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalDokter $jadwal)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalDokter $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}
