@extends('admin.layouts.app')

@section('title', 'Janji Temu')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Edit Janji Temu</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('janji-temu.update', $janjiTemu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="hari" class="form-label">Hari Janji Temu</label>
                    <input type="text" class="form-control" id="hari" name="hari" 
                           value="{{ old('hari', $janjiTemu->hari) }}" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="menunggu" {{ $janjiTemu->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ $janjiTemu->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ $janjiTemu->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="selesai" {{ $janjiTemu->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('janji-temu.show', $janjiTemu->id) }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection