@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        .hero-title {
            font-size: 2.6rem;
            font-weight: 700;
            color: #0b3c8c;
        }

        .hero-sub {
            color: #374151;
        }

        .hero-img {
            width: 100%;
            max-height: 520px;
            object-fit: contain;
        }

        .section-title {
            font-weight: 700;
            color: #0b3c8c;
            font-size: 1.8rem;
        }

        .section-sub {
            color: #374151;
            max-width: 650px;
            margin: auto;
        }

        .card-modern {
            border-radius: 16px;
            background: #ffffff;
            padding: 25px;
            border: 1px solid #e6eaf0;
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: #0b3c8c;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 22px;
        }

        .info-box {
            background: #f3f7ff;
            border-radius: 16px;
            padding: 30px;
        }

        .info-title {
            font-weight: 700;
            color: #0b3c8c;
        }

        .info-desc {
            color: #374151;
        }

        .cta-section {
            background: #0b3c8c;
            color: #ffffff;
            border-radius: 18px;
        }

        .logo-hero {
            width: 100%;
            max-width: 520px;
            height: auto;
        }
    </style>
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h1 class="hero-title mb-3">
                    Nutrisi Berkualitas untuk Keseharian
                </h1>
                <p class="hero-sub mb-3">
                    Menghadirkan produk susu berkualitas untuk mendukung kebutuhan nutrisi keluarga Indonesia.
                </p>

                <p class="hero-sub">
                    Dengan standar tinggi dan inovasi berkelanjutan, kami hadir untuk gaya hidup sehat.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/' . ($profile->logo ?? 'logo.png')) }}" class="logo-hero">
            </div>
        </div>

        <div class="text-center mb-5">
            <h2 class="section-title">Komitmen Kami</h2>
            <p class="section-sub mt-2">
                Proses terkontrol untuk menjaga kualitas, keamanan, dan manfaat nutrisi.
            </p>
        </div>
        <div class="row g-4 text-center mb-5">

            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="icon-box mb-3">🥛</div>
                    <h5 class="fw-bold">Kualitas Terjaga</h5>
                    <p class="text-muted">
                        Standar produksi tinggi untuk hasil terbaik.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="icon-box mb-3">🌱</div>
                    <h5 class="fw-bold">Nutrisi Seimbang</h5>
                    <p class="text-muted">
                        Mendukung kebutuhan gizi harian keluarga.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="icon-box mb-3">🌍</div>
                    <h5 class="fw-bold">Berkelanjutan</h5>
                    <p class="text-muted">
                        Fokus pada masa depan yang lebih baik.
                    </p>
                </div>
            </div>
        </div>

        <div class="info-box mb-5">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="info-title">Proses Terstandarisasi</div>
                    <div class="info-desc">Pengawasan ketat di setiap tahap produksi.</div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="info-title">Inovasi Berkelanjutan</div>
                    <div class="info-desc">Menyesuaikan kebutuhan nutrisi modern.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="info-title">Bagian dari Kehidupan</div>
                    <div class="info-desc">Hadir dalam keseharian keluarga.</div>
                </div>
            </div>
        </div>

        <div class="cta-section p-5 text-center">
            <h2 class="fw-bold mb-3">Mulai Hidup Lebih Sehat</h2>
            <p class="mb-0">
                Temukan nutrisi terbaik untuk Anda dan keluarga setiap hari.
            </p>
        </div>
    </div>
@endsection