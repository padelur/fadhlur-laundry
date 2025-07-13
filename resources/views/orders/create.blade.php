@extends('layouts.template')

@section('title', 'Buat Pesanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Form Pemesanan</h2>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Layanan --}}
            <div class="mb-3">
                <label class="form-label">Layanan</label>
                <input type="text" class="form-control" value="{{ $service->name }}" disabled>
                <input type="hidden" name="service_id" value="{{ $service->id }}">
            </div>

            {{-- Harga per Kg --}}
            <div class="mb-3">
                <label class="form-label">Harga per Kg</label>
                <input type="text" class="form-control" value="Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}" disabled>
            </div>

            {{-- Berat --}}
            <div class="mb-3">
                <label class="form-label">Berat Cucian (Kg)</label>
                <input type="number" name="weight" class="form-control" min="1" required>
            </div>

            {{-- Metode Pengiriman --}}
            <div class="mb-3">
                <label class="form-label">Metode Pengiriman</label>
                <select name="delivery_method" class="form-select" required>
                    <option value="manual">Manual (antar sendiri)</option>
                    <option value="jemput">Jemput ke rumah</option>
                    <option value="antar">Antar ke rumah</option>
                </select>
            </div>

            {{-- Metode Pembayaran --}}
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran</label>
                <select name="method" class="form-select" id="payment-method" required>
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>

            {{-- Info dan Upload Bukti Transfer --}}
            <div id="transfer-info" style="display: none;">
                <div class="alert alert-warning">
                    Silakan transfer ke rekening berikut sebelum mengunggah bukti:
                    <ul class="mb-0">
                        <li><strong>Bank BRI:</strong> 1234-5678-9999 a.n. Fadhlur Laundry</li>
                        <li><strong>Bank Mandiri:</strong> 9988-7766-5544 a.n. Fadhlur Laundry</li>
                    </ul>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                    <small class="text-muted">*Wajib diunggah jika memilih metode transfer</small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const metode = document.getElementById("payment-method");
        const infoTransfer = document.getElementById("transfer-info");

        function toggleTransferSection() {
            infoTransfer.style.display = (metode.value === "transfer") ? "block" : "none";
        }

        metode.addEventListener("change", toggleTransferSection);
        toggleTransferSection(); 
    });
</script>
@endpush
