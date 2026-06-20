@extends('admin.layouts.admin')

@section('title', 'Tambah Galeri Baru')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Tambah Foto Galeri</h5>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary btn-custom shadow-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label small fw-semibold text-secondary">Judul Foto / Kegiatan</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label small fw-semibold text-secondary">Status Tampil</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label small fw-semibold text-secondary">Unggah Gambar</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                <small class="text-muted d-block mt-1">Hanya file gambar maks 2MB.</small>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-4">
                <label for="description" class="form-label small fw-semibold text-secondary">Deskripsi Singkat (Opsional)</label>
                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-custom shadow-sm">Simpan Galeri</button>
        </div>
    </form>
</div>
@endsection
