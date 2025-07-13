@extends('layouts.template')

@section('title', 'Tentang Kami - Fadhlur Laundry')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Tentang Fadhlur Laundry</h1>
                <p class="lead mb-4">Kami adalah penyedia layanan laundry premium yang berkomitmen memberikan kualitas terbaik dengan teknologi modern dan pelayanan yang memuaskan.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Berpengalaman</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Terpercaya</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Berkualitas</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="hero-image">
                    <i class="fas fa-building fa-8x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Story Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold text-primary mb-4">Cerita Kami</h2>
                <p class="lead text-muted mb-4">Fadhlur Laundry didirikan dengan visi untuk memberikan layanan laundry berkualitas tinggi dengan harga yang terjangkau.</p>
                <p class="text-muted mb-4">Sejak awal berdirinya, kami telah berkomitmen untuk menggunakan teknologi modern dan detergen berkualitas tinggi untuk memastikan setiap pakaian yang kami proses mendapatkan perawatan terbaik.</p>
                <p class="text-muted">Dengan tim yang berpengalaman dan dedikasi tinggi, kami terus berinovasi untuk memberikan pengalaman terbaik bagi pelanggan kami.</p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-6 mb-4">
                                <div class="bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">1000+</h4>
                                <p class="text-muted mb-0">Pelanggan Puas</p>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-tshirt fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">5000+</h4>
                                <p class="text-muted mb-0">Pesanan Selesai</p>
                            </div>
                            <div class="col-6">
                                <div class="bg-info bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-calendar-alt fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">3+</h4>
                                <p class="text-muted mb-0">Tahun Berpengalaman</p>
                            </div>
                            <div class="col-6">
                                <div class="bg-warning bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-star fa-2x"></i>
                                </div>
                                <h4 class="fw-bold">4.8</h4>
                                <p class="text-muted mb-0">Rating Pelanggan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-primary mb-3">Visi & Misi</h2>
                <p class="lead text-muted">Menjadi penyedia layanan laundry terpercaya dan berkualitas</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-eye fa-2x"></i>
                            </div>
                            <h4 class="fw-bold">Visi</h4>
                        </div>
                        <p class="text-muted">Menjadi penyedia layanan laundry terdepan yang dikenal dengan kualitas premium, teknologi modern, dan pelayanan yang memuaskan pelanggan.</p>
                        <ul class="text-muted">
                            <li>Menggunakan teknologi terbaru dalam proses laundry</li>
                            <li>Memberikan layanan yang ramah dan profesional</li>
                            <li>Menjaga kualitas dan konsistensi layanan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-bullseye fa-2x"></i>
                            </div>
                            <h4 class="fw-bold">Misi</h4>
                        </div>
                        <p class="text-muted">Memberikan layanan laundry berkualitas tinggi dengan harga terjangkau, mengutamakan kepuasan pelanggan dan menjaga lingkungan.</p>
                        <ul class="text-muted">
                            <li>Menggunakan detergen ramah lingkungan</li>
                            <li>Memberikan layanan antar jemput yang nyaman</li>
                            <li>Memastikan setiap pesanan selesai tepat waktu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-primary mb-3">Nilai-Nilai Kami</h2>
                <p class="lead text-muted">Prinsip yang kami pegang dalam memberikan layanan</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-heart fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Peduli</h5>
                        <p class="text-muted">Kami peduli terhadap setiap detail pakaian pelanggan dan memberikan perhatian khusus pada setiap pesanan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Terpercaya</h5>
                        <p class="text-muted">Kami berkomitmen untuk memberikan layanan yang konsisten dan dapat dipercaya oleh pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Inovatif</h5>
                        <p class="text-muted">Kami terus berinovasi dalam teknologi dan layanan untuk memberikan pengalaman terbaik.</p>
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

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
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
