@extends('layouts.admin')
@section('title', 'Kelola Layanan')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary ms-auto">Tambah Layanan</a>
</div>


@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga/kg</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td>{{ $service->description }}</td>
            <td>Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
