@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
<div class="container mt-5">
    <h1>Tambah Dokter</h1>

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error("name")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <select class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis">
                <option value="" selected disabled>Pilih Spesialis</option>
                <option value="Mata" {{ old('spesialis') == 'Mata' ? 'selected' : '' }}>Mata</option>
                <option value="THT" {{ old('spesialis') == 'THT' ? 'selected' : '' }}>THT</option>
                <option value="Saraf" {{ old('spesialis') == 'Saraf' ? 'selected' : '' }}>Saraf</option>
                <option value="Gigi" {{ old('spesialis') == 'Gigi' ? 'selected' : '' }}>Gigi</option>
                <option value="Ibu & Anak" {{ old('spesialis') == 'Ibu & Anak' ? 'selected' : '' }}>Ibu & Anak</option>
                <option value="Kandungan" {{ old('spesialis') == 'Kandungan' ? 'selected' : '' }}>Kandungan</option>
                <option value="Bedah" {{ old('spesialis') == 'Bedah' ? 'selected' : '' }}>Bedah</option>
                <option value="Penyakit Dalam" {{ old('spesialis') == 'Penyakit Dalam' ? 'selected' : '' }}>Penyakit Dalam</option>
                <option value="Umum" {{ old('spesialis') == 'Umum' ? 'selected' : '' }}>Umum</option>
            </select>
            @error("spesialis")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}">
            @error("email")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control @error("nik") is-invalid @enderror" id="nik" name="nik"
                value="{{ old('nik') }}">
            @error("nik")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error("jenis_kelamin")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password"
                value="{{ old('password') }}">
            @error("password")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
