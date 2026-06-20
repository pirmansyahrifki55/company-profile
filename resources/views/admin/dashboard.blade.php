@extends('admin.layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-primary text-white rounded-3 p-3 fs-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    📰
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="fw-bold text-dark mb-0">{{ $artikelCount }}</h3>
                    <p class="text-muted small mb-0">Total Artikel & Berita</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.artikel.index') }}" class="btn btn-sm btn-link p-0 text-decoration-none text-primary">Kelola Artikel &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-success text-white rounded-3 p-3 fs-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    🥛
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="fw-bold text-dark mb-0">{{ $productCount }}</h3>
                    <p class="text-muted small mb-0">Total Produk / Layanan</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-link p-0 text-decoration-none text-success">Kelola Produk &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 bg-warning text-white rounded-3 p-3 fs-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    🖼️
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="fw-bold text-dark mb-0">{{ $galleryCount }}</h3>
                    <p class="text-muted small mb-0">Total Foto Galeri</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-link p-0 text-decoration-none text-warning">Kelola Galeri &rarr;</a>
            </div>
        </div>
    </div>
</div>

<div class="card card-custom p-4 mt-4">
    <h5 class="fw-bold mb-3 text-dark">Selamat Datang di Panel Administrator</h5>
    <p class="text-secondary mb-0">
        Melalui panel ini, Anda dapat mengelola seluruh konten website Frisian Flag Indonesia seperti profil perusahaan, produk atau layanan komersial, galeri dokumentasi foto, dan artikel edukasi/berita secara dinamis. Perubahan yang Anda lakukan akan langsung direfleksikan ke halaman frontend secara instan.
    </p>
</div>
@endsection
