@extends('admin.layouts.app')

@section('title', 'Rawat Inap')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Form Rawat Inap: {{ $pasien->name }}</h3>

    <form action="{{ route('rawatInap.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">

        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>

        <div class="row">
            @foreach($kamars as $kamar)
            <div class="col-md-4 mb-4">
                <div class="card border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                        <p class="card-text">
                            Lantai: {{ $kamar->lantai }} <br>
                            Kelas: {{ $kamar->kelas }}
                        </p>
                        <hr>
                        <p><strong>Tempat Tidur Tersedia:</strong></p>
                        @php
                            $kosong = $kamar->tempatTidur->where('status', 'kosong');
                        @endphp
                        @if($kosong->count() > 0)
                            @foreach($kosong as $tt)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tempat_tidur_id" id="tt{{ $tt->id }}" value="{{ $tt->id }}">
                                <label class="form-check-label" for="tt{{ $tt->id }}">
                                    {{ $tt->kode_tt }}
                                </label>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted">Tidak ada tempat tidur kosong</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan Rawat Inap</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection