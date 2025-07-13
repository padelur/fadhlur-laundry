@extends('layouts.admin')
@section('title', 'Edit Layanan')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-1">Edit Layanan</h4>
                <p class="text-muted mb-0">Perbarui informasi layanan {{ $service->name }}</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Informasi Layanan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Layanan</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $service->name) }}" placeholder="Contoh: Cuci Reguler" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Harga per Kg</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" step="0.01" name="price_per_kg"
                                           class="form-control @error('price_per_kg') is-invalid @enderror"
                                           value="{{ old('price_per_kg', $service->price_per_kg) }}" placeholder="0" required>
                                </div>
                                @error('price_per_kg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Layanan</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  rows="4" placeholder="Jelaskan detail layanan, proses cuci, dan waktu pengerjaan...">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Opsional: Tambahkan deskripsi untuk membantu pelanggan memahami layanan</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Perbarui Layanan
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Layanan</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">ID Layanan</label>
                    <p class="mb-0 fw-bold">#{{ $service->id }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Dibuat Pada</label>
                    <p class="mb-0">{{ $service->created_at->format('d M Y H:i') }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Terakhir Diperbarui</label>
                    <p class="mb-0">{{ $service->updated_at->format('d M Y H:i') }}</p>
                </div>
                <hr>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <small>Perubahan pada layanan akan mempengaruhi pesanan yang sudah ada</small>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Hapus Layanan</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Hapus layanan ini secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-trash me-2"></i>Hapus Layanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
