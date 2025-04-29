<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien | Puskesmas Sehat Bahagia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="container mt-5">
        <!-- Floating medical icons -->
        <i class="bi bi-plus-circle floating-icon plus"></i>
        <i class="bi bi-heart-pulse floating-icon heart"></i>
        
        <div class="header">
            <div class="header-text">
                <h1>Manajemen Data Pasien</h1>
                <p class="subtitle">Sistem Informasi Terpadu Puskesmas Sehat Bahagia</p>
            </div>
            <div class="header-logo">
                <img src="https://via.placeholder.com/150x80?text=PUSKESMAS" alt="Logo Puskesmas Sehat Bahagia">
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
            <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Tambah Pasien Baru
            </a>
            <div class="d-flex align-items-center">
                <span class="me-2 text-muted">Total Pasien:</span>
                <span class="badge rounded-pill bg-primary">{{ count($pasiens) }}</span>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $index => $pasien)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $pasien->nama }}</strong>
                            <div class="text-muted small">{{ $pasien->alamat }}</div>
                        </td>
                        <td>{{ $pasien->nik }}</td>
                        <td>
                            <span class="badge {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'badge-male' : 'badge-female' }}">
                                <i class="bi {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bi-gender-male' : 'bi-gender-female' }}"></i>
                                {{ $pasien->jenis_kelamin }}
                            </span>
                        </td>
                        <td>32 tahun</td>
                        <td class="action-buttons">
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <div class="text-muted small">
                <i class="bi bi-info-circle"></i> Terakhir diperbarui: {{ now()->format('d F Y H:i') }}
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-muted small">
        <div class="container">
            <hr>
            <p class="mb-0">© 2023 Puskesmas Sehat Bahagia. All rights reserved.</p>
            <p class="mb-0">Sistem Informasi Manajemen Pasien v2.0</p>
        </div>
    </footer>

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
</body>
</html>