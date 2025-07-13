@extends('layouts.template')

@section('title', 'Detail Pesanan - Fadhlur Laundry')

@section('content')
<div class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- Order Detail Card -->
                <div class="card border-0 shadow-lg order-detail-card">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="login-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-file-alt fa-2x"></i>
                            </div>
                            <h2 class="fw-bold text-primary mb-2">Detail Pesanan</h2>
                            <p class="text-muted">ID: #{{ $order->id }}</p>
                        </div>

                        <!-- Order Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-section mb-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Pesanan
                                    </h5>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-tag me-2"></i>Layanan
                                        </div>
                                        <div class="info-value">{{ $order->service->name }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-weight-hanging me-2"></i>Berat
                                        </div>
                                        <div class="info-value">{{ $order->weight }} kg</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-money-bill-wave me-2"></i>Total Harga
                                        </div>
                                        <div class="info-value text-success fw-bold">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-clipboard-list me-2"></i>Status Pesanan
                                        </div>
                                        <div class="info-value">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'processing' => 'info',
                                                    'completed' => 'success',
                                                    'cancelled' => 'danger'
                                                ];
                                                $statusColor = $statusColors[$order->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $statusColor }} fw-semibold">
                                                <i class="fas fa-circle me-1"></i>{{ ucfirst($order->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-truck me-2"></i>Metode Pengiriman
                                        </div>
                                        <div class="info-value">{{ ucfirst($order->delivery_method) }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-calendar-alt me-2"></i>Dibuat pada
                                        </div>
                                        <div class="info-value">{{ $order->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>

                            @if ($order->payment)
                            <div class="col-md-6">
                                <div class="info-section mb-4">
                                    <h5 class="fw-bold text-primary mb-3">
                                        <i class="fas fa-credit-card me-2"></i>Informasi Pembayaran
                                    </h5>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-credit-card me-2"></i>Metode Pembayaran
                                        </div>
                                        <div class="info-value">{{ ucfirst($order->payment->method) }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-check-circle me-2"></i>Status Pembayaran
                                        </div>
                                        <div class="info-value">
                                            @php
                                                $paymentColors = [
                                                    'pending' => 'warning',
                                                    'paid' => 'success',
                                                    'failed' => 'danger'
                                                ];
                                                $paymentColor = $paymentColors[$order->payment->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $paymentColor }} fw-semibold">
                                                <i class="fas fa-credit-card me-1"></i>{{ ucfirst($order->payment->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-money-bill-wave me-2"></i>Jumlah Dibayar
                                        </div>
                                        <div class="info-value text-success fw-bold">
                                            Rp {{ number_format($order->payment->amount_paid, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-calendar-check me-2"></i>Tanggal Pembayaran
                                        </div>
                                        <div class="info-value">
                                            {{ $order->payment->paid_at ? \Carbon\Carbon::parse($order->payment->paid_at)->format('d/m/Y H:i') : '-' }}
                                        </div>
                                    </div>

                                    @if ($order->payment->bukti_pembayaran)
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-image me-2"></i>Bukti Pembayaran
                                        </div>
                                        <div class="info-value">
                                            <div class="payment-proof">
                                                <img src="{{ asset('storage/' . $order->payment->bukti_pembayaran) }}"
                                                     alt="Bukti Pembayaran"
                                                     class="img-fluid rounded shadow-sm payment-proof-img">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Back Button -->
                        <div class="text-center mt-4 pt-3 border-top">
                            <a href="{{ route('orders.history') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Riwayat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<style>
.login-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: calc(100vh - 200px);
    position: relative;
    overflow: hidden;
}

.login-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%230d6efd" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    opacity: 0.3;
}

.card {
    border-radius: 1rem;
    overflow: hidden;
    position: relative;
    z-index: 1;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
}

.login-icon {
    transition: transform 0.3s ease;
}

.login-icon:hover {
    transform: scale(1.1);
}

.info-section {
    background: rgba(248, 249, 250, 0.5);
    border-radius: 1rem;
    padding: 1.5rem;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.info-item:last-child {
    border-bottom: none;
}

.info-item:hover {
    background: rgba(255, 255, 255, 0.7);
    border-radius: 0.5rem;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}

.info-label {
    font-weight: 600;
    color: #495057;
    display: flex;
    align-items: center;
}

.info-label i {
    color: var(--primary-color);
    width: 20px;
}

.info-value {
    text-align: right;
    font-weight: 500;
}

.badge {
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    border-radius: 20px;
}

.btn-outline-primary {
    border-radius: 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.payment-proof {
    margin-top: 0.5rem;
}

.payment-proof-img {
    max-height: 200px;
    border-radius: 0.5rem;
    transition: transform 0.3s ease;
}

.payment-proof-img:hover {
    transform: scale(1.05);
}

/* Card shadow animation */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}

/* GSAP Animation Classes */
.fade-in-up {
    opacity: 0;
    transform: translateY(30px);
}

.fade-in-left {
    opacity: 0;
    transform: translateX(-30px);
}

.fade-in-right {
    opacity: 0;
    transform: translateX(30px);
}

.scale-in {
    opacity: 0;
    transform: scale(0.8);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .info-value {
        text-align: left;
    }
}
</style>

<script>
// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    // Initial animation for the card
    gsap.fromTo('.order-detail-card',
        {
            opacity: 0,
            y: 50,
            scale: 0.95
        },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.8,
            ease: "power2.out"
        }
    );

    // Animate the header icon
    gsap.fromTo('.login-icon',
        {
            opacity: 0,
            scale: 0,
            rotation: -180
        },
        {
            opacity: 1,
            scale: 1,
            rotation: 0,
            duration: 1,
            delay: 0.3,
            ease: "back.out(1.7)"
        }
    );

    // Animate info sections
    gsap.fromTo('.info-section',
        {
            opacity: 0,
            x: -50,
            scale: 0.9
        },
        {
            opacity: 1,
            x: 0,
            scale: 1,
            duration: 0.6,
            delay: 0.5,
            stagger: 0.2,
            ease: "power2.out"
        }
    );

    // Animate info items with stagger
    gsap.fromTo('.info-item',
        {
            opacity: 0,
            y: 20
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.4,
            delay: 0.8,
            stagger: 0.1,
            ease: "power2.out"
        }
    );

    // Animate the back button
    gsap.fromTo('.btn-outline-primary',
        {
            opacity: 0,
            y: 30
        },
        {
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: 1.2,
            ease: "power2.out"
        }
    );

    // Hover animations for info items
    const infoItems = document.querySelectorAll('.info-item');
    infoItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.02,
                duration: 0.3,
                ease: "power2.out"
            });
        });

        item.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });

    // Payment proof image animation
    const paymentProofImg = document.querySelector('.payment-proof-img');
    if (paymentProofImg) {
        gsap.fromTo(paymentProofImg,
            {
                opacity: 0,
                scale: 0.8
            },
            {
                opacity: 1,
                scale: 1,
                duration: 0.8,
                delay: 1.4,
                ease: "power2.out"
            }
        );
    }

    // Scroll-triggered animations
    ScrollTrigger.batch('.info-item', {
        onEnter: (elements) => {
            gsap.to(elements, {
                opacity: 1,
                y: 0,
                stagger: 0.1,
                duration: 0.5,
                ease: "power2.out"
            });
        },
        start: "top 90%"
    });
});
</script>
@endpush
@endsection
