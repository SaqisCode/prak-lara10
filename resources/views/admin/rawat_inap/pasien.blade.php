@extends('admin.layouts.app')

@section('title', 'Rawat Inap')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Pasien Rawat Inap</h1>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <div class="relative">
                <input type="text" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm" placeholder="Cari pasien...">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <span class="me-2 text-muted">Total Pasien Rawat Inap:</span>
            <span class="badge rounded-pill bg-secondary">{{ count($rawatInaps) }}</span>
        </div>
    </div>

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
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Kamar</th>
                <th>Tempat Tidur</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse($rawatInaps as $rawat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rawat->pasien->name }}
                            <div class="text-sm text-gray-500">0821-3345-6789</div>
                        </td>
                        <td>{{ $rawat->tempatTidur->kamar->nama_kamar }}</td>
                        <td>{{ $rawat->tempatTidur->kode_tt }}</td>
                        <td>{{ \Carbon\Carbon::parse($rawat->tanggal_masuk)->format('d-m-Y') }}</td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <form action="{{ route('rawatInap.destroy', $rawat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin memulangkan pasien?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-box-arrow-in-left"></i> Pulangkan</button>
                            </form>
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
</div>
@endsection
