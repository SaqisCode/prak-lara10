@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <h1>Edit Data Dokter</h1>

        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ $dokter->name }}">
                @error("name")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ $dokter->email }}">
                @error("email")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="spesialis" class="form-label">Spesialis</label>
                <input type="spesialis" class="form-control @error("spesialis") is-invalid @enderror" id="spesialis" name="spesialis" value="{{ $dokter->spesialis }}">
                @error("spesialis")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control @error("nik") is-invalid @enderror" id="nik" name="nik" value="{{ $dokter->nik }}">
                @error("nik")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" {{ $dokter->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $dokter->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" value="{{ $dokter->password }}">
                @error("password")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection