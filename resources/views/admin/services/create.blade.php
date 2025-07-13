@extends('layouts.admin')
@section('title', 'Tambah Layanan')

@section('content')
<form action="{{ route('admin.services.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Layanan</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Harga per Kg</label>
        <input type="number" step="0.01" name="price_per_kg" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
