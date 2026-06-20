@extends('layouts.app')

@section('title', 'About')

@section('content')

<style>
    .about-hero {
        background: linear-gradient(135deg, #082c66, #0d6efd);
        color: #fff;
        padding: 70px 0;
        width: 100%;
    }

    .hero-inner {
        max-width: 1200px;
        margin: auto;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 2.4rem;
        font-weight: 700;
        color: #ffffff;
    }

    .hero-img {
        width: 100%;
        max-height: 420px;
        object-fit: contain;
    }

    .section-title {
        font-weight: 700;
        color: #082c66;
    }

    .text-muted-custom {
        color: #4b5563;
    }

    .card-soft {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #e6eaf0;
        height: 100%;
    }

    .card-soft h5 {
        color: #082c66;
        font-weight: 700;
    }

    .card-soft p {
        color: #374151;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: #082c66;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 12px;
    }

    .timeline-item {
        display: flex;
        gap: 20px;
        margin-bottom: 18px;
    }

    .timeline-year {
        min-width: 90px;
        font-weight: 700;
        color: #082c66;
    }

    .timeline-content {
        background: #ffffff;
        border: 1px solid #e6eaf0;
        border-radius: 14px;
        padding: 16px;
        flex: 1;
        color: #111827;
    }

    .timeline-content h6 {
        color: #082c66;
        font-weight: 700;
    }

    .info-box {
        background: #082c66;
        color: #ffffff;
        border-radius: 16px;
        padding: 26px;
        height: 100%;
    }

    .info-box h5 {
        color: #ffffff;
        font-weight: 700;
    }

    .info-box p {
        color: #e5e7eb;
    }
</style>
<div class="about-hero">
    <div class="hero-inner">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title mb-3">
                    {{ $profile->about_title ?? 'Perjalanan Kami dalam Menjadi Bagian dari Kehidupan' }}
                </h1>
                <p class="text-white mb-3" style="white-space: pre-line;">
                    {{ $profile->about_description ?? "Kami hadir untuk memberikan produk dan layanan yang konsisten, terpercaya, dan relevan.\n\nDengan komitmen jangka panjang, kami terus berkembang mengikuti kebutuhan zaman." }}
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/' . ($profile->logo ?? 'logo.png')) }}" class="hero-img">
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="section-title">Fokus Kami</h2>
        <p class="text-muted-custom">Nilai utama yang selalu kami pegang</p>
    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="card-soft">
                <div class="icon-box">⭐</div>
                <h5>Kualitas</h5>
                <p>Standar tinggi dalam setiap proses produksi dan layanan.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-soft">
                <div class="icon-box">🔐</div>
                <h5>Kepercayaan</h5>
                <p>Dibangun dari konsistensi dan transparansi.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-soft">
                <div class="icon-box">🌱</div>
                <h5>Berkelanjutan</h5>
                <p>Fokus pada pertumbuhan jangka panjang.</p>
            </div>
        </div>
    </div>

    <div class="text-center mb-4">
        <h2 class="section-title">Perjalanan Kami</h2>
        <p class="text-muted-custom">Tahapan perkembangan perusahaan</p>
    </div>
    <div class="mb-5">

        <div class="timeline-item">
            <div class="timeline-year">1922</div>
            <div class="timeline-content">
                <h6>Awal Berdiri</h6>
                <p class="mb-0 text-muted-custom">Memulai dengan komitmen pada kualitas.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">1971</div>
            <div class="timeline-content">
                <h6>Masuk Indonesia</h6>
                <p class="mb-0 text-muted-custom">Mulai dikenal luas oleh masyarakat Indonesia.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">Sekarang</div>
            <div class="timeline-content">
                <h6>Berkembang</h6>
                <p class="mb-0 text-muted-custom">Terus berinovasi mengikuti kebutuhan zaman.</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="info-box">
                <h5>Visi</h5>
                <p style="white-space: pre-line;">{{ $profile->vision ?? 'Menjadi bagian penting dalam kehidupan masyarakat melalui kualitas yang dipercaya.' }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <h5>Misi</h5>
                <p style="white-space: pre-line;">{{ $profile->mission ?? 'Menyediakan produk berkualitas dan terus berinovasi untuk masa depan yang lebih baik.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection