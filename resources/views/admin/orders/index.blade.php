@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="mb-4">
    <h3>Daftar Pesanan</h3>

    <form method="GET" class="mb-3">
        <div class="row g-2">
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="diantar" {{ request('status') === 'diantar' ? 'selected' : '' }}>Diantar</option>
                </select>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Status</th>
                <th>Penjemputan</th>
                <th>Pengantaran</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->service->name }}</td>
                    <td>{{ $order->weight }} kg</td>
                    <td>
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
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
                            <br><small class="text-primary">{{ Str::limit($order->delivery_address, 30) }}</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
</div>
@endsection
