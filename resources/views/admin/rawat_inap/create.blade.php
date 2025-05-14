@extends('admin.layouts.app')

@section('title', 'Rawat Inap')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Form Tambah Kamar Rawat Inap</h2>
        <form action="{{ route('kamar.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
            <div class="col-md-4">
                <label for="nama_kamar" class="form-label">Nama Kamar</label>
                <input type="text" class="form-control" name="nama_kamar" id="nama_kamar" required>
            </div>
            <div class="col-md-2">
                <label for="lantai" class="form-label">Lantai</label>
                <input type="number" class="form-control" name="lantai" id="lantai" required>
            </div>
            <div class="col-md-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="kelas" id="kelas" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="Kelas I">Kelas I</option>
                <option value="Kelas II">Kelas II</option>
                <option value="Kelas III">Kelas III</option>
                <option value="VIP">VIP</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="jumlah_tt" class="form-label">Jumlah Tempat Tidur</label>
                <input type="number" class="form-control" name="jumlah_tt" id="jumlah_tt" required>
            </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan Kamar</button>
        </form>
    </div>
@endsection
