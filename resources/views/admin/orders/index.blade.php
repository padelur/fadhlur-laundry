@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Kelola Pesanan</h4>
                <p class="text-muted mb-0">Lihat dan update status pesanan pelanggan</p>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <form method="GET" class="d-flex">
            <select name="status" class="form-select me-2" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="diantar" {{ request('status') === 'diantar' ? 'selected' : '' }}>Diantar</option>
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
                        <th>Berat</th>
                        <th>Status</th>
                        <th>Penjemputan</th>
                        <th>Pengantaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <span class="text-white fw-bold">{{ strtoupper(substr($order->user->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $order->user->name }}</h6>
                                        <small class="text-muted">{{ $order->user->email }}</small>
                                        @if($order->user->customer && $order->user->customer->phone)
                                            <br><small class="text-primary"><i class="fas fa-phone me-1"></i>{{ $order->user->customer->phone }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $order->service->name }}</span>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $order->weight }} kg</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto;">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="proses" {{ $order->status === 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="diantar" {{ $order->status === 'diantar' ? 'selected' : '' }}>Diantar</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <small class="text-muted">{{ $order->pickup_method === 'antar_sendiri' ? 'Antar Sendiri' : 'Dijemput' }}</small>
                                @if($order->pickup_address)
                                    <br><small class="text-primary">{{ Str::limit($order->pickup_address, 30) }}</small>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">{{ $order->delivery_method === 'jemput_sendiri' ? 'Jemput Sendiri' : 'Diantar' }}</small>
                                @if($order->delivery_address)
                                    <br><small class="text-success">{{ Str::limit($order->delivery_address, 30) }}</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                                    <p class="mb-0">Tidak ada pesanan</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($orders->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $orders->links() }}
</div>
@endif
@endsection
