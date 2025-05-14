<?php

namespace App\Http\Controllers;

use App\Models\TempatTidur;
use Illuminate\Http\Request;

class TempatTidurController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'in:kosong,terisi,sterilisasi'
        ]);

        $tt = TempatTidur::findOrFail($id);
        $tt->status = $request->status;
        $tt->save();

        return back()->with('success', 'Status tempat tidur berhasil diperbarui!');
    }
}
