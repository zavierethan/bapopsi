@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Event Registrations</h1>
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
                        <li class="breadcrumb-item text-muted">Registrations</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    @if(Auth::user()->group_id == 1)
                    <a href="{{route('event-registrations.create')}}" class="btn btn-sm fw-bold btn-primary">New</a>
                    @else
                        @if(Auth::user()->group_id == 15 || Auth::user()->group_id == 16)
                        <a href="{{route('event-registrations.create')}}" class="btn btn-sm fw-bold btn-primary">New</a>
                        @endif
                    @endif

                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
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

                                @if(Auth::user()->group_id == 1)
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_o2sn">O2SN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_popsi">POPDA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_popwill">POPWIL</a>
                                    </li>
                                @else
                                    @if(Auth::user()->group_id == 14 || Auth::user()->group_id == 15)
                                    <li class="nav-item">
                                        <a class="nav-link {{ Auth::user()->group_id == 14 || Auth::user()->group_id == 15 ? 'active' : '' }}" data-bs-toggle="tab" href="#tab_o2sn">O2SN</a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->group_id == 15)
                                    <li class="nav-item">
                                        <a class="nav-link {{ Auth::user()->group_id == 16 ? 'active' : '' }}" data-bs-toggle="tab" href="#tab_popsi">POPDA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_popwill">POPWIL</a>
                                    </li>
                                    @endif
                                @endif
                                </ul>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0 overflow-x-auto">
                            <div class="tab-content" id="tabContent">
                                <!-- Tab O2SN -->
                                <div class="tab-pane fade {{ Auth::user()->group_id == 14 || Auth::user()->group_id == 15 ? 'show active' : '' }}" id="tab_o2sn">
                                    <div class="card-toolbar mb-2">
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
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Tahun</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="tahun">
                                                        @foreach(range(date('Y'), date('Y') - 10, -1) as $year)
                                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                                        @endforeach
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
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Kecamatan</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="kecamatan">
                                                        <option value=" " selected="selected">Semua</option>
                                                        <option value="">-- Pilih Kecamatan --</option>
                                                        @foreach($kecamatan as $k)
                                                            <option value="{{$k->id}}">{{$k->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold" id="filterSubRayon">
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Sub Rayon</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="sub-rayon">
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
                                                        data-control="select2" data-hide-search="false"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="cabang-olahraga">
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}">{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm fw-bold btn-primary" id="btn-export-o2sn">
                                                        Export Album Atlet
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="O2SN">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nomor Registrasi</th>
                                                <th class="ps-3">Nama Event</th>
                                                <th class="ps-3">Tahun</th>
                                                <th class="ps-3">Jenjang</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">Tanggal Registrasi</th>
                                                <th class="ps-3">Total Atlet</th>
                                                <th class="ps-3">Total Reject</th>
                                                <th class="ps-3">Total Approve</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data O2SN di sini --}}
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Tab POPSI -->
                                <div class="tab-pane fade {{ Auth::user()->group_id == 16 ? 'show active' : '' }}" id="tab_popsi">
                                    <div class="card-toolbar mb-2">
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
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Tahun</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="popdaTahun">
                                                        @foreach(range(date('Y'), date('Y') - 10, -1) as $year)
                                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
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
                                                        data-placeholder="Select an option" id="popdaCaborId" disabled>
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}" <?php echo (Auth::user()->group_id == 16 && Auth::user()->cabor_id == $co->id) ? 'selected' : '';?>>{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm fw-bold btn-primary" id="btn-export-popda">
                                                        Export Album Atlet
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="position-relative my-1">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15" placeholder="Cari"/>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="POPDA">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nama Event</th>
                                                <th class="ps-3">Tahun</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">Tanggal Registrasi</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data POPSI di sini --}}
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Tab POPWILL -->
                                <div class="tab-pane fade" id="tab_popwill">
                                    <div class="card-toolbar mb-2">
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
                                                    <div class="text-gray-500 fs-7 me-2" style="white-space: nowrap;">Tahun</div>
                                                    <select
                                                        class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                        data-control="select2" data-hide-search="true"
                                                        data-dropdown-css-class="w-150px"
                                                        data-placeholder="Select an option" id="popwilTahun">
                                                        @foreach(range(date('Y'), date('Y') - 10, -1) as $year)
                                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
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
                                                        data-placeholder="Select an option" id="popwilCaborId" disabled>
                                                        <option value=" " selected="selected">Semua</option>
                                                        @foreach($cabangOlahraga as $co)
                                                        <option value="{{$co->id}}" <?php echo (Auth::user()->group_id == 16 && Auth::user()->cabor_id == $co->id) ? 'selected' : '';?>>{{$co->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm fw-bold btn-primary" id="btn-export-popwil">
                                                        Export Album Atlet
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="position-relative my-1">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15" placeholder="Cari"/>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="POPWIL">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="ps-3">Nama Event</th>
                                                <th class="ps-3">Tahun</th>
                                                <th class="ps-3">Cabang Olahraga</th>
                                                <th class="ps-3">Tanggal Registrasi</th>
                                                <th class="ps-3 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data POPWILL di sini --}}
                                        </tbody>
                                    </table>
                                </div>
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    $("#filterKecamatan").hide();
    $("#filterSubRayon").hide();

    // Set initial relationship of jenjang filters
    $("#jenjang").trigger('change');
});

