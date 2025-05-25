<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Djatiroto - Layanan Kesehatan Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="#layanan">Layanan</a>
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
            <div class="row align-items-center">
                <div class="col-lg-7">
                    @if(Auth::check())
                        <h3> Selamat Datang , {{ Auth::user()->name }} </h3>
                    @else
                        <h3> Selamat Datang , Guest </h3>
                    @endif
                    <h1 class="hero-title">Pelayanan Kesehatan Terpadu Untuk Masyarakat</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="layanan" class="py-5 bg-light-green">
        <div class="container">
            <div class="title-container">
                <h2 class="section-title">Layanan Kami</h2>
            </div>
            <div class="slider-container">
                <div class="slider-controls">
                    <button id="prev-btn" class="slider-btn"><i class="bi bi-chevron-left"></i></button>
                    <button id="next-btn" class="slider-btn"><i class="bi bi-chevron-right"></i></button>
                </div>

                <div class="service-slider">
                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <h5>Pelayanan Klinik</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-heart-fill"></i>
                            </div>
                            <h5>Kesehatan Ibu & Anak</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-eyedropper"></i>
                            </div>
                            <h5>Laboratorium</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-capsule"></i>
                            </div>
                            <h5>Apotek</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <h5>Gawat Darurat</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="service-card card">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h5>Posyandu</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-dots"></div>
            <div class="text-center">
                <a href="{{ route('janji.temu') }}" class="btn btn-primary">
                    Buat Janji Temu Dengan Dokter
                </a>
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
                    <p><i class="bi bi-geo-alt-fill me-3 mt-1"> Jl. Dr. Soetomo No.01, Persil, Jatiroto, Kec. Jatiroto, Kabupaten Lumajang, Jawa Timur 67355</i></p>
                    <p><i class="bi bi-telephone-fill me-3 mt-1"> (0334) 323210</i></p>
                    <p><i class="bi bi-envelope-fill me-3 mt-1"> pkmjtr@gmail.com</i></p>
                    <div class="mt-4">
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/pkm_jatiroto/" class="social-icon">
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

        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.service-slider');
            const cards = document.querySelectorAll('.service-card');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const dotsContainer = document.querySelector('.slider-dots');

            let cardWidth = cards[0].offsetWidth + 20; // Card width + gap
            let currentIndex = 0;
            let cardsPerView = calculateCardsPerView();
            let maxIndex = cards.length - cardsPerView;

            // Create dots
            for (let i = 0; i < maxIndex + 1; i++) {
                const dot = document.createElement('div');
                dot.classList.add('dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }

            // Update dots
            function updateDots() {
                const dots = document.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            // Calculate cards per view based on viewport
            function calculateCardsPerView() {
                const viewportWidth = window.innerWidth;
                if (viewportWidth >= 1200) return 3;
                if (viewportWidth >= 768) return 2;
                return 1;
            }

            // Go to specific slide
            function goToSlide(index) {
                currentIndex = Math.max(0, Math.min(index, maxIndex));
                slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
                updateDots();
            }

            // Previous slide
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    goToSlide(currentIndex);
                }
            });

            // Next slide
            nextBtn.addEventListener('click', () => {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    goToSlide(currentIndex);
                }
            });

            // Handle window resize
            window.addEventListener('resize', () => {
                cardWidth = cards[0].offsetWidth + 20;
                cardsPerView = calculateCardsPerView();
                maxIndex = cards.length - cardsPerView;

                // Recreate dots if needed
                const dots = document.querySelectorAll('.dot');
                if (dots.length !== maxIndex + 1) {
                    dotsContainer.innerHTML = '';
                    for (let i = 0; i < maxIndex + 1; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('dot');
                        if (i === currentIndex) dot.classList.add('active');
                        dot.addEventListener('click', () => goToSlide(i));
                        dotsContainer.appendChild(dot);
                    }
                }

                // Adjust current position
                currentIndex = Math.min(currentIndex, maxIndex);
                goToSlide(currentIndex);
            });

            // Touch events for mobile swipe
            let touchStartX = 0;
            let touchEndX = 0;

            slider.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            slider.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left - go to next slide
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        goToSlide(currentIndex);
                    }
                } else if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right - go to previous slide
                    if (currentIndex > 0) {
                        currentIndex--;
                        goToSlide(currentIndex);
                    }
                }
            }
        });
    </script>
</body>
</html>
