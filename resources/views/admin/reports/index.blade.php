@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')
    <h3 class="mb-4">Laporan Transaksi</h3>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label class="form-label">Dari Tanggal</label>
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Sampai Tanggal</label>
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    <div class="alert alert-success">
        Total Pendapatan: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
    </div>

    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th>Tanggal Bayar</th>
                <th>Nama Pelanggan</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
                <tr>
                    <td>{{ $payment->paid_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $payment->order->user->name }}</td>
                    <td>{{ $payment->order->service->name }}</td>
                    <td>{{ $payment->order->weight }} kg</td>
                    <td>Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $payments->links() }}
@endsection
