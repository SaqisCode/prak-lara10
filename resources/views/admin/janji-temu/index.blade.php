@extends('admin.layouts.app')

@section('title', 'Janji Temu')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Janji Temu</h1>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <div class="relative">
                <input type="text" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm" placeholder="Cari janji temu...">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <span class="me-2 text-muted">Total Janji Temu:</span>
            <span class="badge rounded-pill bg-secondary">{{ count($janjitemu) }}</span>
        </div>
    </div>
    <div class="table-container">
        <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Spesialis</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($janjiTemus as $index => $janji)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $janji->pasien->name }}</td>
                            <td>{{ $janji->dokter->name }}</td>
                            <td>{{ $janji->dokter->spesialis }}</td>
                            <td>{{ $janji->hari }}</td>
                            <td>{{ $janji->waktu }}</td>
                            <td>{{ $janji->keluhan ?? '-' }}</td>
                            <td>{{ $janji->status }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection
