@extends('layouts.main')

@section('css')
<style>
.highcharts-data-table table {
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}
</style>
@endsection

@section('main-content')
<div class="container py-5">
    <!-- Filter Wilayah, Jenis Medali, Cabang Olahraga, Export Excel -->
    <div class="row mb-4">
        <div class="col-lg-9 mb-2 d-flex gap-2 flex-wrap">
            <select class="form-select w-auto" id="filterWilayah">
                <option value="">Semua Wilayah</option>
                <option>Bandung</option>
                <option>Sumedang</option>
                <option>Cimahi</option>
            </select>
            <select class="form-select w-auto" id="filterMedali">
                <option value="">Semua Medali</option>
                <option>Emas</option>
                <option>Perak</option>
                <option>Perunggu</option>
            </select>
            <select class="form-select w-auto" id="filterCabang">
                <option value="">Semua Cabang</option>
                <option>Badminton</option>
                <option>Basket</option>
                <option>Voli</option>
                <option>Sepak Bola</option>
                <option>Renang</option>
                <option>Atletik</option>
            </select>
        </div>
        <div class="col-lg-3 mb-2 text-end">
            <button class="btn btn-success px-4" id="btnExportExcel"><i class="fas fa-file-excel me-2"></i>Export Excel</button>
        </div>
    </div>
    <!-- Statistik Card -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon blue mx-auto mb-2"><i class="fas fa-users"></i></div>
                <div class="fw-bold fs-2">1,850</div>
                <div class="text-muted">Atlet Terdaftar</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon orange mx-auto mb-2"><i class="fas fa-medal"></i></div>
                <div class="fw-bold fs-2">240</div>
                <div class="text-muted">Total Medali</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon green mx-auto mb-2"><i class="fas fa-basketball-ball"></i></div>
                <div class="fw-bold fs-2">24</div>
                <div class="text-muted">Cabang Olahraga</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon purple mx-auto mb-2"><i class="fas fa-school"></i></div>
                <div class="fw-bold fs-2">130</div>
                <div class="text-muted">Sekolah</div>
            </div>
        </div>
    </div>
    <!-- Grafik -->
    <div class="row mb-4">
        <div class="col-lg-7 mb-3">
            <div class="card shadow-card rounded-card p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="stat-icon orange me-2"><i class="fas fa-chart-bar"></i></div>
                    <div>
                        <div class="fw-bold fs-5 mb-0">Grafik Batang</div>
                        <div class="text-muted small">Perbandingan medali per cabang</div>
                    </div>
                </div>
                <canvas id="barChartDashboard" height="220"></canvas>
            </div>
        </div>
        <div class="col-lg-5 mb-3">
            <div class="card shadow-card rounded-card p-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="stat-icon blue me-2"><i class="fas fa-chart-pie"></i></div>
                    <div>
                        <div class="fw-bold fs-5 mb-0">Grafik Lingkaran</div>
                        <div class="text-muted small">Distribusi total medali</div>
                    </div>
                </div>
                <canvas id="pieChartDashboard" height="220"></canvas>
            </div>
        </div>
    </div>
    <!-- Tabel Data Atlet -->
    <div class="card shadow-card rounded-card p-4 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Data Atlet</h5>
            <div class="d-flex gap-2">
                <select class="form-select" id="sportFilterDashboard">
                    <option value="">Semua Cabang</option>
                    <option>Badminton</option>
                    <option>Basket</option>
                    <option>Voli</option>
                    <option>Sepak Bola</option>
                    <option>Renang</option>
                    <option>Atletik</option>
                </select>
                <select class="form-select" id="schoolFilterDashboard">
                    <option value="">Semua Sekolah</option>
                    <option>SMA 1 Bantul</option>
                    <option>SMA 2 Sewon</option>
                    <option>SMA 3 Kasihan</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Atlet</th>
                        <th>Prestasi</th>
                        <th>Sekolah</th>
                        <th>Cabang Olahraga</th>
                    </tr>
                </thead>
                <tbody id="athleteTableDashboard">
                    <tr>
                        <td>1</td>
                        <td class="fw-semibold">Rizky Maulana</td>
                        <td>Emas</td>
                        <td>SMA 1 Bantul</td>
                        <td>Badminton</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="fw-semibold">Dewi Lestari</td>
                        <td>Perak</td>
                        <td>SMA 2 Sewon</td>
                        <td>Basket</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="fw-semibold">Andi Saputra</td>
                        <td>Perunggu</td>
                        <td>SMA 3 Kasihan</td>
                        <td>Voli</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Data dummy untuk grafik batang
const barDataDashboard = {
    labels: ['Badminton', 'Basket', 'Voli', 'Sepak Bola', 'Renang', 'Atletik'],
    datasets: [
        {
            label: 'Emas',
            backgroundColor: '#FFD600',
            data: [12, 6, 8, 4, 7, 15],
        },
        {
            label: 'Perak',
            backgroundColor: '#B0B0B0',
            data: [8, 9, 11, 6, 10, 12],
        },
        {
            label: 'Perunggu',
            backgroundColor: '#FF9800',
            data: [15, 12, 7, 8, 9, 18],
        },
    ]
};
const barChartDashboard = new Chart(document.getElementById('barChartDashboard'), {
    type: 'bar',
    data: barDataDashboard,
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: { display: false }
        },
        scales: {
            x: { stacked: true },
            y: { stacked: true }
        }
    }
});
// Data dummy untuk grafik lingkaran
const pieDataDashboard = {
    labels: ['Emas', 'Perak', 'Perunggu'],
    datasets: [{
        data: [45, 46, 60],
        backgroundColor: ['#FFD600', '#B0B0B0', '#FF9800'],
        borderColor: '#fff',
        borderWidth: 2,
    }]
};
const pieChartDashboard = new Chart(document.getElementById('pieChartDashboard'), {
    type: 'doughnut',
    data: pieDataDashboard,
    options: {
        cutout: '70%',
        plugins: {
            legend: { display: true, position: 'bottom' },
            tooltip: { enabled: true }
        }
    }
});
</script>
@endsection
