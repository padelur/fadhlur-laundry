@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Pesanan</h2>

        @if($orders->count())
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Metode Pengiriman</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->service->name }}</td>
                            <td>{{ $order->weight }} kg</td>
                            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ ucfirst($order->delivery_method) }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }} {{-- Pagination --}}
        @else
            <p class="text-center">Belum ada pesanan.</p>
        @endif
    </div>
@endsection
