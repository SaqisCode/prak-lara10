<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Menampilkan daftar semua dokter.
     */
    public function index()
    {
        $dokters = dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    /**
     * Menampilkan detail informasi seorang dokter.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $dokter = dokter::findOrFail($id);
        return view('admin.dokter.show', compact('dokter'));
    }

    /**
     * Menampilkan form untuk membuat dokter baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dokter.create');
    }

    /**
     * Menyimpan dokter baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:dokters',
        'spesialis' => 'required',
        'nik' => 'required|unique:dokters|numeric|max_digits:16|min_digits:16',
        'jenis_kelamin' => 'required',
        'password' => 'required'
    ], [
        'name.required' => 'Wajib mengisi Nama Lengkap!',
        'email.required' => 'Wajib mengisi Email!',
        'email.unique' => 'Email ini sudah digunakan oleh pasien lain!',
        'spesialis.required' => 'Wajib mengisi Spesialis!',
        'nik.required' => 'Wajib mengisi NIK!',
        'nik.numeric' => 'NIK tidak dapat berisi huruf!',
        'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
        'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
        'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
        'password.required' => 'Wajib mengisi Password!',
    ]);

    // Create the pasien with hashed password
    Dokter::create([
        'name' => $request->name,
        'email' => $request->email,
        'spesialis' => $request->spesialis,
        'nik' => $request->nik,
        'jenis_kelamin' => $request->jenis_kelamin,
        'password' => Hash::make($request->password)
    ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit informasi dokter.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $dokter = dokter::findOrFail($id);
        return view('admin.dokter.edit', compact('dokter'));
    }

    /**
     * Mengupdate informasi dokter di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('dokters')->ignore($dokter->id),
            ],
            'spesialis' => 'required',
            'nik' => [
                'required',
                'numeric',
                'max_digits:16',
                'min_digits:16',
                Rule::unique('dokters')->ignore($dokter->id),
            ],
            'jenis_kelamin' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Wajib mengisi Nama Lengkap!',
            'email.required' => 'Wajib mengisi Email!',
            'email.unique' => 'Email ini sudah digunakan oleh pasien lain!',
            'spesialis.required' => 'Wajib mengisi Spesialis!',
            'nik.required' => 'Wajib mengisi NIK!',
            'nik.numeric' => 'NIK tidak dapat berisi huruf!',
            'nik.max_digits' => 'NIK tidak dapat lebih dari 16 digit!',
            'nik.min_digits' => 'NIK tidak dapat kurang dari 16 digit!',
            'nik.unique' => 'NIK ini sudah digunakan oleh pasien lain!',
            'password.required' => 'Wajib mengisi Password!',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Informasi dokter berhasil diperbarui.');
    }

    /**
     * Menghapus dokter dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dokter = dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}