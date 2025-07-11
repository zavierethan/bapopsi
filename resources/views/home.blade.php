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
            <select class="form-select w-auto" id="filter-kecamatan">
                <option value="">Semua Wilayah</option>
                @foreach($kecamatan as $kec)
                <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                @endforeach
            </select>
            <select class="form-select w-auto" id="filter-medal">
                <option value="">Semua Medali</option>
                <option value="emas">Emas</option>
                <option value="perak">Perak</option>
                <option value="perunggu">Perunggu</option>
            </select>
            <select class="form-select w-auto" id="filter-sport">
                <option value="">Semua Cabang</option>
                @foreach($sports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 mb-2 text-end">
            <button class="btn btn-success px-4" id="btnExportExcel"><i class="fas fa-file-excel me-2"></i>Export
                Excel</button>
        </div>
    </div>
    <!-- Statistik Card -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon blue mx-auto mb-2"><i class="fas fa-users"></i></div>
                <div class="fw-bold fs-2" id="total-atlet">0</div>
                <div class="text-muted">Atlet Terdaftar</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon orange mx-auto mb-2"><i class="fas fa-medal"></i></div>
                <div class="fw-bold fs-2" id="total-medali">0</div>
                <div class="text-muted">Total Medali</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon green mx-auto mb-2"><i class="fas fa-basketball-ball"></i></div>
                <div class="fw-bold fs-2" id="total-cabang">0</div>
                <div class="text-muted">Cabang Olahraga</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-card rounded-card p-3">
                <div class="stat-icon purple mx-auto mb-2"><i class="fas fa-school"></i></div>
                <div class="fw-bold fs-2">0</div>
                <div class="text-muted">Sekolah</div>
            </div>
        </div>
    </div>
    <div class="card shadow-card rounded-card p-4 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Data Atlet</h5>
            <div class="d-flex gap-2">
                <select class="form-select" id="sport-filter">
                    <option value="">Semua Cabang</option>
                    @foreach($sports as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle" id="kt_groups_table">
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

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
let table = $("#kt_groups_table").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{ route('dashboards.get-lists') }}`,
        type: 'GET',
        dataSrc: 'data',
        data: {
                sport_id: $('#sport-filter').val()
        },
    },
    columns: [{
            data: null,
            name: 'nomor',
            orderable: false,
            searchable: false,
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'nama_lengkap',
            name: 'nama_lengkap'
        },
        {
            data: 'medal_type',
            name: 'medal_type'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga'
        },
    ]
});

$('#sport-filter').on('change', function () {
    table.ajax.reload();
});

$(document).ready(function() {
    fetchSummary();
});

$('#filter-kecamatan, #filter-medal, #filter-sport').on('change', function() {
    fetchSummary();
});

function fetchSummary() {
    $.ajax({
        url: "{{ route('dashboards.summary') }}",
        method: "GET",
        data: {
            kecamatan_id: $('#filter-kecamatan').val(),
            medal_type: $('#filter-medal').val(),
            sport_id: $('#filter-sport').val()
        },
        success: function(response) {
            if (response.success) {
                $('#total-atlet').text(response.data.total_atlet);
                $('#total-medali').text(response.data.total_medali);
                $('#total-cabang').text(response.data.total_cabang_olahraga);
            }
        },
        error: function(xhr) {
            console.error(xhr);
        }
    });
}
</script>
@endsection