var o2snTable = $("#O2SN").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{route('event-registrations.get-lists')}}`,
        type: 'GET',
        data: function (d) {
            d.eventCategory = 1;
            d.tahun = $('#tahun').val();
            d.jenjang = $('#jenjang').val();
            d.kecamatan = $('#filterKecamatan').is(':visible') ? $('#kecamatan').val() : ' ';
            d.subRayon = $('#filterSubRayon').is(':visible') ? $('#sub-rayon').val() : ' ';
            d.cabangOlahraga = $('#cabang-olahraga').val();
        },
        error: function(xhr, error, thrown) {
            // Check if error is due to large dataset
            if (xhr.status === 413) {
                alert('Data terlalu besar. Harap tambahkan filter untuk mengurangi jumlah data.');
            }
        },
        dataSrc: function (json) {
            // Check if data is too large
            if (json.data && json.data.length > 1000) {
                alert('Data terlalu besar. Harap tambahkan filter untuk mengurangi jumlah data.');
            }
            return json.data;
        }
    },
    columns: [
        {
            data: 'register_number',
            name: 'register_number',
            className: 'ps-3'
        },
        {
            data: 'name',
            name: 'name',
            className: 'ps-3'
        },
        {
            data: 'year',
            name: 'year',
            className: 'ps-3'
        },
        {
            data: 'jenjang',
            name: 'jenjang',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'created_at_formatted',
            name: 'created_at_formatted',
            className: 'ps-3'
        },
        {
            data: 'total_atlet',
            name: 'total_atlet',
            className: 'text-center'
        },
        {
            data: 'total_reject',
            name: 'total_reject',
            className: 'text-center'
        },
        {
            data: 'total_approve',
            name: 'total_approve',
            className: 'text-center'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                if (row.approval_status === 'Waiting Approval') {
                    return `
                            <div class="text-center">
                                <a href="/event-registrations/detail/${row.id}" class="btn btn-sm btn-primary btn-active-light-primary w-80" data-id="${row.id}">Detail</a>
                            </div>
                        `;
                } else {
                    return `<div class="text-center text-muted">-</div>`;
                }
            }
        }
    ]
});

function refreshO2SNTable() {
    if (o2snTable) {
        o2snTable.draw();
    }
}

$("#jenjang, #cabang-olahraga, #tahun, #kecamatan, #sub-rayon").on('change', function() {
    refreshO2SNTable();
});

$("#POPDA").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{route('event-registrations.get-lists')}}`,
        type: 'GET',
        data: function (d) {
            d.eventCategory = 2;
            d.tahun = $('#popdaTahun').val();
            d.cabangOlahraga = $('#popdaCaborId').val();
        },
        dataSrc: function (json) {
            return json.data;
        }
    },
    columns: [
        {
            data: 'name',
            name: 'name',
            className: 'ps-3'
        },
        {
            data: 'year',
            name: 'year',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'created_at_formatted',
            name: 'created_at_formatted',
            className: 'ps-3'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                if (row.approval_status === 'Waiting Approval') {
                    return `
                            <div class="text-center">
                                <a href="/event-registrations/detail/${row.id}" class="btn btn-sm btn-primary btn-active-light-primary w-80" data-id="${row.id}">Detail</a>
                            </div>
                        `;
                } else {
                    return `<div class="text-center text-muted">-</div>`;
                }
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
        url: `{{route('event-registrations.get-lists')}}`,
        type: 'GET',
        data: function (d) {
            d.eventCategory = 3;
            d.tahun = $('#popwilTahun').val();
            d.cabangOlahraga = $('#popwilCaborId').val();
        },
        dataSrc: function (json) {
            return json.data;
        }
    },
    columns: [
        {
            data: 'name',
            name: 'name',
            className: 'ps-3'
        },
        {
            data: 'year',
            name: 'year',
            className: 'ps-3'
        },
        {
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: 'created_at_formatted',
            name: 'created_at_formatted',
            className: 'ps-3'
        },
        {
            data: null,
            name: 'action',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                if (row.approval_status === 'Waiting Approval') {
                    return `
                            <div class="text-center">
                                <a href="/event-registrations/detail/${row.id}" class="btn btn-sm btn-primary btn-active-light-primary w-80" data-id="${row.id}">Detail</a>
                            </div>
                        `;
                } else {
                    return `<div class="text-center text-muted">-</div>`;
                }
            }
        }
    ]
});

