@extends('admin.layouts.app')

@section('title', 'Rawat Inap')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kamar Rawat Inap</h1>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <div class="relative">
                <input type="text" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm" placeholder="Cari kamar...">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <span class="me-2 text-muted">Total Tempat Tidur:</span>
            <span class="badge rounded-pill bg-secondary">{{ $totalTempatTidur }}</span>
        </div>
    </div>

        <a href="{{ route('kamar.create') }}" class="btn btn-primary mb-2">Tambah Kamar</a>


        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
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
                <th>Nama Kamar</th>
                <th>Lantai</th>
                <th>Kelas</th>
                <th>Tempat Tidur</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($kamars as $index => $kamar)
                <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kamar->nama_kamar }}</td>
                <td>{{ $kamar->lantai }}</td>
                <td>{{ $kamar->kelas }}</td>
                <td>
                    <ul class="mb-0">
                    @foreach($kamar->tempatTidur as $tt)
                        <li>{{ $tt->kode_tt }}
                        <span class="badge bg-{{ $tt->status == 'kosong' ? 'success' : ($tt->status == 'terisi' ? 'danger' : 'warning') }}">
                            {{ ucfirst($tt->status) }}
                        </span>
                        </li>
                    @endforeach
                    </ul>
                </td>
                <td>
                    @foreach($kamar->tempatTidur as $tt)
                        <li>
                            <form action="{{ route('tt.updateStatus', $tt->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline w-auto">
                                <option {{ $tt->status == 'kosong' ? 'selected' : '' }}>kosong</option>
                                <option {{ $tt->status == 'terisi' ? 'selected' : '' }}>terisi</option>
                                <option {{ $tt->status == 'sterilisasi' ? 'selected' : '' }}>sterilisasi</option>
                            </select>
                            </form>
                        </li>
                    @endforeach
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada Data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
