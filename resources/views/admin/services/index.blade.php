@extends('layouts.admin')
@section('title', 'Kelola Layanan')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Kelola Layanan</h4>
                <p class="text-muted mb-0">Tambah, edit, atau hapus layanan laundry yang tersedia</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Layanan
            </a>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Deskripsi</th>
                        <th>Harga/kg</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                    <i class="fas fa-tshirt text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{ $service->name }}</h6>
                                    <small class="text-muted">ID: {{ $service->id }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted">{{ $service->description ?? 'Tidak ada deskripsi' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-success">Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-tshirt fa-2x mb-3"></i>
                                <p class="mb-0">Belum ada layanan tersedia</p>
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus me-2"></i>Tambah Layanan Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($services->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $services->links() }}
</div>
@endif
@endsection
