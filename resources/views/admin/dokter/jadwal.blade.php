@extends('admin.layouts.app')

@section('title', 'Dokter')

@section('content')
    <div class="container mt-5">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dokter > Jadwal Dokter</h1>
        </div>

        <a href="{{ route('dokter.jadwal.create') }}" class="btn btn-primary mb-3 mt-3">Tambah Jadwal Dokter</a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
            @forelse ($jadwals as $jadwal)
                <div class="">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title fw-semibold mb-1">{{ $jadwal->dokter->name ?? '-' }}</h5>
                                <p class="card-subtitle text-muted">Spesialis {{ $jadwal->dokter->spesialis ?? '-' }}</p>
                            </div>
                            <div>
                                <a href="{{ route('dokter.jadwal.edit', $jadwal->id) }}"
                                   class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('dokter.jadwal.destroy', $jadwal->id) }}" method="POST"
                                      class="d-inline me-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')"><i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#jadwalDetail{{ $jadwal->id }}" aria-expanded="false"
                                        aria-controls="jadwalDetail{{ $jadwal->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="collapse" id="jadwalDetail{{ $jadwal->id }}">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm mb-0" style="font-size: 0.875rem; color: #374151;">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="fw-semibold py-2">Senin</th>
                                            <th class="fw-semibold py-2">Selasa</th>
                                            <th class="fw-semibold py-2">Rabu</th>
                                            <th class="fw-semibold py-2">Kamis</th>
                                            <th class="fw-semibold py-2">Jum'at</th>
                                            <th class="fw-semibold py-2">Sabtu</th>
                                            <th class="fw-semibold py-2">Minggu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td class="py-2">{{ $jadwal->senin ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->selasa ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->rabu ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->kamis ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->jumat ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->sabtu ?? '-' }}</td>
                                            <td class="py-2">{{ $jadwal->minggu ?? '-' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                 <div class="col-12">
                    <div class="alert alert-second text-center">Tidak ada Data</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
