@extends('layouts.app')

@section('title', 'Produk & Layanan')

@section('content')
<style>
    .section-title {
        font-weight: 700;
        color: #0b3c8c;
    }
    .product-card {
        border: 1px solid #e6eaf0;
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        height: 100%;
        transition: all 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-img-top {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    .price-tag {
        font-size: 1.25rem;
        font-weight: 700;
        color: #0b3c8c;
    }
    .text-muted-custom {
        color: #4b5563;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">Produk & Layanan Kami</h1>
        <p class="text-muted-custom">Pilihan nutrisi terbaik untuk mendukung kesehatan harian Anda</p>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-4">
                <div class="product-card d-flex flex-column h-100">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h5 class="fw-bold mb-2">{{ $product->name }}</h5>
                        <p class="text-muted-custom small mb-4 flex-grow-1">
                            {{ $product->description }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="badge bg-success">Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5 class="text-muted">Belum ada produk atau layanan tersedia</h5>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
