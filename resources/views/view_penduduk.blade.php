@extends('layout')
@section('title', 'Dashboard Posyandu')

@section('content')

<style>
body {
    background: linear-gradient(135deg, #ffe6f0, #f0fff7);
    min-height: 100vh;
}

/* ===== Sidebar ===== */
.sidebar {
    width: 260px;
    height: 100vh;
    position: fixed;
    left: -260px;
    top: 0;
    background: linear-gradient(180deg, #ff5fa2, #ff8cc6);
    color: white;
    transition: 0.4s ease;
    padding-top: 30px;
    z-index: 1000;
    box-shadow: 5px 0 25px rgba(0,0,0,0.1);
}

.sidebar.active {
    left: 0;
}

.sidebar h4 {
    font-weight: 700;
    letter-spacing: 1px;
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 12px 30px;
    display: block;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.25);
    padding-left: 40px;
}

/* ===== Content ===== */
.content-wrapper {
    transition: 0.4s ease;
    padding: 30px;
}

.content-shift {
    margin-left: 260px;
}

.toggle-btn {
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 1100;
    border-radius: 50px;
}

/* ===== Header ===== */
.header-title {
    font-weight: 700;
    color: #ff4d94;
}

.subtitle {
    color: #888;
}

/* ===== Card Statistik ===== */
.stat-card {
    border-radius: 20px;
    padding: 25px;
    color: white;
    transition: 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.bg-pink { background: linear-gradient(45deg, #ff5fa2, #ff9ec7); }
.bg-green { background: linear-gradient(45deg, #38c172, #6ee7b7); }
.bg-blue { background: linear-gradient(45deg, #4facfe, #00f2fe); }

/* ===== Table ===== */
.table thead {
    background: #ff5fa2;
    color: white;
}

.table tbody tr:hover {
    background-color: #fff0f6;
    transition: 0.2s;
}

/* Fade animation */
.fade-in {
    animation: fadeUp 0.8s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px);}
    to { opacity: 1; transform: translateY(0);}
}
</style>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h4 class="text-center">POSYANDU</h4>
    <hr class="bg-light">
    <a href="#">Dashboard</a>
    <a href="#">Data Ibu Hamil</a>
    <a href="#">Data Balita</a>
    <a href="#">Laporan Kesehatan</a>
</div>

<button class="btn btn-light shadow toggle-btn" onclick="toggleSidebar()">
    ☰
</button>

<div id="mainContent" class="content-wrapper fade-in">

    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="header-title">Dashboard Posyandu</h2>
        <p class="subtitle">Pendataan Ibu Hamil & Balita Secara Digital</p>
    </div>

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card bg-pink text-center">
                <h5>Total Data</h5>
                <h2>{{ $dataPenduduk->total() }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-green text-center">
                <h5>Ibu Hamil</h5>
                <h2>{{ $dataPenduduk->where('jenis_kelamin','Perempuan')->count() }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card bg-blue text-center">
                <h5>Balita</h5>
                <h2>{{ $dataPenduduk->where('jenis_kelamin','Laki-laki')->count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Card Tabel -->
    <div class="card shadow-lg border-0 rounded-4 p-4">

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('tambah_penduduk.create') }}" class="btn btn-success">
                Tambah Data
            </a>

            <input type="text" id="searchInput"
                   class="form-control w-25"
                   placeholder="Cari nama...">
        </div>

        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($dataPenduduk as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="nama">{{ $p->nama }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>
                            <a href="{{ route('view_penduduk.edit',$p->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $dataPenduduk->links() }}
        </div>

    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("mainContent").classList.toggle("content-shift");
}

document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tableBody tr");

    rows.forEach(row => {
        let nama = row.querySelector(".nama").textContent.toLowerCase();
        row.style.display = nama.includes(value) ? "" : "none";
    });
});
</script>

@endsection