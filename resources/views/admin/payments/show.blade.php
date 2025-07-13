@extends('layouts.admin')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Detail Pembayaran</h4>
                <p class="text-muted mb-0">Informasi lengkap pembayaran #{{ $payment->id }}</p>
            </div>
            <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="row">
    <!-- Informasi Pembayaran -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">ID Pembayaran</label>
                            <p class="mb-0 fw-bold">#{{ $payment->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Metode Pembayaran</label>
                            <p class="mb-0">
                                <span class="badge bg-info">{{ ucfirst($payment->method) }}</span>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status Pembayaran</label>
                            <div>
                                @if ($payment->status === 'paid')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i>Lunas
                                    </span>
                                @elseif ($payment->status === 'unpaid')
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i>Belum Lunas
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-question me-1"></i>{{ ucfirst($payment->status) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Jumlah Dibayar</label>
                            <p class="mb-0 fw-bold text-success">Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Pembayaran</label>
                            <p class="mb-0">
                                {{ $payment->paid_at ? \Carbon\Carbon::parse($payment->paid_at)->format('d M Y H:i') : 'Belum dibayar' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Pesanan -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pesanan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">ID Pesanan</label>
                            <p class="mb-0 fw-bold">#{{ $payment->order->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Layanan</label>
                            <p class="mb-0">{{ $payment->order->service->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Berat</label>
                            <p class="mb-0 fw-bold">{{ $payment->order->weight }} kg</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Total Harga</label>
                            <p class="mb-0 fw-bold text-primary">Rp {{ number_format($payment->order->total_price, 0, ',', '.') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status Pesanan</label>
                            <p class="mb-0">
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'proses' => 'info',
                                        'selesai' => 'success',
                                        'diantar' => 'primary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$payment->order->status] ?? 'secondary' }}">
                                    {{ ucfirst($payment->order->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Pelanggan -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama</label>
                            <p class="mb-0">{{ $payment->order->user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <p class="mb-0">{{ $payment->order->user->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">No. Telepon</label>
                            <p class="mb-0">{{ $payment->order->user->phone ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bukti Pembayaran -->
        @if ($payment->method === 'transfer' && $payment->bukti_pembayaran)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Bukti Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <a href="{{ asset('storage/' . $payment->bukti_pembayaran) }}" target="_blank" class="d-inline-block">
                        <img src="{{ asset('storage/' . $payment->bukti_pembayaran) }}"
                             class="img-fluid rounded" style="max-height: 400px;">
                    </a>
                    <p class="mt-3 mb-0 text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Klik gambar untuk melihat ukuran penuh
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar - Aksi -->
    <div class="col-lg-4">
        @if ($payment->method === 'transfer' && $payment->status === 'unpaid')
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Verifikasi Pembayaran</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Verifikasi pembayaran transfer setelah memeriksa bukti pembayaran.</p>
                <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin memverifikasi pembayaran ini?')">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-check me-2"></i>Verifikasi Pembayaran
                    </button>
                </form>
            </div>
        </div>
        @endif

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="tel:{{ $payment->order->user->phone ?? '' }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-2"></i>Hubungi Pelanggan
                    </a>
                    <a href="mailto:{{ $payment->order->user->email }}" class="btn btn-outline-info">
                        <i class="fas fa-envelope me-2"></i>Kirim Email
                    </a>
                    <a href="{{ route('admin.orders.show', $payment->order->id) }}" class="btn btn-outline-primary">
                        <i class="fas fa-eye me-2"></i>Lihat Pesanan
                    </a>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list me-2"></i>Daftar Pembayaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
