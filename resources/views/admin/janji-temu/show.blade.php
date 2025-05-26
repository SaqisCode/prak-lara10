@extends('admin.layouts.app')

@section('title', 'Janji Temu')

@section('content')
    <div class="container mt-5">
        <div class="mb-5">
            <h5>Informasi Pasien</h5>
            <p><strong>Nama:</strong> {{ $janjiTemu->pasien->name }}</p>
            <p><strong>Email:</strong> {{ $janjiTemu->pasien->email }}</p>
            <p><strong>NIK:</strong> {{ $janjiTemu->pasien->nik }}</p>
            <p><strong>JK:</strong> {{ $janjiTemu->pasien->jenis_kelamin }}</p>
        </div>
        <div class="mb-5">
            <h5>Informasi Dokter</h5>
            <p><strong>Nama Lengkap:</strong> {{ $janjiTemu->dokter->name }}</p>
            <p><strong>Email:</strong> {{ $janjiTemu->dokter->email }}</p>
            <p><strong>Spesialis:</strong> {{ $janjiTemu->dokter->spesialis}}</p>
            <p><strong>NIK:</strong> {{ $janjiTemu->dokter->nik }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $janjiTemu->dokter->jenis_kelamin }}</p>
        </div>
        <div class="mb-5">
            <h5>Detail Janji Temu</h5>
            <p><strong>Hari:</strong> {{ $janjiTemu->hari }}</p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($janjiTemu->status == 'menunggu') bg-warning text-dark
                    @elseif($janjiTemu->status == 'disetujui') bg-success
                    @elseif($janjiTemu->status == 'ditolak') bg-danger
                    @else bg-info @endif">
                    {{ $janjiTemu->status }}
                </span>
            </p>
            <p><strong>Dibuat pada:</strong> {{ $janjiTemu->created_at->format('d M Y H:i') }}</p>
        </div>
            <a href="{{ route('janji-temu.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar
            </a>
            <a href="{{ route('janji-temu.edit', $janjiTemu->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
    </div>
@endsection