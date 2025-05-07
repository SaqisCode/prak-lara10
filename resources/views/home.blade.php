<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Djatiroto - Layanan Kesehatan Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a6f54;
            --secondary-color: #e8f4f0;
            --accent-color: #ff7e36;
            --text-dark: #2d3748;
            --text-light: #f8f9fa;
            --section-padding: 80px 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Header Styles */
        .main-header {
            background: linear-gradient(135deg, rgba(26, 111, 84, 0.9) 0%, rgba(14, 90, 66, 0.9) 100%), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0 80px;
            position: relative;
        }

        .navbar {
            transition: all 0.3s ease;
            padding: 20px 0;
        }

        .navbar.scrolled {
            background-color: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .navbar.scrolled .nav-link {
            color: var(--text-dark) !important;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-color) !important;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        /* Service Cards */
        .service-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        /* Features Section */
        .feature-box {
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .main-footer {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 10px;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0e5a42;
            border-color: #0e5a42;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 111, 84, 0.3);
        }

        .btn-outline-light {
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
        }

        /* Utility Classes */
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .section-title:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
            border-radius: 2px;
        }

        .bg-light-green {
            background-color: var(--secondary-color);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
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
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dokter">Dokter</a>
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
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
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
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-title">Pelayanan Kesehatan Terpadu Untuk Masyarakat</h1>
                    <p class="hero-subtitle">Puskesmas Djatiroto memberikan pelayanan kesehatan yang berkualitas dengan fasilitas modern dan tenaga medis profesional.</p>
                    <div class="d-flex gap-3">
                        <a href="#layanan" class="btn btn-primary">
                            <i class="bi bi-search-heart me-2"></i>Lihat Layanan
                        </a>
                        <a href="#" class="btn btn-outline-light">
                            <i class="bi bi-calendar-check me-2"></i>Daftar Online
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                         alt="Dokter Puskesmas" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="layanan" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <h4>Pelayanan Klinik</h4>
                            <p>Pemeriksaan kesehatan umum, pengobatan, dan konsultasi dokter umum.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-heart-fill"></i>
                            </div>
                            <h4>Kesehatan Ibu & Anak</h4>
                            <p>Pemeriksaan kehamilan, imunisasi, dan konsultasi gizi balita.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-eyedropper"></i>
                            </div>
                            <h4>Laboratorium</h4>
                            <p>Pemeriksaan darah, urine, dan tes kesehatan lainnya.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-capsule"></i>
                            </div>
                            <h4>Apotek</h4>
                            <p>Pelayanan obat dengan resep dokter dan obat generik.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <h4>Gawat Darurat</h4>
                            <p>Pelayanan 24 jam untuk kasus gawat darurat.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4>Posyandu</h4>
                            <p>Pelayanan kesehatan masyarakat terintegrasi.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fasilitas" class="py-5 bg-light-green">
        <div class="container">
            <h2 class="text-center section-title">Fasilitas Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Alat Medis Modern</h4>
                        </div>
                        <p>Didukung dengan peralatan medis terkini untuk diagnosis dan pengobatan yang akurat.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Tenaga Profesional</h4>
                        </div>
                        <p>Dokter dan perawat berpengalaman dengan sertifikasi resmi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Lingkungan Nyaman</h4>
                        </div>
                        <p>Ruang tunggu dan perawatan yang bersih, nyaman, dan higienis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Sistem Online</h4>
                        </div>
                        <p>Pendaftaran online dan rekam medis elektronik untuk kemudahan pasien.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Biaya Terjangkau</h4>
                        </div>
                        <p>Pelayanan kesehatan berkualitas dengan biaya terjangkau.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-check-circle-fill text-primary fs-4"></i>
                            </div>
                            <h4 class="mb-0">Lokasi Strategis</h4>
                        </div>
                        <p>Berada di pusat kota dengan akses transportasi yang mudah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="dokter" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Tim Dokter Kami</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 text-center">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Dokter">
                        <div class="card-body">
                            <h5 class="card-title">dr. Dedi Pratama</h5>
                            <p class="card-text small">Spesialisasi: Kesehatan Gigi</p>
                            <button>Lihat Jadwal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="py-5 bg-light-green">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3">
                    <div class="p-3">
                        <h2 class="fw-bold text-primary">15+</h2>
                        <p class="mb-0">Tenaga Medis</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <h2 class="fw-bold text-primary">24/7</h2>
                        <p class="mb-0">Layanan Gawat Darurat</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <h2 class="fw-bold text-primary">10+</h2>
                        <p class="mb-0">Jenis Layanan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <h2 class="fw-bold text-primary">5000+</h2>
                        <p class="mb-0">Pasien Per Bulan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="main-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="text-white mb-4">
                        <i class="bi bi-heart-pulse me-2"></i>Puskesmas Djatiroto
                    </h4>
                    <p>Memberikan pelayanan kesehatan prima untuk masyarakat dengan fasilitas modern dan tenaga medis profesional.</p>
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
                        <a href="#" class="social-icon">
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-white mb-4">Tautan Cepat</h5>
                    <div class="footer-links">
                        <a href="#home">Beranda</a>
                        <a href="#layanan">Layanan</a>
                        <a href="#fasilitas">Fasilitas</a>
                        <a href="#dokter">Dokter</a>
                        <a href="#kontak">Kontak</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white mb-4">Layanan Kami</h5>
                    <div class="footer-links">
                        <a href="#">Klinik Umum</a>
                        <a href="#">KIA & KB</a>
                        <a href="#">Imunisasi</a>
                        <a href="#">Laboratorium</a>
                        <a href="#">Gigi & Mulut</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white mb-4">Kontak Kami</h5>
                    <div class="d-flex mb-3">
                        <i class="bi bi-geo-alt-fill me-3 mt-1"></i>
                        <p class="mb-0">Jl. Kesehatan No. 123, Djatiroto, Lumajang, Jawa Timur</p>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-telephone-fill me-3 mt-1"></i>
                        <p class="mb-0">(0334) 581234</p>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="bi bi-envelope-fill me-3 mt-1"></i>
                        <p class="mb-0">info@puskesmasdjatiroto.id</p>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-clock-fill me-3 mt-1"></i>
                        <p class="mb-0">Senin-Minggu: 07.00 - 21.00 WIB</p>
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