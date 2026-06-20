@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<style>
    .page-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-title h1 {
        font-weight: 700;
        color: #0b3c8c;
    }

    .page-title p {
        color: #6b7280;
        max-width: 520px;
        margin: auto;
    }

    .contact-box {
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #e6eaf0;
    }

    .contact-left {
        background: #0b3c8c;
        color: #ffffff;
        padding: 40px;
    }

    .contact-left h4 {
        font-weight: 600;
        margin-bottom: 20px;
    }

    .contact-item {
        margin-bottom: 18px;
    }

    .contact-item small {
        color: rgba(255,255,255,0.7);
    }

    .contact-item div {
        font-weight: 500;
    }

    .contact-right {
        padding: 40px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #e5e7eb;
    }

    .form-control:focus {
        border-color: #0b3c8c;
        box-shadow: none;
    }

    .btn-send {
        background: #0b3c8c;
        color: #ffffff;
        border-radius: 30px;
        padding: 12px;
        border: none;
        width: 100%;
    }

    .btn-send:hover {
        background: #082c66;
    }

    .map-box {
        margin-top: 30px;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid #e6eaf0;
        max-width: 850px;
        margin-left: auto;
        margin-right: auto;
    }

    .map-box iframe {
        width: 100%;
        height: 250px;
        border: 0;
    }
</style>

<div class="container py-5">

    <div class="page-title">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu Anda untuk informasi, pertanyaan, maupun kerja sama.</p>
    </div>

    <div class="contact-box">
        <div class="row g-0">

            <div class="col-md-5 contact-left">

                <h4>Informasi Kontak</h4>

                <div class="contact-item">
                    <small>Email</small>
                    <div>{{ $profile->email ?? 'info@frisianflag.co.id' }}</div>
                </div>

                <div class="contact-item">
                    <small>Telepon</small>
                    <div>{{ $profile->phone ?? '021-123456' }}</div>
                </div>

                <div class="contact-item">
                    <small>Lokasi</small>
                    <div>{{ $profile->address ?? 'Jakarta, Indonesia' }}</div>
                </div>

                <div class="contact-item">
                    <small>Layanan</small>
                    <div>Customer service & informasi produk</div>
                </div>

            </div>

            <div class="col-md-7 contact-right">

                <h5 class="fw-semibold mb-4">Kirim Pesan</h5>

                <form>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subjek">
                    </div>

                    <div class="mb-3">
                        <textarea rows="4" class="form-control" placeholder="Pesan"></textarea>
                    </div>

                    <button class="btn-send">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>
    </div>

    <div class="map-box mt-4">
        <iframe src="https://www.google.com/maps?q=Jakarta&output=embed"></iframe>
    </div>

</div>

@endsection