<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | Aplikasi Posyandu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    background: #f4f8fb;
    font-family: 'Poppins', sans-serif;
}

/* SIDEBAR */
.sidebar {
    height: 100vh;
    background: linear-gradient(180deg, #2c7be5, #4bc0c0);
    color: white;
    padding: 25px 15px;
    position: fixed;
    width: 240px;
}

.sidebar h4 {
    font-weight: 600;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 10px 12px;
    border-radius: 8px;
    margin-bottom: 8px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

/* MAIN */
.main {
    margin-left: 240px;
    padding: 20px 30px;
}

/* TOPBAR */
.topbar {
    background: white;
    padding: 12px 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* CARD STAT */
.stat-card {
    border: none;
    border-radius: 15px;
    color: white;
    padding: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

.card-blue { background: #2c7be5; }
.card-green { background: #28c76f; }
.card-pink { background: #ff6b9d; }
.card-cyan { background: #4bc0c0; }

.stat-icon {
    font-size: 30px;
    opacity: 0.8;
}

/* TABLE */
.table-card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.05);
}
</style>
</head>

<body>

<div class="sidebar">
    <h4>🍼 Posyandu</h4>
    <a href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <a href="#"><i class="bi bi-person me-2"></i> Data Bayi</a>
    <a href="#"><i class="bi bi-people me-2"></i> Data Balita</a>
    <a href="#"><i class="bi bi-heart-pulse me-2"></i> Ibu Hamil</a>
    <a href="#"><i class="bi bi-bar-chart me-2"></i> Laporan</a>
    <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
</div>

<div class="main">

    <div class="topbar">
        <div><strong>Dashboard</strong></div>
        <div>
            <i class="bi bi-bell me-3"></i>
            <span>Halo, Admin</span>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card card-blue">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Total Bayi</h5>
                        <h3>120</h3>
                    </div>
                    <div class="stat-icon"><i class="bi bi-emoji-smile"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card-green">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Total Balita</h5>
                        <h3>98</h3>
                    </div>
                    <div class="stat-icon"><i class="bi bi-person-hearts"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card-pink">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Ibu Hamil</h5>
                        <h3>45</h3>
                    </div>
                    <div class="stat-icon"><i class="bi bi-heart"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card-cyan">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>Data Bulan Ini</h5>
                        <h3>30</h3>
                    </div>
                    <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- GRAFIK -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="table-card">
                <h5 class="mb-3">Grafik Pertumbuhan Bayi</h5>
                <canvas id="growthChart"></canvas>
            </div>
        </div>
    </div>

    <!-- TABEL DATA -->
    <div class="table-card">
        <h5 class="mb-3">Data Terbaru</h5>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ahmad</td>
                    <td>12-01-2024</td>
                    <td>Laki-laki</td>
                    <td><span class="badge bg-success">Sehat</span></td>
                </tr>
                <tr>
                    <td>Siti</td>
                    <td>05-02-2024</td>
                    <td>Perempuan</td>
                    <td><span class="badge bg-warning text-dark">Kontrol</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script>
const ctx = document.getElementById('growthChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Jumlah Bayi',
            data: [20, 25, 30, 28, 35, 40],
            borderColor: '#2c7be5',
            backgroundColor: 'rgba(44,123,229,0.1)',
            fill: true,
            tension: 0.4
        }]
    }
});
</script>

</body>
</html>