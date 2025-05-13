@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
<div class="container mt-5">
        <h1>Tambah Dokter</h1>

        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error("name")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis</label>
                    <input type="text" class="form-control @error("spesialis") is-invalid @enderror" id="spesialis" name="spesialis" value="{{ old('spesialis') }}">
                    @error("spesialis")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error("email")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error("nik") is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
                    @error("nik")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" >Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                    @error("password")
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection