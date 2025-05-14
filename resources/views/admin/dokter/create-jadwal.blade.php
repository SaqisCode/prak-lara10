@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Jadwal Dokter</h1>

        <form action="{{ route('dokter.jadwal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="dokter_id" class="form-label">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-select @error('dokter_id') is-invalid @enderror">
                    <option value="" selected disabled>Pilih Dokter</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->name }} - {{ $dokter->spesialis }}</option>
                    @endforeach
                </select>
                @error('dokter_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-select @error('hari') is-invalid @enderror">
                    <option value="" selected disabled>Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
                @error('hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}">
                @error('jam_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}">
                @error('jam_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dokter.jadwal') }}" class="btn btn-secondary">Batal</a>
        </form>

    </div>
@endsection
