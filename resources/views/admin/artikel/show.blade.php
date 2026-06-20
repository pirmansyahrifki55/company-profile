@extends('admin.layouts.admin')

@section('title', 'Detail Artikel')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Detail Artikel</h5>
        <div>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary btn-custom shadow-sm me-1">&larr; Kembali</a>
            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-primary btn-custom shadow-sm">Edit Artikel</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card p-2 border-0 bg-light">
                @if($artikel->image)
                    <img src="{{ asset('images/' . $artikel->image) }}" alt="Gambar" class="img-fluid rounded">
                @else
                    <div class="text-center p-5 bg-light text-muted">No Image Available</div>
                @endif
            </div>
            <div class="mt-3">
                <span class="small d-block text-secondary">Kategori:</span>
                <span class="badge bg-light text-dark border">{{ $artikel->categori }}</span>
            </div>
            <div class="mt-2">
                <span class="small d-block text-secondary">Status:</span>
                @if($artikel->status == 'published')
                    <span class="badge bg-success">Published</span>
                @elseif($artikel->status == 'draft')
                    <span class="badge bg-secondary">Draft</span>
                @else
                    <span class="badge bg-warning">Archived</span>
                @endif
            </div>
            <div class="mt-2">
                <span class="small d-block text-secondary">Tanggal Pembuatan:</span>
                <small class="text-dark">{{ $artikel->created_at ? $artikel->created_at->format('d F Y H:i') : '-' }}</small>
            </div>
        </div>

        <div class="col-md-8">
            <h2 class="fw-bold text-dark mb-3">{{ $artikel->title }}</h2>
            <hr>
            <h6 class="fw-bold text-secondary mb-2">Konten / Deskripsi:</h6>
            <p class="text-dark" style="white-space: pre-line; line-height: 1.8;">
                {{ $artikel->description }}
            </p>
        </div>
    </div>
</div>
@endsection
