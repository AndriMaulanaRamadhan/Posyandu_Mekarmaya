<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | Aplikasi Posyandu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

<div class="overlay-glow"></div>

<div id="sakura-container"></div>

<div class="card">
    <div class="text-center mb-4">
        <h3 class="app-title">🍼 Registrasi Posyandu</h3>
        <div class="title-line"></div>
            <p class="text-muted">
                Buat akun untuk mengelola data ibu & balita
            </p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder=" " required>
            <label class="form-label">Nama Lengkap</label>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder=" " required>
            <label class="form-label">Email</label>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder=" " required>
            <label class="form-label">Password</label>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder=" " required>
            <label class="form-label">Konfirmasi Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
    <p class="text-center mt-3">
        Sudah punya akun?
        <a href="/login">Login di sini</a>
    </p>
</div>

<script src="{{ asset('js/register.js') }}"></script>

</body>
</html>