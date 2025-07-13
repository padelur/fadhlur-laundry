@extends('layouts.admin')

@section('title', 'Detail Pembayaran')

@section('content')
    <h3 class="mb-4">Detail Pembayaran</h3>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Nama Pelanggan:</strong> {{ $payment->order->user->name }}</li>
        <li class="list-group-item"><strong>Layanan:</strong> {{ $payment->order->service->name }}</li>
        <li class="list-group-item"><strong>Berat:</strong> {{ $payment->order->weight }} kg</li>
        <li class="list-group-item"><strong>Metode Pembayaran:</strong> {{ ucfirst($payment->method) }}</li>
        <li class="list-group-item"><strong>Status:</strong>
            @if ($payment->status === 'paid')
                <span class="badge bg-success">Lunas</span>
            @else
                <span class="badge bg-warning text-dark">Belum Lunas</span>
            @endif
        </li>
        <li class="list-group-item"><strong>Jumlah Dibayar:</strong> Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</li>
        <li class="list-group-item">
            <strong>Tanggal Bayar:</strong> {{ $payment->paid_at ? \Carbon\Carbon::parse($payment->paid_at)->format('d/m/Y H:i') : '-' }}
        </li>

        @if ($payment->method === 'transfer' && $payment->bukti_pembayaran)
            <li class="list-group-item">
                <strong>Bukti Pembayaran:</strong>
                <div class="mt-2">
                    <a href="{{ asset('storage/' . $payment->bukti_pembayaran) }}" target="_blank">
                        <img src="{{ asset('storage/' . $payment->bukti_pembayaran) }}" class="img-thumbnail" style="max-height: 300px;">
                    </a>
                    <p class="mt-2 mb-0">
                        <small>Klik gambar untuk melihat ukuran penuh</small>
                    </p>
                </div>
            </li>
        @endif
    </ul>

    @if ($payment->method === 'transfer' && $payment->status === 'unpaid')
        <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST" onsubmit="return confirm('Yakin ingin memverifikasi pembayaran ini?')">
            @csrf
            @method('PATCH')
            <button class="btn btn-success mb-3">Verifikasi Pembayaran</button>
        </form>
    @endif

    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
@endsection
