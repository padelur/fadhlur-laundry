@extends('layouts.admin')
@section('title', 'Edit Layanan')

@section('content')
<h2>Edit Layanan</h2>
<form action="{{ route('admin.services.update', $service->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Layanan</label>
        <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ $service->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Harga per Kg</label>
        <input type="number" step="0.01" name="price_per_kg" class="form-control" value="{{ $service->price_per_kg }}" required>
    </div>
    <button class="btn btn-primary">Perbarui</button>
</form>
@endsection
