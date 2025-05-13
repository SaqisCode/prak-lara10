@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Dokter</h1>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <div class="relative">
                <input type="text" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm" placeholder="Cari dokter...">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>
    </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <span class="me-2 text-muted">Total Dokter:</span>
                <span class="badge rounded-pill bg-primary">{{ count($dokters) }}</span>
            </div>
        </div>

        <a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>

        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Spesialis</th>
                        <th>NIK</th>
                        <th>JK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokters as $index => $dokter)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $dokter->name }}</strong>
                            <div class="text-sm text-gray-500">0821-3345-6789</div>
                            <div class="text-muted small">{{ $dokter->alamat }}</div>
                        </td>
                        <td>{{ $dokter->spesialis}}</td>
                        <td>{{ $dokter->nik }}</td>
                        <td>
                            <strong>{{ $dokter->jenis_kelamin }}</strong>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus dokter?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Add active class to current page in pagination
        document.querySelectorAll('.page-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelector('.page-item.active').classList.remove('active');
                this.classList.add('active');
            });
        });
    </script>