@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <h1>Tambah Jadwal Dokter</h1>

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

            <div class="row">
                @php
                    $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
                @endphp
                @foreach ($days as $day)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($day) }}</h5>
                                <div class="mb-3">
                                    <label for="{{ $day }}" class="form-label">Jadwal {{ ucfirst($day) }}</label>
                                    <input type="text" name="{{ $day }}" id="{{ $day }}"
                                        class="form-control @error($day) is-invalid @enderror"
                                        placeholder="Contoh: 09:00 - 17:00" value="{{ old($day) }}">
                                    @error($day)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dokter.jadwal') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
