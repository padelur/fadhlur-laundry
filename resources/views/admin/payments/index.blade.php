@extends('layouts.admin')

@section('title', 'Kelola Pembayaran')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Kelola Pembayaran</h4>
                <p class="text-muted mb-0">Lihat dan kelola pembayaran dari pelanggan</p>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <form method="GET" class="d-flex">
            <select name="status" class="form-select me-2" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="unpaid" {{ request('status') === 'unpaid' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Dibayar</option>
            </select>
        </form>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Jumlah Bayar</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Tanggal Bayar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <span class="text-white fw-bold">{{ strtoupper(substr($payment->order->user->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $payment->order->user->name }}</h6>
                                        <small class="text-muted">{{ $payment->order->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $payment->order->service->name }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-success">Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ ucfirst($payment->method) }}</span>
                            </td>
                            <td>
                                @if($payment->status === 'paid')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i>Dibayar
                                    </span>
                                @elseif($payment->status === 'unpaid')
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i>Belum Dibayar
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}
                                </small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-credit-card fa-2x mb-3"></i>
                                    <p class="mb-0">Tidak ada pembayaran</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($payments->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $payments->links() }}
</div>
@endif
@endsection
