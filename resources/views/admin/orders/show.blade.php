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
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        <li class="list-group-item"><strong>Metode Pengiriman:</strong> {{ ucfirst($order->delivery_method) }}</li>
        <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>
    </ul>
</div>
<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Kembali</a>
@endsection
