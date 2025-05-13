<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\TempatTidur;
use App\Models\RawatInap;
use Illuminate\Http\Request;

class RawatInapController extends Controller
{
    public function index()
    {
        $rawatInaps = RawatInap::with(['pasien', 'tempatTidur.kamar'])->get();
        return view('admin.rawat_inap.pasien', compact('rawatInaps'));
    }

    public function create($pasien_id)
    {
        $pasien = Pasien::findOrFail($pasien_id);
        $kamars = Kamar::with('tempatTidur')->get();

        return view('admin.rawat_inap.form', compact('pasien', 'kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tempat_tidur_id' => 'required|exists:tempat_tidurs,id',
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan Rawat Inap
        RawatInap::create([
            'pasien_id' => $request->pasien_id,
            'tempat_tidur_id' => $request->tempat_tidur_id,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Ubah status tempat tidur jadi terisi
        $tt = TempatTidur::find($request->tempat_tidur_id);
        $tt->status = 'terisi';
        $tt->save();

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dirawat inap');
    }

    public function destroy($id)
    {
        // Temukan data rawat inap
        $rawatInap = RawatInap::findOrFail($id);

        // Ubah status tempat tidur menjadi kosong
        $rawatInap->tempatTidur->update(['status' => 'kosong']);

        // Hapus data rawat inap
        $rawatInap->delete();

        return redirect()->route('rawatInap.index')->with('success', 'Pasien berhasil dipulangkan');
    }
}
