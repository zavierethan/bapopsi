@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Perolehan Medali</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Events</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Perolehan Medali</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="/perolehan-medali/create" class="btn btn-sm fw-bold btn-primary">
                        Input Perolehan Medali
                    </a>
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Table-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_o2sn">O2SN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_popda">POPDA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_popwill">POPWIL</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 overflow-x-auto">
                            <div class="tab-content" id="tabContent">
                                <!-- Tab O2SN -->
                                <div class="tab-pane fade show active" id="tab_o2sn">
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-between flex-wrap gap-3 w-100">
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Kategori Event</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="o2snEventCategory"
                                                        disabled>
                                                        <option value="1" selected="selected">O2SN</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Jenjang</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="jenjang">
                                                        <option value=" " selected="selected">Semua</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                    </select>
                                                </div>

                                                <div class="d-flex align-items-center fw-bold" id="filterKecamatan">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Kecamatan</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="kecamatan">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($kecamatan as $k)
                                                        <option value="{{$k->id}}">{{$k->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="d-flex align-items-center fw-bold" id="filterSubRayon">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Sub Rayon</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="subRayon">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($subRayon as $sr)
                                                        <option value="{{$sr->id}}">{{$sr->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Cabang Olahraga
                                                    </div>
                                                    <select
                                                        class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="cabang-olahraga">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}">{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);" class="btn btn-sm fw-bold btn-primary">
                                                        Export Hasil Pertandingan
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="position-relative my-1">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-customer-table-filter="search"
                                                    class="form-control w-250px ps-15" placeholder="Cari" />
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mt-2" id="O2SN">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nama Lengkap</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">Jenjang</th>
                                                <th class="ps-3">Kecamatan</th>
                                                <th class="ps-3">Sub Rayon</th>
                                                <th class="ps-3">Perolehan Medali (Juara)</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="tab_popda">
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-between flex-wrap gap-3 w-100">
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Kategori Event</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="popdaEventCategory"
                                                        disabled>
                                                        <option value="2" selected="selected">POPDA</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Cabang Olahraga
                                                    </div>
                                                    <select
                                                        class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="cabang-olahraga">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}">{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);" class="btn btn-sm fw-bold btn-primary">
                                                        Export Data Atlet
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="position-relative my-1">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-customer-table-filter="search"
                                                    class="form-control w-250px ps-15" placeholder="Cari" />
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="POPDA">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nama Lengkap</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">No. Kelas Pertandingan</th>
                                                <th class="ps-3">Asal Sekolah</th>
                                                <th class="ps-3">Perolehan Medali (Juara)</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="tab_popwill">
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-between flex-wrap gap-3 w-100">
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Kategori Event</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="popwilEventCategory"
                                                        disabled>
                                                        <option value="3" selected="selected">POPWIL</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">
                                                        Cabang Olahraga
                                                    </div>
                                                    <select
                                                        class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="cabang-olahraga">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}">{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);" class="btn btn-sm fw-bold btn-primary">
                                                        Export Data Atlet
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="position-relative my-1">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-customer-table-filter="search"
                                                    class="form-control w-250px ps-15" placeholder="Cari" />
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="POPWIL">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nama Lengkap</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">No. Kelas Pertandingan</th>
                                                <th class="ps-3">Asal Sekolah</th>
                                                <th class="ps-3 text-center">Perolehan Medali (Juara)</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
</div>
@endsection

@section('script')
<script>
let o2snTable = $("#O2SN").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{ route('athletes.get-lists') }}`,
        type: 'GET',
        data: function(d) {
            d.eventCategory = 1;
            d.jenjang = $('#jenjang').val();
        },
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [{
            data: 'nama_lengkap',
            name: 'nama_lengkap',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'jenjang',
            name: 'jenjang',
            className: 'ps-3'
        },
        {
            data: 'nama_kecamatan',
            name: 'nama_kecamatan',
            className: 'ps-3'
        },
        {
            data: 'nama_sub_rayon',
            name: 'nama_sub_rayon',
            className: 'ps-3 text-center'
        },
        {
            data: 'perolehan_medali',
            name: 'perolehan_medali',
            className: 'ps-3 text-center'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            className: 'text-center',
            render: function(data, type, row) {
                return `
                            <div class="flex justify-center">
                                <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            </div>
                        `;
            }
        }
    ]
});

$('#jenjang').on('change', function() {
    o2snTable.draw(); // Trigger DataTable redraw with updated filter values
});

$("#POPDA").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{ route('athletes.get-lists') }}`,
        type: 'GET',
        data: function(d) {
            d.eventCategory = 2;
        },
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [{
            data: 'nama_lengkap',
            name: 'nama_lengkap',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah',
            className: 'ps-3'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah',
            className: 'ps-3'
        },
        {
            data: 'perolehan_medali',
            name: 'perolehan_medali',
            className: 'ps-3 text-center'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            className: 'text-center',
            render: function(data, type, row) {
                return `
                            <div class="flex justify-center">
                                <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            </div>
                        `;
            }
        }
    ]
});

$("#POPWIL").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{ route('athletes.get-lists') }}`,
        type: 'GET',
        data: function(d) {
            d.eventCategory = 3;
        },
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [{
            data: 'nama_lengkap',
            name: 'nama_lengkap',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah',
            className: 'ps-3'
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah',
            className: 'ps-3'
        },
        {
            data: 'perolehan_medali',
            name: 'perolehan_medali',
            className: 'ps-3 text-center'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            className: 'text-center',
            render: function(data, type, row) {
                return `
                            <div class="flex justify-center">
                                <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            </div>
                        `;
            }
        }
    ]
});

$("#btn-export-popda").on('click', function() {
    let eventCategory = $("#popdaEventCategory").val();
    let tahun = $("#popdaTahun").val();
    $.ajax({
        url: `/perolehan-medali/export`,
        method: 'GET',
        data: {
            eventCategory: eventCategory,
            tahun: tahun
        },
        xhrFields: {
            responseType: 'blob' // important for binary data
        },
        success: function(data, status, xhr) {
            const blob = new Blob([data], { type: 'application/pdf' });
            const link = document.createElement('a');

            // ambil nama file dari header
            const filename = xhr.getResponseHeader('X-Filename') || 'Album Atlet.pdf';

            link.href = window.URL.createObjectURL(blob);
            link.download = filename;
            link.click();

            window.URL.revokeObjectURL(link.href);
        },
        error: function(xhr) {
            alert('Failed to download PDF.');
        }
    });
});

$("#btn-export-popwil").on('click', function() {
    let eventCategory = $("#popwilEventCategory").val();
    let tahun = $("#popwilTahun").val();
    $.ajax({
        url: `/perolehan-medali/export`,
        method: 'GET',
        data: {
            eventCategory: eventCategory,
            tahun: tahun
        },
        xhrFields: {
            responseType: 'blob' // important for binary data
        },
        success: function(data, status, xhr) {
            const blob = new Blob([data], { type: 'application/pdf' });
            const link = document.createElement('a');

            // ambil nama file dari header
            const filename = xhr.getResponseHeader('X-Filename') || 'Album Atlet.pdf';

            link.href = window.URL.createObjectURL(blob);
            link.download = filename;
            link.click();

            window.URL.revokeObjectURL(link.href);
        },
        error: function(xhr) {
            alert('Failed to download PDF.');
        }
    });
});
</script>
@endsection
