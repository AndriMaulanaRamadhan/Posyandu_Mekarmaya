<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Posyandu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
/* ================= BACKGROUND ================= */
body {
    margin: 0;
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(-45deg, #11998e, #38ef7d, #4facfe, #00f2fe);
    background-size: 400% 400%;
    animation: gradientMove 12s ease infinite;
    overflow: hidden;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ================= CARD ================= */
.card {
    width: 420px;
    padding: 40px 35px;
    border-radius: 20px;
    backdrop-filter: blur(20px);
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    color: white;
    animation: fadeUp 0.8s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(25px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ================= TITLE ================= */
.app-title {
    font-weight: 700;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: linear-gradient(90deg, #ffffff, #d4f1f9);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.app-subtitle {
    font-size: 13px;
    opacity: 0.9;
}

.title-line {
    width: 50px;
    height: 3px;
    margin: 8px auto;
    border-radius: 5px;
    background: linear-gradient(90deg, #ffffff, #00f2fe);
}

/* ================= FLOATING LABEL ================= */
.form-group {
    position: relative;
    margin-bottom: 25px;
}

.form-control {
    width: 100%;
    padding: 12px 10px;
    border: none;
    border-radius: 10px;
    outline: none;
    background: rgba(255,255,255,0.85);
    transition: 0.3s ease;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: 0 0 15px rgba(255,255,255,0.8);
    transform: scale(1.02);
}

.form-label {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 14px;
    color: #555;
    pointer-events: none;
    transition: 0.3s ease;
}

.form-control:focus + .form-label,
.form-control:not(:placeholder-shown) + .form-label {
    top: -9px;
    left: 8px;
    font-size: 11px;
    background: white;
    padding: 2px 6px;
    border-radius: 6px;
}

/* ================= BUTTON ================= */
.btn-primary {
    width: 100%;
    padding: 12px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    letter-spacing: 0.5px;
    background: linear-gradient(45deg, #ffffff, #e0f7fa);
    color: #11998e;
    transition: 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* ================= LINK ================= */
a {
    color: #fff;
    font-weight: 500;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow">

        <div class="text-center mb-4">
            <h3 class="app-title">Registrasi Posyandu</h3>
            <div class="title-line"></div>
            <p class="app-subtitle">
                Buat akun untuk mengelola data penduduk
            </p>
        </div>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
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
            Sudah punya akun? <a href="/login">Login di sini</a>
        </p>

    </div>
</div>

</body>
</html>