$("#btn-export-o2sn").on('click', function() {
    let tahun = $("#tahun").val();
    let jenjang = $("#jenjang").val();
    let cabor = $("#cabang-olahraga").val();
    let kecamatan = $("#kecamatan").val();
    let subRayon = $("#sub-rayon").val();
    $.ajax({
        url: `/event-registrations/export`,
        method: 'GET',
        data: {
            eventCategory: 1,
            tahun: tahun,
            jenjang: jenjang,
            cabor: cabor,
            kecamatan: kecamatan,
            subRayon: subRayon
        },
        xhrFields: {
            responseType: 'blob' // important for binary data
        },
        beforeSend: function() {
            // Tampilkan loader dan disable button
            $('#btn-export-o2sn').prop('disabled', true);
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

            // Tampilkan success message
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'File berhasil diunduh: ' + filename,
                    confirmButtonText: 'OK',
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        },
        error: function(xhr) {
            let errorMessage = 'Gagal mengunduh PDF.';

            // Cek jika ada error message dari response
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            } else if (xhr.statusText) {
                errorMessage = 'Error: ' + xhr.statusText;
            }

            // Gunakan sweet alert jika tersedia, jika tidak gunakan alert biasa
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            } else {
                alert(errorMessage);
            }
        },
        complete: function() {
            // Sembunyikan loader dan enable button
            $('#btn-export-o2sn').prop('disabled', false);
        }
    });
});

$("#btn-export-popda").on('click', function() {
    let eventCategory = $("#popdaEventCategory").val();
    let tahun = $("#popdaTahun").val();
    $.ajax({
        url: `/event-registrations/export`,
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
        url: `/event-registrations/export`,
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


$("#jenjang").on("change", function() {
    const value = $(this).val().trim();

    if (value === 'SD') {
        $("#filterKecamatan").show();
        $("#filterSubRayon").hide();
        $("#subRayon").val(' ').trigger('change');
    } else if (value === 'SMP') {
        $("#filterKecamatan").hide();
        $("#filterSubRayon").show();
        $("#kecamatan").val(' ').trigger('change');
    } else {
        $("#filterKecamatan").hide();
        $("#filterSubRayon").hide();
        $("#kecamatan").val(' ').trigger('change');
        $("#subRayon").val(' ').trigger('change');
    }

    refreshO2SNTable();
});



</script>
@endsection
