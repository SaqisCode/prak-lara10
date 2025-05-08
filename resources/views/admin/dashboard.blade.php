<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Puskesmas Sehat Sentosa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* === VARIABLES === */
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --dark: #1e293b;
            --dark-gray: #334155;
            --medium-gray: #64748b;
            --light-gray: #e2e8f0;
            --light: #f8fafc;
            --white: #ffffff;

            --sidebar-width: 280px;
            --header-height: 70px;
            --stat-card-height: 120px;
            --chart-card-height: 350px;
            --border-radius: 10px;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s ease;
        }

        /* === BASE STYLES === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
            font-family: inherit;
        }

        /* === DASHBOARD LAYOUT === */
        .dashboard {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            min-height: 100vh;
        }

        /* === SIDEBAR === */
        .sidebar {
            background-color: var(--white);
            border-right: 1px solid var(--light-gray);
            height: 100vh;
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-header img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .sidebar-header h2 {
            font-size: 1.1rem;
            color: var(--primary);
            font-weight: 700;
        }

        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
            overflow-y: auto;
        }

        .sidebar-menu ul {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 0 1rem;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            font-size: 0.95rem;
            color: var(--dark-gray);
        }

        .sidebar-menu li a:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .sidebar-menu li a i {
            width: 24px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar-menu li.active a {
            background-color: var(--primary-light);
            color: var(--white);
            font-weight: 500;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--light-gray);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--light-gray);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--medium-gray);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            background-color: var(--light-gray);
            color: var(--danger);
            font-weight: 500;
            transition: var(--transition);
        }

        .logout-btn:hover {
            background-color: #fee2e2;
        }

        /* === MAIN CONTENT === */
        .main-content {
            padding-bottom: 2rem;
            overflow-x: hidden;
        }

        /* HEADER */
        .main-header {
            height: var(--header-height);
            background-color: var(--white);
            border-bottom: 1px solid var(--light-gray);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .main-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-box {
            position: relative;
            width: 250px;
        }

        .search-box input {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            border-radius: 50px;
            border: 1px solid var(--light-gray);
            background-color: var(--light);
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .search-box button {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--medium-gray);
        }

        .notifications {
            position: relative;
            color: var(--dark-gray);
            font-size: 1.2rem;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: var(--white);
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            font-weight: 600;
        }

        /* CONTENT WRAPPER */
        .content-wrapper {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* QUICK STATS */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            height: var(--stat-card-height);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .stat-info {
            flex: 1;
        }

        .stat-info h3 {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--medium-gray);
            margin-bottom: 0.5rem;
        }

        .stat-info p {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
        }

        /* CHARTS SECTION */
        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .chart-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            height: var(--chart-card-height);
        }

        .chart-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        .chart-container {
            height: calc(100% - 40px);
            position: relative;
        }

        /* TABLES */
        .recent-patients {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .section-header {
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--light-gray);
        }

        .section-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .view-all {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.9rem;
        }

        th {
            background-color: var(--light);
            color: var(--medium-gray);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        tr {
            border-bottom: 1px solid var(--light-gray);
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover {
            background-color: var(--light);
        }

        .btn-detail {
            padding: 0.4rem 0.8rem;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-detail:hover {
            background-color: var(--primary-dark);
        }

        /* DOCTOR SCHEDULE */
        .doctor-schedule {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .schedule-cards {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .schedule-card {
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            padding: 1.25rem;
            transition: var(--transition);
        }

        .schedule-card:hover {
            border-color: var(--primary-light);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .doctor-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .doctor-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--light-gray);
        }

        .doctor-info h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .doctor-info p {
            font-size: 0.85rem;
            color: var(--medium-gray);
        }

        .schedule-info p {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--dark-gray);
            margin-bottom: 0.5rem;
        }

        .schedule-info p i {
            color: var(--medium-gray);
            width: 16px;
        }

        /* === RESPONSIVE === */
        @media (max-width: 1200px) {
            .dashboard {
                grid-template-columns: 240px 1fr;
            }

            .sidebar {
                width: 240px;
            }
        }

        @media (max-width: 992px) {
            .dashboard {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                width: var(--sidebar-width);
                z-index: 100;
                transition: var(--transition);
            }

            .sidebar.active {
                left: 0;
            }

            .main-header h1 {
                font-size: 1.25rem;
            }

            .search-box {
                width: 200px;
            }

            .content-wrapper {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .quick-stats {
                grid-template-columns: 1fr 1fr;
            }

            .charts-section {
                grid-template-columns: 1fr;
            }

            th, td {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .quick-stats {
                grid-template-columns: 1fr;
            }

            .main-header {
                padding: 0 1rem;
            }

            .search-box {
                display: none;
            }

            .content-wrapper {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="https://via.placeholder.com/40" alt="Logo Puskesmas" class="logo">
                <h2>Puskesmas Sehat Sentosa</h2>
            </div>
            <nav class="sidebar-menu">
                <ul>
                    <li class="active"><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-calendar-alt"></i> Jadwal Dokter</a></li>
                    <li><a href="#"><i class="fas fa-user-injured"></i> Pasien</a></li>
                    <li><a href="#"><i class="fas fa-pills"></i> Obat & Inventaris</a></li>
                    <li><a href="#"><i class="fas fa-file-medical"></i> Rekam Medis</a></li>
                    <li><a href="#"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Tenaga Kesehatan</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <div class="user-profile">
                    <img src="https://via.placeholder.com/40" alt="User Avatar">
                    <div class="user-info">
                        <span class="user-name">Dr. Ani Wijaya</span>
                        <span class="user-role">Dokter Spesialis</span>
                    </div>
                </div>
                <a href="#" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <button class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></button>
                <h1>Dashboard Puskesmas</h1>
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Cari pasien, obat, atau layanan...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="notifications">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                </div>
            </header>

            <div class="content-wrapper">
                <!-- Statistik Cepat -->
                <section class="quick-stats">
                    <div class="stat-card">
                        <div class="stat-icon" style="background-color: var(--primary);">
                            <i class="fas fa-user-injured"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Total Pasien Hari Ini</h3>
                            <p>142</p>
                            <small>+12 dari kemarin</small>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background-color: var(--secondary);">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Janji Temu</h3>
                            <p>36</p>
                            <small>5 menunggu konfirmasi</small>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background-color: var(--warning);">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Stok Obat</h3>
                            <p>62 Jenis</p>
                            <small>8 hampir habis</small>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background-color: var(--danger);">
                            <i class="fas fa-procedures"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Rujukan</h3>
                            <p>7</p>
                            <small>2 belum diproses</small>
                        </div>
                    </div>
                </section>

                <!-- Grafik dan Chart -->
                <section class="charts-section">
                    <div class="chart-card">
                        <h3>Kunjungan Pasien 7 Hari Terakhir</h3>
                        <div class="chart-container">
                            <canvas id="visitsChart"></canvas>
                        </div>
                    </div>
                    <div class="chart-card">
                        <h3>Distribusi Penyakit (Bulan Ini)</h3>
                        <div class="chart-container">
                            <canvas id="diseasesChart"></canvas>
                        </div>
                    </div>
                </section>

                <!-- Tabel Pasien Terbaru -->
                <section class="recent-patients">
                    <div class="section-header">
                        <h3>Pasien Terbaru</h3>
                        <a href="#" class="view-all">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>No. RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Usia</th>
                                    <th>JK</th>
                                    <th>Diagnosa</th>
                                    <th>Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>RM20230501</td>
                                    <td>Budi Santoso</td>
                                    <td>35</td>
                                    <td>L</td>
                                    <td>Hipertensi</td>
                                    <td>dr. Ani</td>
                                    <td>12 Mei 2023</td>
                                    <td><button class="btn-detail">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>RM20230502</td>
                                    <td>Siti Rahayu</td>
                                    <td>28</td>
                                    <td>P</td>
                                    <td>Kehamilan Trimester 1</td>
                                    <td>dr. Budi</td>
                                    <td>12 Mei 2023</td>
                                    <td><button class="btn-detail">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>RM20230503</td>
                                    <td>Ahmad Fauzi</td>
                                    <td>45</td>
                                    <td>L</td>
                                    <td>Diabetes Tipe 2</td>
                                    <td>dr. Ani</td>
                                    <td>11 Mei 2023</td>
                                    <td><button class="btn-detail">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>RM20230504</td>
                                    <td>Dewi Lestari</td>
                                    <td>5</td>
                                    <td>P</td>
                                    <td>ISPA</td>
                                    <td>dr. Citra</td>
                                    <td>11 Mei 2023</td>
                                    <td><button class="btn-detail">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>RM20230505</td>
                                    <td>Rudi Hermawan</td>
                                    <td>60</td>
                                    <td>L</td>
                                    <td>Asam Urat</td>
                                    <td>dr. Budi</td>
                                    <td>10 Mei 2023</td>
                                    <td><button class="btn-detail">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Jadwal Dokter Hari Ini -->
                <section class="doctor-schedule">
                    <div class="section-header">
                        <h3>Jadwal Dokter Hari Ini</h3>
                        <a href="#" class="view-all">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="schedule-cards">
                        <div class="schedule-card">
                            <div class="doctor-info">
                                <img src="https://via.placeholder.com/50" alt="Dokter">
                                <div>
                                    <h4>dr. Ani Wijaya, Sp.A</h4>
                                    <p>Spesialis Anak</p>
                                </div>
                            </div>
                            <div class="schedule-info">
                                <p><i class="far fa-clock"></i> 08:00 - 12:00</p>
                                <p><i class="fas fa-users"></i> 15/20 Pasien</p>
                                <p><i class="fas fa-map-marker-alt"></i> Ruang 101</p>
                            </div>
                        </div>
                        <div class="schedule-card">
                            <div class="doctor-info">
                                <img src="https://via.placeholder.com/50" alt="Dokter">
                                <div>
                                    <h4>dr. Budi Santoso, Sp.PD</h4>
                                    <p>Spesialis Penyakit Dalam</p>
                                </div>
                            </div>
                            <div class="schedule-info">
                                <p><i class="far fa-clock"></i> 13:00 - 17:00</p>
                                <p><i class="fas fa-users"></i> 10/15 Pasien</p>
                                <p><i class="fas fa-map-marker-alt"></i> Ruang 102</p>
                            </div>
                        </div>
                        <div class="schedule-card">
                            <div class="doctor-info">
                                <img src="https://via.placeholder.com/50" alt="Dokter">
                                <div>
                                    <h4>dr. Citra Dewi, Sp.OG</h4>
                                    <p>Spesialis Kandungan</p>
                                </div>
                            </div>
                            <div class="schedule-info">
                                <p><i class="far fa-clock"></i> 09:00 - 14:00</p>
                                <p><i class="fas fa-users"></i> 8/10 Pasien</p>
                                <p><i class="fas fa-map-marker-alt"></i> Ruang 103</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Menu Toggle for Mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Visits Chart
            const visitsCtx = document.getElementById('visitsChart').getContext('2d');
            const visitsChart = new Chart(visitsCtx, {
                type: 'line',
                data: {
                    labels: ['5 Hari Lalu', '4 Hari Lalu', '3 Hari Lalu', '2 Hari Lalu', 'Kemarin', 'Hari Ini'],
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: [92, 105, 88, 110, 130, 142],
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        borderColor: 'rgba(37, 99, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true,
                        pointBackgroundColor: 'rgba(37, 99, 235, 1)',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Diseases Chart
            const diseasesCtx = document.getElementById('diseasesChart').getContext('2d');
            const diseasesChart = new Chart(diseasesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['ISPA (35%)', 'Hipertensi (25%)', 'Diabetes (15%)', 'Diare (10%)', 'Lainnya (15%)'],
                    datasets: [{
                        data: [35, 25, 15, 10, 15],
                        backgroundColor: [
                            'rgba(37, 99, 235, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(156, 163, 175, 0.8)'
                        ],
                        borderColor: [
                            'rgba(37, 99, 235, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(245, 158, 11, 1)',
                            'rgba(239, 68, 68, 1)',
                            'rgba(156, 163, 175, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.raw + '%';
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</body>
</html>
