@extends('admin.layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Edit Produk</h5>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary btn-custom shadow-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label small fw-semibold text-secondary">Nama Produk / Layanan</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="price" class="form-label small fw-semibold text-secondary">Harga Produk (Rupiah)</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label small fw-semibold text-secondary">Status Produk</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label small fw-semibold text-secondary">Gambar Produk</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengubah gambar. Maksimal 2MB.</small>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                @if($product->image)
                    <div class="mt-3">
                        <span class="small d-block text-secondary mb-1">Gambar Saat Ini:</span>
                        <img src="{{ asset('images/' . $product->image) }}" alt="Gambar" class="img-thumbnail" style="max-height: 120px;">
                    </div>
                @endif
            </div>

            <div class="col-md-12 mb-4">
                <label for="description" class="form-label small fw-semibold text-secondary">Deskripsi Produk</label>
                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-custom shadow-sm">Perbarui Produk</button>
        </div>
    </form>
</div>
@endsection
