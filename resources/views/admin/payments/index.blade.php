@extends('layouts.admin')

@section('title', 'Kelola Pembayaran')

@section('content')
    <h3 class="mb-4">Daftar Pembayaran</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nama Pelanggan</th>
                <th>Layanan</th>
                <th>Jumlah Bayar</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->order->user->name }}</td>
                    <td>{{ $payment->order->service->name }}</td>
                    <td>Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($payment->method) }}</td>
                    <td>
                        <span class="badge bg-{{ $payment->status === 'paid' ? 'success' : 'warning' }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td>{{ $payment->paid_at ? $payment->paid_at->format('d/m/Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
@endsection
