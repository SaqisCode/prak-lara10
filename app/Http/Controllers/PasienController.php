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
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:pasiens|numeric|max_digits:16|min_digits:16',
            'jenis_kelamin' => 'required'
        ], [
            'nama.required' => 'Wajib mengisi Nama Lengkap!',
            'nik.required' => 'Wajib mengisi NIK!',
            'nik.numeric' => 'NIK tidak dapat berisi huruf!',
            'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
            'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
            'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => [
                'required',
                'numeric',
                'max_digits:16',
                'min_digits:16',
                Rule::unique('pasiens')->ignore($pasien->id),
            ],
            'jenis_kelamin' => 'required'
        ], [
            'nama.required' => 'Wajib mengisi Nama Lengkap!',
            'nik.required' => 'Wajib mengisi NIK!',
            'nik.numeric' => 'NIK tidak dapat berisi huruf!',
            'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
            'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
            'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
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
