<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\TempatTidur;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index() {
        $kamars = Kamar::with('tempatTidur')->get();
        return view('admin.rawat_inap.index', compact('kamars'));
    }

    public function create() {
        return view('admin.rawat_inap.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kamar' => 'required',
            'lantai' => 'required|numeric',
            'kelas' => 'required',
        ]);

        $kamar = Kamar::create($request->only('nama_kamar', 'lantai', 'kelas'));

        for ($i = 1; $i <= $request->jumlah_tt; $i++) {
            TempatTidur::create([
                'kamar_id' => $kamar->id,
                'kode_tt' => 'TT-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'status' => 'kosong'
            ]);
        }

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }
}
