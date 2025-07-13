@extends('layouts.template')

@section('title', 'Layanan Laundry - Fadhlur Laundry')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5 mb-5">
<div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Layanan Laundry Berkualitas</h1>
                <p class="lead mb-4">Kami menyediakan berbagai layanan laundry dengan teknologi modern untuk memastikan pakaian Anda kembali bersih, wangi, dan rapi.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Teknologi Modern</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Harga Terjangkau</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Layanan Cepat</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="hero-icon">
                    <i class="fas fa-tshirt fa-8x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Pilihan Layanan Kami</h2>
                <p class="lead text-muted">Berbagai pilihan layanan laundry sesuai kebutuhan Anda</p>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card border-0 shadow-lg h-100">
                                                <div class="card-body p-4">
                            <!-- Service Content -->
                            <div class="text-center">
                                <h4 class="card-title fw-bold mb-3">{{ $service->name }}</h4>
                                <p class="card-text text-muted mb-4">{{ $service->description ?? 'Layanan laundry berkualitas dengan hasil maksimal' }}</p>

                                <!-- Price Badge -->
                                <div class="price-badge mb-4">
                                    <span class="badge bg-primary fs-6 px-3 py-2">
                                        <i class="fas fa-tag me-2"></i>
                                        Rp {{ number_format($service->price_per_kg, 0, ',', '.') }} /kg
                                    </span>
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('orders.create', ['service' => $service->id]) }}" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-tshirt fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted mb-3">Belum ada layanan tersedia</h4>
                            <p class="text-muted">Layanan akan segera hadir. Silakan cek kembali nanti.</p>
                        </div>
                    </div>
            </div>
        @endforelse
    </div>
</div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Mengapa Memilih Kami?</h2>
                <p class="lead text-muted">Kami berkomitmen memberikan layanan terbaik untuk kepuasan pelanggan</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Layanan Cepat</h5>
                    <p class="text-muted small">Proses cuci cepat dengan teknologi modern, selesai dalam 24-48 jam</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Kualitas Premium</h5>
                    <p class="text-muted small">Menggunakan detergen berkualitas tinggi dan mesin modern</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon bg-info bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-truck fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Antar Jemput</h5>
                    <p class="text-muted small">Layanan antar jemput gratis untuk area tertentu</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon bg-warning bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-2">24/7 Support</h5>
                    <p class="text-muted small">Customer service siap membantu Anda kapan saja</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works-section py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary mb-3">Cara Kerja Kami</h2>
                <p class="lead text-muted">Proses sederhana untuk hasil maksimal</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="step-card text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        1
                    </div>
                    <h5 class="fw-bold mb-2">Pesan Layanan</h5>
                    <p class="text-muted small">Pilih layanan yang diinginkan melalui website kami</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        2
                    </div>
                    <h5 class="fw-bold mb-2">Antar Jemput</h5>
                    <p class="text-muted small">Tim kami akan menjemput pakaian Anda</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        3
                    </div>
                    <h5 class="fw-bold mb-2">Proses Cuci</h5>
                    <p class="text-muted small">Pakaian diproses dengan teknologi modern</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card text-center">
                    <div class="step-number bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px; font-weight: bold;">
                        4
                    </div>
                    <h5 class="fw-bold mb-2">Siap Antar</h5>
                    <p class="text-muted small">Pakaian bersih diantar kembali ke lokasi Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
<style>
/* Hero Section */
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

.hero-icon {
    position: relative;
    z-index: 1;
}

/* Service Cards */
.service-card {
    transition: all 0.3s ease;
    border-radius: 1rem;
    overflow: hidden;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.price-badge .badge {
    border-radius: 2rem;
    font-weight: 600;
}

/* Feature Cards */
.feature-card {
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    transition: transform 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
}

/* Step Cards */
.step-card {
    transition: transform 0.3s ease;
}

.step-card:hover {
    transform: translateY(-5px);
}

.step-number {
    transition: transform 0.3s ease;
}

.step-card:hover .step-number {
    transform: scale(1.1);
}

/* Empty State */
.empty-state {
    padding: 3rem 0;
}

.empty-state i {
    opacity: 0.5;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        text-align: center;
    }

    .hero-section .row {
        flex-direction: column-reverse;
    }

    .hero-icon {
        margin-bottom: 2rem;
    }

    .service-card {
        margin-bottom: 2rem;
    }
}

/* Animation for cards */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.service-card {
    animation: fadeInUp 0.6s ease-out;
}

.service-card:nth-child(1) { animation-delay: 0.1s; }
.service-card:nth-child(2) { animation-delay: 0.2s; }
.service-card:nth-child(3) { animation-delay: 0.3s; }
.service-card:nth-child(4) { animation-delay: 0.4s; }
.service-card:nth-child(5) { animation-delay: 0.5s; }
.service-card:nth-child(6) { animation-delay: 0.6s; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards and feature elements
    document.querySelectorAll('.service-card, .feature-card, .step-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush
