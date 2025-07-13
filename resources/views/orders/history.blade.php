@extends('layouts.template')

@section('title', 'Riwayat Pesanan')

@section('content')
    <h3 class="mb-4">Riwayat Pesanan Saya</h3>

    @if ($orders->count() > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status Pesanan</th>
                    <th>Status Pembayaran</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->service->name }}</td>
                        <td>{{ $order->weight }} kg</td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            {{ $order->payment ? ucfirst($order->payment->status) : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    @else
        <div class="alert alert-info">Kamu belum memiliki pesanan.</div>
    @endif
@endsection
