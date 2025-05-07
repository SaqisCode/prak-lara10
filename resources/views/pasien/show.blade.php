<!DOCTYPE html>
<html>
<head>
    <title>Detail Pasien</title>
    <!-- Add CSS/JS directly -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Detail Data Pasien</h2>
        <p><strong>Nama Lengkap:</strong> {{ $pasien->name }}</p>
        <p><strong>Email:</strong> {{ $pasien->email }}</p>
        <p><strong>NIK:</strong> {{ $pasien->nik }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</p>
        <p><strong>Password:</strong> {{ $pasien->password }}</p>

        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</body>
</html>
