<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
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
            'jenis_kelamin.required' => 'Wajib mengisi Jenis Kelamin!',
            'password.required' => 'Wajib mengisi Password!',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus!');
    }

    public function show(Pasien $pasien)
    {
        return view('admin.pasien.show', compact('pasien'));
    }
}
