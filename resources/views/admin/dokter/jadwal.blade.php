@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Jadwal Dokter</h1>
            <div class="flex space-x-3 mt-4 md:mt-0 mb-2">
                <div class="relative">
                    <input type="text" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm" placeholder="Cari dokter...">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </span>
                </div>
            </div>
        </div>

        <a href="{{ route('dokter.jadwal.create') }}" class="btn btn-primary mb-2">Tambah Jadwal Dokter</a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
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
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $index => $jadwal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jadwal->dokter->name ?? '-' }}
                                <div class="text-sm text-gray-500">0821-3345-6789</div>
                            </td>
                            <td>{{ $jadwal->dokter->spesialis ?? '-' }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->jam_mulai }}</td>
                            <td>{{ $jadwal->jam_selesai }}</td>
                            <td>
                                <a href="{{ route('dokter.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('dokter.jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada jadwal dokter.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <br>
  <style>
    .doctor-image-wrapper {
      position: relative;
      width: 100%;
      height: 100%;
      margin-left: -1.5rem;
      margin-top: -1.5rem;
      flex-shrink: 0;
    }
    .doctor-image-wrapper img.bg-shape {
      position: absolute;
      width: 112px;
      height: 112px;
      object-fit: contain;
      z-index: -1;
    }
    .doctor-image-wrapper img.bg-shape.top-left {
      top: 0;
      left: 0;
    }
    .doctor-image-wrapper img.bg-shape.bottom-left {
      bottom: 0;
      left: 0;
    }
    .doctor-image-wrapper img.main-img {
      position: relative;
      width: 112px;
      height: 112px;
      object-fit: contain;
      z-index: 1;
    }
    .table-fixed-layout {
      table-layout: fixed;
      width: 100%;
    }
    .table-fixed-layout th, .table-fixed-layout td {
      width: 14.2857%;
      vertical-align: top;
      border-right: 1px solid #e5e7eb;
    }
    .table-fixed-layout th:last-child,
    .table-fixed-layout td:last-child {
      border-right: none;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <div class="container">
    <table class="table mb-0 border-bottom ">
      <tbody>
        <tr>
          <td class="align-top p-0" style="width: 112px; position: relative;">
            <div class="doctor-image-wrapper m-0">
              <img src="https://storage.googleapis.com/a1aa/image/22ca0b35-6e9a-443b-8f08-2cec9129f64a.jpg" alt="Doctor" class="main-img" />
            </div>
          </td>
          <td class="align-top p-3">
            <h2 class="fw-semibold mb-1" style="font-size: 1rem; color: #374151;">dr. Agung Supriyanto, Sp. OG</h2>
            <p class="mb-0" style="font-size: 0.875rem; color: #4b5563;">Klinik Spesialis Kebidanan &amp; Kandungan</p>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="table-responsive">
      <table class="table table-fixed-layout text-start text-secondary mb-0" style="font-size: 0.875rem; color: #374151;">
        <thead>
          <tr>
            <th class="fw-semibold py-3 px-3">Senin</th>
            <th class="fw-semibold py-3 px-3">Selasa</th>
            <th class="fw-semibold py-3 px-3">Rabu</th>
            <th class="fw-semibold py-3 px-3">Kamis</th>
            <th class="fw-semibold py-3 px-3">Jum'at</th>
            <th class="fw-semibold py-3 px-3">Sabtu</th>
            <th class="fw-semibold py-3 px-3">Minggu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="py-3 px-3">-</td>
            <td class="py-3 px-3">
              09:00 - 00:00<br />(Tersedia)
            </td>
            <td class="py-3 px-3">-</td>
            <td class="py-3 px-3">09:00 - 00:00</td>
            <td class="py-3 px-3">-</td>
            <td class="py-3 px-3">09:00 - 00:00</td>
            <td class="py-3 px-3">-</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
