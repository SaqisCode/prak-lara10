@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Jadwal Dokter</h1>

        <form action="{{ route('dokter.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="dokter_id" class="form-label">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-select @error('dokter_id') is-invalid @enderror">
                    <option value="" disabled>Pilih Dokter</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ $jadwal->dokter_id == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->name }} - {{ $dokter->spesialis }}
                        </option>
                    @endforeach
                </select>
                @error('dokter_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-select @error('hari') is-invalid @enderror">
                    <option value="" disabled>Pilih Hari</option>
                    <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
                @error('hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}">
                @error('jam_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}">
                @error('jam_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dokter.jadwal') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
