@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Detail Pesanan</h4>
                <p class="text-muted mb-0">Informasi lengkap pesanan #{{ $order->id }}</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
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
    <!-- Informasi Pesanan -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Pesanan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">ID Pesanan</label>
                            <p class="mb-0 fw-bold">#{{ $order->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Pesanan</label>
                            <p class="mb-0">{{ $order->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'proses' => 'info',
                                        'selesai' => 'success',
                                        'diantar' => 'primary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Layanan</label>
                            <p class="mb-0">{{ $order->service->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Berat</label>
                            <p class="mb-0 fw-bold">{{ $order->weight }} kg</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Total Harga</label>
                            <p class="mb-0 fw-bold text-success">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
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
                            <p class="mb-0">{{ $order->user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <p class="mb-0">{{ $order->user->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">No. Telepon</label>
                            <p class="mb-0">{{ $order->user->phone ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Penjemputan & Pengantaran -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Penjemputan & Pengantaran</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Metode Penjemputan</label>
                            <p class="mb-0">
                                <span class="badge bg-primary">{{ $order->pickup_method === 'antar_sendiri' ? 'Antar Sendiri' : 'Dijemput' }}</span>
                            </p>
                        </div>
                        @if($order->pickup_address)
                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat Penjemputan</label>
                            <p class="mb-0">{{ $order->pickup_address }}</p>
                        </div>
                        @endif
                        @if($order->pickup_phone)
                        <div class="mb-3">
                            <label class="form-label text-muted">No. Telepon Penjemputan</label>
                            <p class="mb-0">{{ $order->pickup_phone }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Metode Pengantaran</label>
                            <p class="mb-0">
                                <span class="badge bg-success">{{ $order->delivery_method === 'jemput_sendiri' ? 'Jemput Sendiri' : 'Diantar' }}</span>
                            </p>
                        </div>
                        @if($order->delivery_address)
                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat Pengantaran</label>
                            <p class="mb-0">{{ $order->delivery_address }}</p>
                        </div>
                        @endif
                        @if($order->delivery_phone)
                        <div class="mb-3">
                            <label class="form-label text-muted">No. Telepon Pengantaran</label>
                            <p class="mb-0">{{ $order->delivery_phone }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($order->notes)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Catatan</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $order->notes }}</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar - Update Status -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Status Pesanan</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="proses" {{ $order->status === 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="diantar" {{ $order->status === 'diantar' ? 'selected' : '' }}>Diantar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-2"></i>Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="tel:{{ $order->user->phone ?? '' }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-2"></i>Hubungi Pelanggan
                    </a>
                    <a href="mailto:{{ $order->user->email }}" class="btn btn-outline-info">
                        <i class="fas fa-envelope me-2"></i>Kirim Email
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list me-2"></i>Daftar Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
