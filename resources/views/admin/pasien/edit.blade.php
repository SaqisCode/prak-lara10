@extends('admin.layouts.app')

@section('title', 'Pasien')

@section('content')
    <div class="container mt-5">
        <h1>Edit Data Pasien</h1>

        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ $pasien->name }}">
                @error("name")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ $pasien->email }}">
                @error("email")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control @error("nik") is-invalid @enderror" id="nik" name="nik" value="{{ $pasien->nik }}">
                @error("nik")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pasien->jenis_kelamin }}">
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
                <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" value="{{ $pasien->password }}">
                @error("password")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection