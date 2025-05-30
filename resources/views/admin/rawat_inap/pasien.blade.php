@extends('admin.layouts.app')

@section('title', 'Rawat Inap')

@section('content')
    <div class="container mt-5">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Rawat Inap > Pasien</h1>
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
                        <td>
                            <strong>{{ $rawat->pasien->name }}</strong>
                        </td>
                        <td>{{ $rawat->tempatTidur->kamar->nama_kamar }}</td>
                        <td>{{ $rawat->tempatTidur->kode_tt }}</td>
                        <td>{{ \Carbon\Carbon::parse($rawat->tanggal_masuk)->format('d-m-Y') }}</td>
                        <td>
                            @foreach($rawatInaps as $rawatInap)
                                <a href="{{ route('rawatInap.show', $rawatInap->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            @endforeach
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
