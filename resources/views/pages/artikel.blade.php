@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<style>
    .section-title {
        font-weight: 700;
        color: #0b3c8c;
    }

    .article-card {
        border: 1px solid #e6eaf0;
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        height: 100%;
        transition: all 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .card-img-top {
        height: 220px;
        width: 100%;
        object-fit: cover;
    }

    .badge-modern {
        font-size: 11px;
        padding: 6px 10px;
        border-radius: 20px;
    }

    .text-muted-custom {
        color: #4b5563;
    }

    .btn-modern {
        border-radius: 30px;
        background: #0b3c8c;
        border: none;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        display: block;
        text-align: center;
        text-decoration: none;
    }

    .btn-modern:hover {
        background: #082d6b;
        color: white;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">Artikel & Insights</h1>
        <p class="text-muted-custom">Informasi dan update terbaru</p>
    </div>
    <div class="row g-4">
        @forelse ($artikels as $artikel)

            <div class="col-md-4">
                <a href="{{ route('artikel.show', $artikel->id) }}"
                   class="d-block text-decoration-none text-dark h-100">
                    <div class="article-card">
                        <img src="{{ asset('images/' . $artikel->image) }}" class="card-img-top" alt="{{ $artikel->title }}">
                        <div class="p-4 d-flex flex-column h-100">

                            <div class="mb-3">
                                <span class="badge bg-primary badge-modern">
                                    {{ $artikel->categori ?? 'Umum' }}
                                </span>
                                <span class="badge bg-secondary badge-modern">
                                    {{ ucfirst($artikel->status) ?? 'Draft' }}
                                </span>
                            </div>

                            <h5 class="fw-bold mb-2">
                                {{ $artikel->title }}
                            </h5>
                            <p class="text-muted-custom small mb-3">
                                {{ Str::limit($artikel->description, 100) }}
                            </p>

                            <small class="text-muted-custom mt-auto mb-3">
                                Kategori: {{ $artikel->categori ?? '-' }}
                            </small>
                            <div class="btn-modern">
                                Baca Selengkapnya
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5 class="text-muted">Belum ada artikel tersedia</h5>
            </div>

        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $artikels->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection