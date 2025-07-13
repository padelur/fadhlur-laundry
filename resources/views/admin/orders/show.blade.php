@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="mb-4">
    <h4>Detail Pesanan #{{ $order->id }}</h4>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $order->user->name }}</li>
        <li class="list-group-item"><strong>Layanan:</strong> {{ $order->service->name }}</li>
        <li class="list-group-item"><strong>Berat:</strong> {{ $order->weight }} kg</li>
        <li class="list-group-item"><strong>Total:</strong> Rp {{ number_format($order->total_price) }}</li>
        <li class="list-group-item"><strong>Status Pesanan:</strong> {{ ucfirst($order->status) }}</li>
        <li class="list-group-item"><strong>Metode Pengiriman:</strong> {{ ucfirst($order->delivery_method) }}</li>
        <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>

        @if ($order->payment)
            <li class="list-group-item">
                <strong>Status Pembayaran:</strong>
                <span class="badge bg-{{ $order->payment->status === 'paid' ? 'success' : 'warning' }}">
                    {{ ucfirst($order->payment->status) }}
                </span>
            </li>
            <li class="list-group-item">
                <strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment->method) }}
            </li>
            @if ($order->payment->bukti_pembayaran)
                <li class="list-group-item">
                    <strong>Bukti Pembayaran:</strong><br>
                    <img src="{{ asset('storage/' . $order->payment->bukti_pembayaran) }}" class="img-fluid mt-2" style="max-height: 300px;">
                </li>
            @endif
        @else
            <li class="list-group-item text-danger"><strong>Belum ada pembayaran</strong></li>
        @endif
    </ul>
</div>
<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Kembali</a>
@endsection
