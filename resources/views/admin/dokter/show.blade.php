@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-4">
        <h2>Detail Data Dokter</h2>
        <p><strong>Nama Lengkap:</strong> {{ $dokter->name }}</p>
        <p><strong>Email:</strong> {{ $dokter->email }}</p>
        <p><strong>Spesialis:</strong> {{ $dokter->spesialis}}</p>
        <p><strong>NIK:</strong> {{ $dokter->nik }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $dokter->jenis_kelamin }}</p>

        <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
@endsection