<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\JanjiTemu; // Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $janjiTemus = JanjiTemu::with(['pasien', 'dokter', 'jadwalDokter'])->get(); // Tambahkan ini

        return view('admin.dashboard', compact('pasiens', 'dokters', 'janjiTemus'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('pasiens')->ignore($pasien->id),
            ],
            'nik' => [
                'required',
                'numeric',
                'max_digits:16',
                'min_digits:16',
                Rule::unique('pasiens')->ignore($pasien->id),
            ],
            'jenis_kelamin' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Wajib mengisi Nama Lengkap!',
            'email.required' => 'Wajib mengisi Email!',
            'email.unique' => 'Email ini sudah digunakan oleh pasien lain!',
            'nik.required' => 'Wajib mengisi NIK!',
            'nik.numeric' => 'NIK tidak dapat berisi huruf!',
            'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
            'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
            'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
            'password.required' => 'Wajib mengisi Password!',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }
}
