<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Djatiroto - Layanan Kesehatan Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-heart-pulse me-2"></i>Puskesmas Djatiroto
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-light">
                                <i class="bi bi-box-arrow-in-left me-1"></i> Logout
                            </button>
                        </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk / Daftar
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="main-header">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-7">
                    <h5> Home > Janji Temu </h5>
                    <h3 class="hero-title">Janji Temu</h3>
                </div>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <div class="container py-5">
        <div class="title-container">
            <h2 class="section-title">Jadwal Dokter</h2>
        </div>

    @forelse ($jadwals as $jadwal)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-10">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold mb-1">{{ $jadwal->dokter->name ?? '-' }}</h5>
                        <p class="text-muted mb-0">
                            <i class="fas fa-stethoscope"></i>
                            Spesialis {{ $jadwal->dokter->spesialis ?? '-' }}
                        </p>
                    </div>
                    <button class="btn btn-sm btn-primary mb-0 mt-0"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#jadwalDetail{{ $jadwal->id }}"
                            aria-expanded="false"
                            aria-controls="jadwalDetail{{ $jadwal->id }}">
                        Lihat Jadwal <i class="fas fa-chevron-down ms-2"></i>
                    </button>
                </div>

                <div class="collapse mt-3" id="jadwalDetail{{ $jadwal->id }}">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr class="text-center">
                                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                    <th class="py-2">{{ $hari }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                                    <td class="py-2">
                                        @if(!empty($jadwal->$hari))
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                {{ $jadwal->$hari }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>

<!-- Dalam file resources/views/janji_temu.blade.php -->
<div class="text-center d-grid">
    @auth
        @if(Auth::user() instanceof \App\Models\Pasien)
            <a href="{{ route('janji.temu.form', $jadwal->id) }}"
               class="btn btn-primary mt-3 w-100">
                <i class="fas fa-calendar-check me-2"></i> Buat Janji
            </a>
        @else
            <button class="btn btn-secondary mt-3 w-100" disabled>
                <i class="fas fa-calendar-check me-2"></i> Hanya untuk Pasien
            </button>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-primary mt-3 w-100">
            <i class="fas fa-sign-in-alt me-2"></i> Login untuk Buat Janji
        </a>
    @endauth
</div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i> Tidak ada jadwal dokter tersedia
        </div>
        @endforelse
    </div>

    <!-- Footer -->
    <footer id="kontak" class="main-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="text-white mb-4">
                        <i class="bi bi-heart-pulse me-2"></i>Puskesmas Djatiroto
                    </h4>
                    <p><i class="bi bi-geo-alt-fill me-3 mt-1"> Jl. Dr. Soetomo No.01, Persil, Jatiroto, Kec. Jatiroto, Kabupaten Lumajang, Jawa Timur 67355</i></p>
                    <p><i class="bi bi-telephone-fill me-3 mt-1"> (0334) 323210</i></p>
                    <p><i class="bi bi-envelope-fill me-3 mt-1"> pkmjtr@gmail.com</i></p>
                    <div class="mt-4">
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="mt-5 opacity-25">
            <div class="text-center pt-3">
                <p class="mb-0 small">&copy; 2025 Puskesmas Djatiroto. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
