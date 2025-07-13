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
        <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>

        <!-- Informasi Penjemputan -->
        <li class="list-group-item">
            <strong>Penjemputan:</strong>
            <span class="badge bg-{{ $order->pickup_method === 'antar_sendiri' ? 'secondary' : 'primary' }}">
                {{ $order->pickup_method === 'antar_sendiri' ? 'Antar Sendiri' : 'Dijemput' }}
            </span>
        </li>
        @if($order->pickup_method === 'jemput')
            <li class="list-group-item">
                <strong>Alamat Penjemputan:</strong><br>
                <span class="text-primary">{{ $order->pickup_address }}</span>
            </li>
            @if($order->pickup_phone)
                <li class="list-group-item">
                    <strong>Telepon Penjemputan:</strong> {{ $order->pickup_phone }}
                </li>
            @endif
        @endif

        <!-- Informasi Pengantaran -->
        <li class="list-group-item">
            <strong>Pengantaran:</strong>
            <span class="badge bg-{{ $order->delivery_method === 'jemput_sendiri' ? 'secondary' : 'success' }}">
                {{ $order->delivery_method === 'jemput_sendiri' ? 'Jemput Sendiri' : 'Diantar' }}
            </span>
        </li>
        @if($order->delivery_method === 'antar')
            <li class="list-group-item">
                <strong>Alamat Pengantaran:</strong><br>
                <span class="text-success">{{ $order->delivery_address }}</span>
            </li>
            @if($order->delivery_phone)
                <li class="list-group-item">
                    <strong>Telepon Pengantaran:</strong> {{ $order->delivery_phone }}
                </li>
            @endif
        @endif

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
