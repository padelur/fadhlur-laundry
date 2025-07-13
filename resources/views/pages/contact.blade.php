@extends('layouts.template')

@section('title', 'Kontak Kami - Fadhlur Laundry')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Hubungi Kami</h1>
                <p class="lead mb-4">Kami siap membantu Anda dengan pertanyaan, saran, atau pesanan layanan laundry. Jangan ragu untuk menghubungi kami.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock text-warning me-2"></i>
                        <span>24/7 Support</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone text-success me-2"></i>
                        <span>Respon Cepat</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-comments text-info me-2"></i>
                        <span>Friendly Service</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="hero-image">
                    <i class="fas fa-phone-alt fa-8x text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-primary mb-3">Informasi Kontak</h2>
                <p class="lead text-muted">Berbagai cara untuk menghubungi kami</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Telepon</h5>
                        <p class="text-muted mb-2">Hubungi kami melalui telepon</p>
                        <a href="tel:+6281234567890" class="text-primary text-decoration-none fw-bold">+62 812-3456-7890</a>
                        <p class="text-muted small mt-2">Senin - Minggu: 08:00 - 20:00</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">WhatsApp</h5>
                        <p class="text-muted mb-2">Kirim pesan melalui WhatsApp</p>
                        <a href="https://wa.me/6281234567890" class="text-success text-decoration-none fw-bold">+62 812-3456-7890</a>
                        <p class="text-muted small mt-2">Respon dalam 1-2 jam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">Email</h5>
                        <p class="text-muted mb-2">Kirim email kepada kami</p>
                        <a href="mailto:info@fadhlurlaundry.com" class="text-info text-decoration-none fw-bold">info@fadhlurlaundry.com</a>
                        <p class="text-muted small mt-2">Respon dalam 24 jam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold text-primary mb-4">Lokasi Kami</h2>
                <p class="lead text-muted mb-4">Kunjungi outlet kami untuk layanan langsung atau konsultasi.</p>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        Alamat
                    </h5>
                    <p class="text-muted">Jl. Anggrek 2<br>Dadok Tunggul Hitam, Padang<br>Sumatera Barat 25586</p>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-clock text-primary me-2"></i>
                        Jam Operasional
                    </h5>
                    <p class="text-muted">Senin - Jumat: 08:00 - 20:00<br>Sabtu - Minggu: 09:00 - 18:00</p>
                </div>
                <div>
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Informasi
                    </h5>
                    <p class="text-muted">Layanan antar jemput tersedia untuk area tertentu. Hubungi kami untuk informasi lebih lanjut.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="bg-light rounded p-4 text-center">
                            <i class="fas fa-map-marked-alt fa-4x text-primary mb-3"></i>
                            <h5 class="fw-bold">Peta Lokasi</h5>
                            <p class="text-muted">Klik untuk melihat peta lokasi kami</p>
                            <a href="https://www.google.com/maps/place/Jl.+Anggrek,+Dadok+Tunggul+Hitam,+Kec.+Koto+Tangah,+Kota+Padang,+Sumatera+Barat+25586/@-0.8717041,100.3635058,755m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2fd4c7477a3bc9c3:0xd17d49714b1184e2!8m2!3d-0.8717095!4d100.3660807!16s%2Fg%2F11bxfsdg0f?entry=ttu&g_ep=EgoyMDI1MDcwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="btn btn-primary">
                                <i class="fas fa-map me-2"></i>Lihat di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- FAQ Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-primary mb-3">Pertanyaan Umum</h2>
                <p class="lead text-muted">Pertanyaan yang sering diajukan pelanggan</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <i class="fas fa-question-circle text-primary me-2"></i>
                                Berapa lama waktu proses laundry?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Waktu proses tergantung pada jenis layanan yang dipilih. Layanan reguler membutuhkan waktu 2-3 hari, sedangkan layanan express selesai dalam 24 jam.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <i class="fas fa-question-circle text-primary me-2"></i>
                                Apakah ada layanan antar jemput?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami menyediakan layanan antar jemput gratis untuk area tertentu. Hubungi kami untuk informasi area yang dilayani.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <i class="fas fa-question-circle text-primary me-2"></i>
                                Bagaimana cara memesan layanan?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat memesan melalui website kami, aplikasi, atau menghubungi kami langsung melalui telepon atau WhatsApp.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                <i class="fas fa-question-circle text-primary me-2"></i>
                                Metode pembayaran apa yang tersedia?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kami menerima pembayaran tunai, transfer bank, dan e-wallet seperti OVO, DANA, dan GoPay.
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

.form-control, .form-select {
    border-radius: 0.75rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-label {
    color: #495057;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.form-label i {
    color: var(--primary-color);
    margin-right: 0.5rem;
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

.accordion-button {
    border-radius: 0.75rem !important;
    font-weight: 600;
}

.accordion-button:not(.collapsed) {
    background-color: var(--primary-color);
    color: white;
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
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
