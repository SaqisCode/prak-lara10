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
        <a href="{{ route('kamar.create') }}" class="btn btn-primary mb-3">Tambah Kamar</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama Kamar</th>
                <th>Lantai</th>
                <th>Kelas</th>
                <th>Jumlah TT</th>
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
                <td>{{ $kamar->jumlah_tt }}</td>
                <td>
                    <ul class="mb-0">
                    @foreach($kamar->tempatTidur as $tt)
                        <li>{{ $tt->kode_tt }} - 
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
                <tr><td colspan="7" class="text-center">Belum ada kamar</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection