<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Frisian Flag</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
        }
        .wrapper {
            display: flex;
            align-items: stretch;
        }
        #sidebar {
            min-width: 260px;
            max-width: 260px;
            background: #08234f;
            color: #fff;
            min-height: 100vh;
            transition: all 0.3s;
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: #0b2f6b;
            text-align: center;
        }
        #sidebar .sidebar-header img {
            height: 40px;
            margin-bottom: 10px;
            object-fit: contain;
        }
        #sidebar ul.components {
            padding: 20px 0;
        }
        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 0.95rem;
            display: block;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        #sidebar ul li a:hover, #sidebar ul li.active > a {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #0d6efd;
        }
        #content {
            width: 100%;
            padding: 30px;
            min-height: 100vh;
        }
        .navbar-admin {
            background: #ffffff;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            background: #ffffff;
            margin-bottom: 25px;
        }
        .btn-custom {
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <h5 class="fw-bold mb-0">Frisian Flag</h5>
                <small class="opacity-75">Admin Panel</small>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                </li>
                <li class="{{ Request::is('admin/profil*') ? 'active' : '' }}">
                    <a href="{{ route('admin.profil.edit') }}">🏢 Kelola Profil</a>
                </li>
                <li class="{{ Request::is('admin/produk*') ? 'active' : '' }}">
                    <a href="{{ route('admin.produk.index') }}">🥛 Kelola Produk</a>
                </li>
                <li class="{{ Request::is('admin/galeri*') ? 'active' : '' }}">
                    <a href="{{ route('admin.galeri.index') }}">🖼️ Kelola Galeri</a>
                </li>
                <li class="{{ Request::is('admin/artikel*') ? 'active' : '' }}">
                    <a href="{{ route('admin.artikel.index') }}">📰 Kelola Artikel</a>
                </li>
                <li>
                    <a href="/" target="_blank">🌐 Lihat Website</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Topbar -->
            <div class="navbar-admin d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">@yield('title', 'Admin Panel')</h5>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle rounded-pill px-3" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        🧑‍💼 {{ Auth::user()->name ?? 'Administrator' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userMenu">
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content Area -->
            <div class="container-fluid p-0">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
