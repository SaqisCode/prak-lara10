@extends('admin.layouts.app')

@section('title', 'Janji Temu')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Janji Temu > Data</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <span class="me-2 text-muted">Total Janji Temu:</span>
            <span class="badge rounded-pill bg-secondary">{{ count($janjitemu) }}</span>
        </div>
    </div>
    <div class="table-container">
        <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Spesialis</th>
                            <th>Hari</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($janjiTemus as $index => $janji)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $janji->pasien->name }}</strong></td>
                            <td><strong>{{ $janji->dokter->name }}</strong></td>
                            <td>{{ $janji->dokter->spesialis }}</td>
                            <td>{{ $janji->hari }}</td>
                            <td>{{ $janji->status }}</td>
<td>
    <a href="{{ route('janji-temu.show', $janji->id) }}" class="btn btn-sm btn-info">
        <i class="bi bi-eye"></i> Detail
    </a>
    <a href="{{ route('janji-temu.edit', $janji->id) }}" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil"></i> Edit
    </a>
    <form action="{{ route('janji-temu.destroy', $janji->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus janji temu ini?')">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection
