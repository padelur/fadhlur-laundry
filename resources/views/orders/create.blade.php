@extends('layouts.template')

@section('title', 'Buat Pesanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Form Pemesanan</h2>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Layanan</label>
                <input type="text" class="form-control" value="{{ $service->name }}" disabled>
                <input type="hidden" name="service_id" value="{{ $service->id }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga per Kg</label>
                <input type="text" class="form-control" value="Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Berat Cucian (Kg)</label>
                <input type="number" name="weight" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Metode</label>
                <select name="delivery_method" class="form-select" required>
                    <option value="manual">Manual (antar sendiri)</option>
                    <option value="jemput">Jemput ke rumah</option>
                    <option value="antar">Antar ke rumah</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
        </form>
    </div>
</div>
@endsection
