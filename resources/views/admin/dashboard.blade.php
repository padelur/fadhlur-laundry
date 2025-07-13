@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Halo, {{ Auth::user()->name }}</h2>

    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Layanan</h5>
                    <h2>{{ $totalServices }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2>{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Total Pembayaran</h5>
                    {{-- <h2>{{ $totalPayments }}</h2> --}}
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Pesanan Terbaru</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nama Pelanggan</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentOrders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->service->name }}</td>
                    <td>{{ $order->weight }} kg</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary w-100 py-3">Kelola Layanan</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary w-100 py-3">Kelola Pesanan</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-outline-primary w-100 py-3">Kelola Pembayaran</a>
        </div>
    </div>

</div>
@endsection
