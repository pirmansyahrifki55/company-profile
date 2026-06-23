@extends('admin.layouts.admin')

@section('title', 'Tambah Artikel Baru')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Tambah Artikel</h5>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary btn-custom shadow-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label small fw-semibold text-secondary">Judul Artikel</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="categori" class="form-label small fw-semibold text-secondary">Kategori</label>
                <input type="text" name="categori" id="categori" class="form-control @error('categori') is-invalid @enderror" value="{{ old('categori') }}" placeholder="Contoh: Nutrisi, Edukasi" required>
                @error('categori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label small fw-semibold text-secondary">Status Publikasi</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Simpan Sementara)</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published (Tampil di Web)</option>
                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived (Arsip)</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label small fw-semibold text-secondary">Gambar Artikel</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                <small class="text-muted d-block mt-1">Hanya file gambar (jpg, jpeg, png, webp, gif) maks 2MB.</small>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-4">
                <label for="description" class="form-label small fw-semibold text-secondary">Konten / Deskripsi Artikel</label>
                <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Tulis artikel lengkap di sini..." required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-custom shadow-sm">Simpan Artikel</button>
        </div>
    </form>
</div>
@endsection
