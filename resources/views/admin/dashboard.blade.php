@extends('layouts.app')

@section('content')
<div class="container py-5 px-3">
    <!-- Dashboard Stats -->
    <div class="row g-4 mb-4">
        <!-- Total Posko -->
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Posko</h6>
                        <h3 class="fw-bold mb-0">12</h3>
                    </div>
                    <div class="text-primary fs-2">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kebutuhan Aktif -->
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Kebutuhan Aktif</h6>
                        <h3 class="fw-bold mb-0">34</h3>
                    </div>
                    <div class="text-success fs-2">
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Relawan Terdaftar -->
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Relawan Terdaftar</h6>
                        <h3 class="fw-bold mb-0">58</h3>
                    </div>
                    <div class="text-warning fs-2">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="bg-white p-4 rounded-4 shadow-sm mt-5">
        <h5 class="fw-bold mb-4">Aktivitas Terbaru</h5>

        <div class="text-center py-5">
            <i class="fas fa-hourglass-half fa-3x text-secondary mb-3"></i>
            <h6 class="fw-bold text-secondary mb-2">Segera Hadir</h6>
            <p class="text-muted mb-0">Fitur aktivitas terbaru masih dalam pengembangan. Nantikan update selanjutnya!</p>
        </div>

        {{-- Jika nanti datanya ada, bisa pakai list seperti ini --}}
        {{-- 
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <span>Posko Kelurahan Padang Barat memperbarui data kebutuhan</span>
                <span class="text-muted small">10 menit lalu</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Penambahan posko baru di Koto Tangah</span>
                <span class="text-muted small">1 jam lalu</span>
            </li>
        </ul>
        --}}
    </div>
</div>

<style>
/* Tambahan style agar card & aktivitas lebih responsive & lega */
@media (max-width: 768px) {
    .container {
        padding-left: 12px;
        padding-right: 12px;
    }
    .row.g-4 > [class*='col-'] {
        margin-bottom: 1rem;
    }
}
</style>
@endsection
