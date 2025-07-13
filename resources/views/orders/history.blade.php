@extends('layouts.template')

@section('title', 'Riwayat Pesanan - Fadhlur Laundry')

@section('content')
<div class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
    @if ($orders->count() > 0)
                    <!-- Orders Card -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <!-- Header -->
                            <div class="text-center mb-4">
                                <div class="login-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-history fa-2x"></i>
                                </div>
                                <h2 class="fw-bold text-primary mb-2">Riwayat Pesanan Saya</h2>
                                <p class="text-muted">Total {{ $orders->count() }} pesanan</p>
                            </div>

                            <!-- Orders Table -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 py-3 px-4 fw-semibold">
                                                <i class="fas fa-tag me-2"></i>Layanan
                                            </th>
                                            <th class="border-0 py-3 px-4 fw-semibold">
                                                <i class="fas fa-weight-hanging me-2"></i>Berat
                                            </th>
                                            <th class="border-0 py-3 px-4 fw-semibold">
                                                <i class="fas fa-money-bill-wave me-2"></i>Total
                                            </th>
                                            <th class="border-0 py-3 px-4 fw-semibold">
                                                <i class="fas fa-clipboard-list me-2"></i>Status Pesanan
                                            </th>
                                            <th class="border-0 py-3 px-4 fw-semibold">
                                                <i class="fas fa-credit-card me-2"></i>Status Pembayaran
                                            </th>
                                            <th class="border-0 py-3 px-4 fw-semibold text-center">
                                                <i class="fas fa-cogs me-2"></i>Opsi
                                            </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                                            <tr class="order-row">
                                                <td class="py-3 px-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="service-icon bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                            <i class="fas fa-tshirt text-primary"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-0">{{ $order->service->name }}</h6>
                                                            <small class="text-muted">ID: #{{ $order->id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-4">
                                                    <span class="badge bg-light text-dark fw-semibold">
                                                        <i class="fas fa-weight-hanging me-1"></i>{{ $order->weight }} kg
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4">
                                                    <span class="fw-bold text-success">
                                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4">
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
                                                </td>
                                                <td class="py-3 px-4">
                                                    @if($order->payment)
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
                                                    @else
                                                        <span class="badge bg-secondary fw-semibold">
                                                            <i class="fas fa-minus me-1"></i>-
                                                        </span>
                                                    @endif
                        </td>
                                                <td class="py-3 px-4 text-center">
                                                    <a href="{{ route('orders.show', $order->id) }}"
                                                       class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-eye me-1"></i>Detail
                                                    </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                            </div>

                            <!-- Pagination -->
                            @if($orders->hasPages())
                                <div class="d-flex justify-content-center mt-4 pt-3 border-top">
        {{ $orders->links() }}
                                </div>
                            @endif
                        </div>
                    </div>

    @else
                    <!-- Empty State -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="empty-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                                    <i class="fas fa-inbox fa-3x text-muted"></i>
                                </div>
                                <h3 class="fw-bold text-muted mb-3">Belum Ada Pesanan</h3>
                                <p class="text-muted mb-4">Anda belum memiliki riwayat pesanan laundry. Mulai pesan layanan kami sekarang!</p>
                                <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-plus me-2"></i>Pesan Layanan
                                </a>
                            </div>
                        </div>
                    </div>
    @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
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

.table {
    border-collapse: separate;
    border-spacing: 0;
}

.table th {
    border: none;
    font-weight: 600;
    color: #495057;
    background: #f8f9fa;
}

.table td {
    border: none;
    vertical-align: middle;
}

.order-row {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f1f3f4;
}

.order-row:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

.service-icon {
    transition: transform 0.3s ease;
}

.order-row:hover .service-icon {
    transform: scale(1.1);
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

.empty-icon {
    transition: transform 0.3s ease;
}

.empty-icon:hover {
    transform: scale(1.05);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table-responsive {
        border-radius: 1rem;
        overflow: hidden;
    }

    .order-row td {
        padding: 1rem 0.5rem;
    }

    .service-icon {
        width: 35px !important;
        height: 35px !important;
    }
}

/* Pagination styling */
.pagination {
    gap: 0.25rem;
}

.page-link {
    border-radius: 8px;
    border: none;
    color: var(--primary-color);
    font-weight: 600;
    transition: all 0.3s ease;
}

.page-link:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.page-item.disabled .page-link {
    color: #6c757d;
    background-color: transparent;
}

/* Card shadow animation */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}
</style>
@endpush
@endsection
