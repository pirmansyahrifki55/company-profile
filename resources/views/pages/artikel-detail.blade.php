@extends('layouts.app')

@section('title', 'Detail Artikel')

@section('content')
    <div class="container py-5">

        <style>
            .hero-img {
                width: 100%;
                max-height: 420px;
                object-fit: cover;
                border-radius: 20px;
                transition: 0.4s;
            }

            .hero-img:hover {
                transform: scale(1.02);
            }

            .badge-modern {
                font-size: 11px;
                padding: 6px 12px;
                border-radius: 20px;
            }

            .article-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: #0b3c8c;
            }

            .content-text {
                line-height: 1.9;
                color: #444;
                font-size: 16px;
                white-space: pre-line;
            }

            .info-box {
                background: #f8f9fa;
                border-radius: 15px;
                border-left: 5px solid #0b3c8c;
            }

            .btn-modern {
                border-radius: 30px;
                padding: 10px 25px;
                transition: 0.3s;
                font-weight: 600;
                text-decoration: none;
            }

            .btn-modern:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <img src="{{ asset('images/' . $artikel->image) }}" class="hero-img mb-4" alt="{{ $artikel->title }}">
                </div>
                <div class="mb-3">
                    <span class="badge bg-primary badge-modern">
                        {{ $artikel->categori ?? 'Umum' }}
                    </span>
                    <span class="badge {{ $artikel->status == 'publish' ? 'bg-success' : 'bg-secondary' }} badge-modern">
                        {{ ucfirst($artikel->status) }}
                    </span>
                </div>

                <h1 class="article-title mb-3">
                    {{ $artikel->title }}
                </h1>
                <p class="text-muted mb-4">
                    Dipublikasikan oleh <strong>PT Frisian Flag</strong> •
                    {{ $artikel->created_at ? $artikel->created_at->format('d M Y') : '' }}
                </p>
                <hr class="my-4">
                <div class="content-text mb-5">
                    {{ $artikel->description }}
                </div>

                <div class="info-box p-4 mb-5">
                    <h5 class="fw-semibold mb-2">Tentang Artikel Ini</h5>
                    <p class="mb-0 text-muted">
                        Artikel ini merupakan bagian dari komitmen PT Frisian Flag dalam memberikan edukasi dan informasi
                        seputar nutrisi, kesehatan, dan gaya hidup sehat bagi masyarakat Indonesia.
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('artikel') }}" class="btn btn-outline-primary btn-modern">
                        ← Kembali ke Artikel
                    </a>
                    <a href="/contact" class="btn btn-primary btn-modern">
                        Hubungi Kami →
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection