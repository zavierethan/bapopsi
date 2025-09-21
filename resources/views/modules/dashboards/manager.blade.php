@extends('layouts.main')
@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!-- Filter Wilayah, Jenis Medali, Cabang Olahraga, Export Excel -->
                <div class="row mb-4">
                    <div class="col-lg-9 mb-2 d-flex gap-2 flex-wrap">
                        <select class="form-select w-auto" id="filter-event">
                            <option value="">Semua Event</option>
                            @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
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
                        <button class="btn btn-success px-4" id="btnExportExcel"><i
                                class="fas fa-file-excel me-2"></i>Export
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
                    <div class="card-header">
                            <h3 class="card-title">Daftar Perolehan Medali Atlet</h3>
                    </div>
                    <div class="card-body pt-0 overflow-x-auto">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_groups_table">
                            <thead class="bg-primary text-white">
                                <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="ps-3">No</th>
                                    <th class="ps-3">Nama Atlet</th>
                                    <th class="ps-3">L/P</th>
                                    <th class="ps-3">Asal Sekolah</th>
                                    <th class="ps-3">Cabang Olahraga</th>
                                    <th class="ps-3">Nomor Cabang Olahraga</th>
                                    <th class="ps-3">Perolehan Medali</th>
                                </tr>
                            </thead>
                            <tbody id="athleteTableDashboard">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        data: function (d) {
            d.event_id = $('#filter-event').val();
            d.medal_type = $('#filter-medal').val();
            d.sport_id = $('#filter-sport').val();
        },
    },
    columns: [{
            data: null,
            name: 'nomor',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1 + '.';
            }
        },
        {
            data: 'nama_lengkap',
            name: 'nama_lengkap',
            className: 'ps-3'
        },
        {
            data: 'jenis_kelamin',
            name: 'jenis_kelamin',
            className: 'ps-3 text-center'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga'
        },
        {
            data: 'nomor_cabang_olahraga',
            name: 'nomor_cabang_olahraga'
        },
        {
            data: 'perolehan_medali',
            name: 'perolehan_medali',
            className: 'text-center'
        },
    ]
});

$(document).ready(function() {
    fetchSummary();
});

$('#filter-event, #filter-medal, #filter-sport').on('change', function() {
    fetchSummary();
    table.ajax.reload();
});

function fetchSummary() {
    $.ajax({
        url: "{{ route('dashboards.summary') }}",
        method: "GET",
        data: {
            event_id: $('#filter-event').val(),
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
