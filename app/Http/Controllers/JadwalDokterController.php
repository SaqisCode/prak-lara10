<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get();
        return view('admin.dokter.jadwal', compact('jadwals'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.create-jadwal', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dokter_id' => 'required|exists:dokters,id',
            'senin' => 'nullable|string',
            'selasa' => 'nullable|string',
            'rabu' => 'nullable|string',
            'kamis' => 'nullable|string',
            'jumat' => 'nullable|string',
            'sabtu' => 'nullable|string',
            'minggu' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        JadwalDokter::create([
            'dokter_id' => $request->dokter_id,
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat,
            'sabtu' => $request->sabtu,
            'minggu' => $request->minggu,
        ]);

        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil disimpan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $dokters = Dokter::all();
        return view('admin.dokter.edit-jadwal', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'dokter_id' => 'required|exists:dokters,id',
            'senin' => 'nullable|string',
            'selasa' => 'nullable|string',
            'rabu' => 'nullable|string',
            'kamis' => 'nullable|string',
            'jumat' => 'nullable|string',
            'sabtu' => 'nullable|string',
            'minggu' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->update([
            'dokter_id' => $request->dokter_id,
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat,
            'sabtu' => $request->sabtu,
            'minggu' => $request->minggu,
        ]);

        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('dokter.jadwal')->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}
