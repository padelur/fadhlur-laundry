@extends('layouts.template')

@section('title', 'Layanan Laundry')

@section('content')
<div class="container">
    <h2 class="text-center mb-5">Layanan Kami</h2>

    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $service->description ?? '-' }}</p>
                        <p class="fw-bold mb-3">Rp {{ number_format($service->price_per_kg, 0, ',', '.') }} /kg</p>
                        <a href="{{ route('orders.create', ['service' => $service->id]) }}" class="btn btn-primary mt-auto w-100">Pesan Sekarang</a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada layanan tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
