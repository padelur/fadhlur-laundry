@extends('layouts.template')

@section('title', 'Buat Pesanan - Fadhlur Laundry')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Buat Pesanan Laundry</h1>
                <p class="lead mb-4">Isi form di bawah ini untuk memulai pesanan laundry Anda. Kami akan memproses pesanan Anda dengan cepat dan berkualitas.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Proses Cepat</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Harga Transparan</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Layanan Terpercaya</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="hero-icon">
                    <i class="fas fa-shopping-cart fa-8x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Order Form Section -->
<section class="order-form-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- Order Card -->
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="order-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                            <h2 class="fw-bold text-primary mb-2">Form Pemesanan</h2>
                            <p class="text-muted">Lengkapi informasi pesanan Anda</p>
                        </div>

                        {{-- Tampilkan error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Terjadi kesalahan:</strong>
                                </div>
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <!-- Service Information -->
                            <div class="service-info-card bg-light rounded-3 p-4 mb-4">
                                <h5 class="fw-bold text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Layanan
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Layanan</label>
                                            <input type="text" class="form-control bg-white" value="{{ $service->name }}" disabled>
                                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Harga per Kg</label>
                                            <input type="text" class="form-control bg-white" value="Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Details -->
                            <div class="row g-4">
                                <!-- Berat Cucian -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number"
                                               name="weight"
                                               class="form-control @error('weight') is-invalid @enderror"
                                               id="weight"
                                               placeholder="Berat Cucian"
                                               min="1"
                                               required>
                                        <label for="weight">
                                            <i class="fas fa-weight-hanging me-2"></i>Berat Cucian (Kg)
                                        </label>
                                        @error('weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <!-- Metode Pembayaran -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="method"
                                                class="form-select @error('method') is-invalid @enderror"
                                                id="payment-method"
                                                required>
                                            <option value="">Pilih metode pembayaran</option>
                                            <option value="cash">Cash</option>
                                            <option value="transfer">Transfer</option>
                                        </select>
                                        <label for="payment-method">
                                            <i class="fas fa-credit-card me-2"></i>Metode Pembayaran
                                        </label>
                                        @error('method')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Transfer Information -->
                            <div id="transfer-info" class="mt-4" style="display: none;">
                                <div class="alert alert-info border-0 shadow-sm">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-info-circle fa-lg me-3 mt-1"></i>
                                        <div>
                                            <h6 class="fw-bold mb-2">Informasi Transfer</h6>
                                            <p class="mb-3">Silakan transfer ke rekening berikut sebelum mengunggah bukti:</p>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="bank-info p-3 bg-white rounded border">
                                                        <h6 class="fw-bold text-primary mb-2">
                                                            <i class="fas fa-university me-2"></i>Bank BRI
                                                        </h6>
                                                        <p class="mb-1"><strong>No. Rekening:</strong></p>
                                                        <p class="mb-1 text-primary fw-bold">1234-5678-9999</p>
                                                        <p class="mb-0"><small>a.n. Fadhlur Laundry</small></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="bank-info p-3 bg-white rounded border">
                                                        <h6 class="fw-bold text-primary mb-2">
                                                            <i class="fas fa-university me-2"></i>Bank Mandiri
                                                        </h6>
                                                        <p class="mb-1"><strong>No. Rekening:</strong></p>
                                                        <p class="mb-1 text-primary fw-bold">9988-7766-5544</p>
                                                        <p class="mb-0"><small>a.n. Fadhlur Laundry</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload Bukti Transfer -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-upload me-2"></i>Upload Bukti Pembayaran
                                    </label>
                                    <input type="file"
                                           name="bukti_pembayaran"
                                           class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                           accept="image/*">
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Wajib diunggah jika memilih metode transfer
                                    </div>
                                    @error('bukti_pembayaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Pilihan Penjemputan -->
                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold mb-2">
                                        <i class="fas fa-hands-helping me-2"></i>Penjemputan Cucian
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pickup_method" id="pickup_sendiri" value="antar_sendiri" checked>
                                        <label class="form-check-label" for="pickup_sendiri">
                                            Antar sendiri ke laundry
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pickup_method" id="pickup_jemput" value="jemput">
                                        <label class="form-check-label" for="pickup_jemput">
                                            Dijemput ke alamat saya
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="pickup-address-section" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="pickup_address">
                                            <i class="fas fa-map-marker-alt me-2"></i>Alamat Penjemputan
                                        </label>
                                        <textarea name="pickup_address" id="pickup_address" class="form-control" rows="2" placeholder="Masukkan alamat penjemputan"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="pickup_phone">
                                            <i class="fas fa-phone me-2"></i>No. Telepon Penjemputan
                                        </label>
                                        <input type="text" name="pickup_phone" id="pickup_phone" class="form-control" placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>
                            </div>
                            <!-- Pilihan Pengambilan -->
                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold mb-2">
                                        <i class="fas fa-truck me-2"></i>Pengambilan Laundry Selesai
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="delivery_method" id="delivery_jemput_sendiri" value="jemput_sendiri" checked>
                                        <label class="form-check-label" for="delivery_jemput_sendiri">
                                            Jemput sendiri ke laundry
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="delivery_method" id="delivery_antar" value="antar">
                                        <label class="form-check-label" for="delivery_antar">
                                            Diantar ke alamat saya
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="delivery-address-section" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="delivery_address">
                                            <i class="fas fa-map-marker-alt me-2"></i>Alamat Pengantaran
                                        </label>
                                        <textarea name="delivery_address" id="delivery_address" class="form-control" rows="2" placeholder="Masukkan alamat pengantaran"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="delivery_phone">
                                            <i class="fas fa-phone me-2"></i>No. Telepon Pengantaran
                                        </label>
                                        <input type="text" name="delivery_phone" id="delivery_phone" class="form-control" placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                    <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="card border-0 bg-light mt-4">
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="info-item">
                                    <i class="fas fa-clock text-primary fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">Proses Cepat</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="info-item">
                                    <i class="fas fa-shield-alt text-success fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">Aman & Terpercaya</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="info-item">
                                    <i class="fas fa-headset text-info fa-lg mb-2"></i>
                                    <p class="small text-muted mb-0">24/7 Support</p>
                                </div>
                            </div>
                        </div>
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

.hero-icon {
    position: relative;
    z-index: 1;
}

.order-icon {
    transition: transform 0.3s ease;
}

.order-icon:hover {
    transform: scale(1.1);
}

.card {
    border-radius: 1rem;
    overflow: hidden;
}

.service-info-card {
    border-left: 4px solid var(--primary-color);
}

.form-floating > .form-control,
.form-floating > .form-select {
    border-radius: 0.75rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-floating > .form-control:focus,
.form-floating > .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-floating > label {
    color: #6c757d;
    font-weight: 500;
}

.btn {
    border-radius: 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.bank-info {
    transition: all 0.3s ease;
}

.bank-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.info-item {
    transition: transform 0.3s ease;
}

.info-item:hover {
    transform: translateY(-2px);
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
}

/* Animation for form elements */
.form-floating > .form-control:focus + label,
.form-floating > .form-control:not(:placeholder-shown) + label,
.form-floating > .form-select:focus + label,
.form-floating > .form-select:not([value=""]) + label {
    color: var(--primary-color);
    transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const metode = document.getElementById("payment-method");
    const infoTransfer = document.getElementById("transfer-info");
    const submitBtn = document.getElementById("submitBtn");

    function toggleTransferSection() {
        infoTransfer.style.display = (metode.value === "transfer") ? "block" : "none";
    }

    metode.addEventListener("change", toggleTransferSection);
    toggleTransferSection();

    // Form validation
    const form = document.querySelector('.needs-validation');

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');

        // Show loading state
        if (form.checkValidity()) {
            submitBtn.innerHTML = '<span class="loading"></span> Memproses...';
            submitBtn.disabled = true;
        }
    });

    // Auto-hide validation messages after 5 seconds
    setTimeout(() => {
        const invalidFeedbacks = document.querySelectorAll('.invalid-feedback');
        invalidFeedbacks.forEach(feedback => {
            if (feedback.style.display !== 'none') {
                feedback.style.opacity = '0';
                setTimeout(() => {
                    feedback.style.display = 'none';
                }, 500);
            }
        });
    }, 5000);
});
</script>

<script>
    // Tampilkan input alamat penjemputan jika pilih jemput
    document.querySelectorAll('input[name="pickup_method"]').forEach(function(el) {
        el.addEventListener('change', function() {
            document.getElementById('pickup-address-section').style.display = (this.value === 'jemput') ? 'block' : 'none';
        });
    });
    // Tampilkan input alamat pengantaran jika pilih antar
    document.querySelectorAll('input[name="delivery_method"]').forEach(function(el) {
        el.addEventListener('change', function() {
            document.getElementById('delivery-address-section').style.display = (this.value === 'antar') ? 'block' : 'none';
        });
    });
    // Inisialisasi tampilan saat load
    window.addEventListener('DOMContentLoaded', function() {
        if(document.querySelector('input[name="pickup_method"]:checked').value === 'jemput') {
            document.getElementById('pickup-address-section').style.display = 'block';
        }
        if(document.querySelector('input[name="delivery_method"]:checked').value === 'antar') {
            document.getElementById('delivery-address-section').style.display = 'block';
        }
    });
</script>
@endpush
