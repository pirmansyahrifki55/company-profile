@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<style>
    .section-title {
        font-weight: 700;
        color: #0b3c8c;
    }
    .gallery-card {
        border: 1px solid #e6eaf0;
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        transition: all 0.3s ease;
        height: 100%;
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .gallery-img {
        height: 240px;
        width: 100%;
        object-fit: cover;
    }
    .text-muted-custom {
        color: #4b5563;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">Galeri Foto</h1>
        <p class="text-muted-custom">Dokumentasi aktivitas, kontribusi sosial, dan produk unggulan kami</p>
    </div>

    <div class="row g-4">
        @forelse ($galleries as $gallery)
            <div class="col-md-4">
                <div class="gallery-card d-flex flex-column">
                    <img src="{{ asset('images/' . $gallery->image) }}" class="gallery-img" alt="{{ $gallery->title }}">
                    <div class="p-3 flex-grow-1">
                        <h6 class="fw-bold mb-1">{{ $gallery->title }}</h6>
                        @if ($gallery->description)
                            <p class="text-muted-custom small mb-0">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5 class="text-muted">Belum ada foto galeri tersedia</h5>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
