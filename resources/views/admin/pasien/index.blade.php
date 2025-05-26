@extends('admin.layouts.app')

@section('title', 'Pasien')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Pasien > Data Pasien</h1>
    </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <span class="me-2 text-muted">Total Pasien:</span>
                <span class="badge rounded-pill bg-secondary">{{ count($pasiens) }}</span>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-container">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>JK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $index => $pasien)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $pasien->name }}</strong>
                        </td>
                        <td>{{ $pasien->nik }}</td>
                        <td>
                            <strong>{{ $pasien->jenis_kelamin }}</strong>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pasien?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('rawatInap.form', $pasien->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus"></i> Rawat Inap
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
