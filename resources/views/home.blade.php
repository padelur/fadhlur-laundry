@extends('layouts.template')

@section('title', 'Beranda - Fadhlur Laundry')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Laundry Berkualitas, Harga Terjangkau</h1>
                <p class="lead mb-4">Kami menyediakan layanan laundry premium dengan teknologi modern untuk hasil yang maksimal. Cucian Anda akan kembali bersih, wangi, dan rapi dalam waktu singkat.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('services.index') }}" class="btn btn-light btn-lg px-4">
                        <i class="fas fa-tshirt me-2"></i>Lihat Layanan
                    </a>
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                    @endguest
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image">
                    <i class="fas fa-tshirt fa-10x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Mengapa Memilih Kami?</h2>
                <p class="lead text-muted">Kami berkomitmen memberikan layanan terbaik untuk kepuasan pelanggan</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Layanan Cepat</h4>
                        <p class="card-text text-muted">Proses cuci cepat dengan teknologi modern, selesai dalam 24-48 jam tergantung layanan yang dipilih.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Kualitas Premium</h4>
                        <p class="card-text text-muted">Menggunakan detergen berkualitas tinggi dan mesin modern untuk hasil yang maksimal.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-info bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-truck fa-2x"></i>
                        </div>
                        <h4 class="card-title fw-bold">Antar Jemput</h4>
                        <p class="card-text text-muted">Layanan antar jemput gratis untuk area tertentu, memudahkan Anda tanpa perlu keluar rumah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Layanan Kami</h2>
                <p class="lead text-muted">Berbagai pilihan layanan laundry sesuai kebutuhan Anda</p>
            </div>
        </div>
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-tshirt fa-lg"></i>
                            </div>
                            <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                            <p class="card-text text-muted small">{{ $service->description ?? 'Layanan laundry berkualitas dengan hasil maksimal' }}</p>
                            <span class="badge bg-primary">Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}/kg</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada layanan tersedia</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg">
                Lihat Semua Layanan <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Cara Kerja Kami</h2>
                <p class="lead text-muted">Proses sederhana untuk hasil maksimal</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        1
                    </div>
                    <h5 class="fw-bold">Pesan Layanan</h5>
                    <p class="text-muted">Pilih layanan yang diinginkan melalui website atau aplikasi kami</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        2
                    </div>
                    <h5 class="fw-bold">Antar Jemput</h5>
                    <p class="text-muted">Tim kami akan menjemput pakaian Anda di lokasi yang ditentukan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        3
                    </div>
                    <h5 class="fw-bold">Proses Cuci</h5>
                    <p class="text-muted">Pakaian diproses dengan teknologi modern dan detergen berkualitas</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        4
                    </div>
                    <h5 class="fw-bold">Siap Antar</h5>
                    <p class="text-muted">Pakaian bersih dan rapi akan diantar kembali ke lokasi Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Siap Mencoba Layanan Kami?</h2>
                <p class="lead mb-0">Daftar sekarang dan nikmati layanan laundry berkualitas dengan harga terjangkau!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                @guest
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">
                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                </a>
                @else
                <a href="{{ route('services.index') }}" class="btn btn-light btn-lg px-4">
                    <i class="fas fa-tshirt me-2"></i>Pesan Sekarang
                </a>
                @endguest
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Hubungi Kami</h6>
                        <p class="text-muted mb-0">+62 812-3456-7890</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Jam Operasional</h6>
                        <p class="text-muted mb-0">Senin - Minggu: 08:00 - 20:00</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center">
                    <div class="bg-info bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Lokasi</h6>
                        <p class="text-muted mb-0">Jl. Anggrek 2, Dadok Tunggul Hitam, Padang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<style>
.hero-section {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.hero-image {
    position: relative;
    z-index: 1;
}

.feature-icon, .service-icon, .step-number {
    transition: transform 0.3s ease;
}

.card:hover .feature-icon,
.card:hover .service-icon {
    transform: scale(1.1);
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.step-number {
    transition: transform 0.3s ease;
}

.step-number:hover {
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .hero-section {
        text-align: center;
    }

    .hero-section .row {
        flex-direction: column-reverse;
    }

    .hero-image {
        margin-bottom: 2rem;
    }
}
</style>
@endpush
