<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Aplikasi Posyandu</title>

<!-- css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="overlay-glow"></div>

<div id="sakura-container"></div>

<div class="login-card">
    <div class="login-header">
        <h4>Aplikasi Posyandu</h4>
        <small>Pendataan Ibu Hamil & Balita</small>
    </div>
    <div class="login-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 position-relative">
                <input type="password" id="password" name="password" class="form-control password-input" placeholder="Password" required>
                <button type="button" class="toggle-password" id="togglePassword">
                    <i class="bi bi-eye-fill"></i>
                </button>
            </div>
            <button type="submit" class="btn btn-login w-100">
                Login
            </button>
        </form>
        <p class="text-center mt-4">
            Belum punya akun?
            <a href="/register" style="color:#ff4d94;">Daftar sekarang</a>
        </p>
    </div>
</div>

<!-- js -->
<script src="{{ asset('js/login.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>