<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Frisian Flag</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0b2f6b 0%, #0d4aa3 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            transition: all 0.3s ease;
        }
        .btn-login {
            background: #0b2f6b;
            color: #ffffff;
            border-radius: 30px;
            padding: 12px;
            border: none;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #08234f;
            transform: translateY(-2px);
            color: white;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e5e7eb;
        }
        .form-control:focus {
            border-color: #0b2f6b;
            box-shadow: none;
        }
        .brand-logo {
            height: 60px;
            margin-bottom: 20px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" class="brand-logo" alt="Logo">
            <h4 class="fw-bold text-dark mb-1">Admin Panel</h4>
            <p class="text-muted small">Kelola informasi profile perusahaan Anda</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-secondary">Email Address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@frisianflag.com" required autocomplete="email" autofocus>
                @error('email')
                    <div class="invalid-feedback small d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label small fw-semibold text-secondary">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                @error('password')
                    <div class="invalid-feedback small d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                Sign In
            </button>
        </form>
    </div>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
