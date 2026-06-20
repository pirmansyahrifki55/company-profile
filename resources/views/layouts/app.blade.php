<!DOCTYPE html>
@php
    $profile = \App\Models\CompanyProfile::first();
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Profile')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #0b2f6b;
        }

        .navbar {
            background: #0b2f6b;
            padding: 14px 0;
        }

        .navbar-brand img {
            height: 38px;
            margin-right: 10px;
        }

        .navbar-brand span {
            color: #ffffff;
            font-weight: 600;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 8px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff !important;
        }

        .btn-contact {
            border-radius: 30px;
            padding: 6px 18px;
            background: #ffffff;
            color: #0b2f6b;
            border: none;
        }

        .hero-section {
            background: #0d4aa3;
            border-radius: 22px;
            padding: 70px 40px;
            color: #ffffff;
            margin-top: 90px;
        }

        .content-wrapper {
            background: #ffffff;
            border-radius: 22px;
            margin-top: 25px;
            padding: 40px;
        }

        main {
            min-height: 100vh;
        }

        footer {
            background: #08234f;
            margin-top: 80px;
        }

        .footer-content {
            padding: 50px 0;
        }

        .footer-title {
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding: 14px 0;
            text-align: center;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/' . ($profile->logo ?? 'logo.png')) }}">
                <span>{{ $profile->name ?? 'Frisian Flag' }}</span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item"><a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">About</a></li>
                    <li class="nav-item"><a href="/produk" class="nav-link {{ Request::is('produk*') ? 'active' : '' }}">Produk</a></li>
                    <li class="nav-item"><a href="/galeri" class="nav-link {{ Request::is('galeri*') ? 'active' : '' }}">Galeri</a></li>
                    <li class="nav-item"><a href="/artikel" class="nav-link {{ Request::is('artikel*') ? 'active' : '' }}">Artikel</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>

                    <li class="nav-item">
                        <a href="/contact" class="btn btn-contact">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @php
        $title = 'Nutrisi Berkualitas untuk Indonesia';
        $desc = 'Menghadirkan produk berkualitas untuk mendukung kehidupan sehat.';
        if (Request::is('about')) {
            $title = $profile->about_title ?? 'Tentang Kami';
            $desc = 'Kami berkomitmen menghadirkan kualitas terbaik untuk masyarakat Indonesia.';
        } elseif (Request::is('contact')) {
            $title = 'Hubungi Kami';
            $desc = 'Kami siap membantu kebutuhan Anda kapan saja.';
        } elseif (Request::is('artikel')) {
            $title = 'Artikel & Informasi';
            $desc = 'Temukan wawasan dan informasi terbaru di sini.';
        } elseif (Request::is('produk')) {
            $title = 'Produk & Layanan';
            $desc = 'Menampilkan produk dan layanan unggulan kami.';
        } elseif (Request::is('galeri')) {
            $title = 'Galeri Perusahaan';
            $desc = 'Dokumentasi kegiatan dan galeri foto kami.';
        }
    @endphp

    <div class="container">
        <div class="hero-section">
            <h1 class="fw-bold mb-2">{{ $title }}</h1>
            <p class="mb-0">{{ $desc }}</p>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <h5 class="footer-title">{{ $profile->name ?? 'Frisian Flag' }}</h5>
                    <p class="footer-text">Kualitas terbaik untuk keluarga Indonesia.</p>
                </div>

                <div class="col-md-4 mb-3">
                    <h6 class="footer-title">Menu</h6>
                    <p class="footer-text"><a href="/" class="text-white text-decoration-none opacity-75">Home</a></p>
                    <p class="footer-text"><a href="/about" class="text-white text-decoration-none opacity-75">About</a></p>
                    <p class="footer-text"><a href="/produk" class="text-white text-decoration-none opacity-75">Produk</a></p>
                    <p class="footer-text"><a href="/galeri" class="text-white text-decoration-none opacity-75">Galeri</a></p>
                    <p class="footer-text"><a href="/artikel" class="text-white text-decoration-none opacity-75">Artikel</a></p>
                    <p class="footer-text"><a href="/contact" class="text-white text-decoration-none opacity-75">Contact</a></p>
                </div>

                <div class="col-md-4 mb-3">
                    <h6 class="footer-title">Kontak</h6>
                    <p class="footer-text">Email: {{ $profile->email ?? 'info@frisianflag.co.id' }}</p>
                    <p class="footer-text">Telepon: {{ $profile->phone ?? '021-123456' }}</p>
                    <p class="footer-text">Alamat: {{ $profile->address ?? 'Jakarta, Indonesia' }}</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2026 {{ $profile->name ?? 'Frisian Flag Indonesia' }}
        </div>
    </footer>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>