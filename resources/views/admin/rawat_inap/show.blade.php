@extends('admin.layouts.app')

@section('title', 'Pasien')

@section('content')
    <div class="container mt-4">
        <h2>Detail Data Pasien</h2>
        <p><strong>Nama Lengkap:</strong> {{ $rawatInap->pasien->name }}</p>
        <p><strong>Email:</strong> {{ $rawatInap->pasien->email }}</p>
        <p><strong>NIK:</strong> {{ $rawatInap->pasien->nik }}</p>
        <p><strong>JK:</strong> {{ $rawatInap->pasien->jenis_kelamin }}</p>

        <h2>Detail Data Kamar & Tempat Tidur</h2>
        <p><strong>Kamar:</strong> {{ $rawatInap->tempatTidur->kamar->nama_kamar }}</p>
        <p><strong>Lantai:</strong> {{ $rawatInap->tempatTidur->kamar->lantai }}</p>
        <p><strong>Kelas:</strong> {{ $rawatInap->tempatTidur->kamar->kelas }}</p>
        <p><strong>Tempat Tidur:</strong> {{ $rawatInap->tempatTidur->kode_tt }}</p>
        <p><strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($rawatInap->tanggal_masuk)->format('d-m-Y') }}</p>

        <a href="{{ route('rawatInap.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection
