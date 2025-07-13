@extends('layouts.template')

@section('title', 'Detail Pesanan')

@section('content')
    <h3 class="mb-4">Detail Pesanan</h3>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Layanan:</strong> {{ $order->service->name }}</li>
        <li class="list-group-item"><strong>Berat:</strong> {{ $order->weight }} kg</li>
        <li class="list-group-item"><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>Status Pesanan:</strong> {{ ucfirst($order->status) }}</li>
        <li class="list-group-item"><strong>Metode Pengiriman:</strong> {{ ucfirst($order->delivery_method) }}</li>
        <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>
    </ul>

    @if ($order->payment)
        <h5 class="mb-3">Informasi Pembayaran</h5>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment->method) }}</li>
            <li class="list-group-item"><strong>Status Pembayaran:</strong> {{ ucfirst($order->payment->status) }}</li>
            <li class="list-group-item"><strong>Jumlah Dibayar:</strong> Rp {{ number_format($order->payment->amount_paid, 0, ',', '.') }}</li>
            <li class="list-group-item">
                <strong>Tanggal Pembayaran:</strong>
                {{ $order->payment->paid_at ? \Carbon\Carbon::parse($order->payment->paid_at)->format('d/m/Y H:i') : '-' }}
            </li>

            @if ($order->payment->bukti_pembayaran)
                <li class="list-group-item">
                    <strong>Bukti Pembayaran:</strong><br>
                    <img src="{{ asset('storage/' . $order->payment->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid mt-2" style="max-height: 300px;">
                </li>
            @endif
        </ul>
    @endif

    <a href="{{ route('orders.history') }}" class="btn btn-secondary">← Kembali ke Riwayat</a>
@endsection
