@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Puskesmas Djatiroto</h1>
        <div class="flex items-center space-x-2 mt-4 md:mt-0">
            <span class="text-sm text-gray-600">Hari ini:</span>
            <span class="text-sm font-medium bg-blue-100 text-blue-800 px-3 py-1 rounded-full">{{ now()->format('d F Y') }}</span>
        </div>
    </div>
    <div class="row">
        <!-- Patients Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-light">Total Pasien</h6>
                            <h3 class="mb-0">{{ count($pasiens) }}</h3>
                        </div>
                        <i class="fas fa-procedures fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Doctors Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-light">Total Dokter</h6>
                            <h3 class="mb-0">{{ count($dokters) }}</h3>
                        </div>
                        <i class="fas fa-user-md fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Appointments Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-light">Pasien Rawat Inap</h6>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="fas fa-procedures fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-light">Janji Temu</h6>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="fas fa-calendar-check fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="{{ asset('assets/js/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/chart-bar-demo.js') }}"></script>
@endpush
