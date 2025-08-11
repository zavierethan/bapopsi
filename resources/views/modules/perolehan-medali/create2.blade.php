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
                            <a href="#" class="text-muted text-hover-primary">Events</a>
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
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Create</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

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
                            </div>
                        </div>
                        <div class="card-body pt-0 overflow-x-auto">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mt-2" id="O2SN">
                                <thead class="bg-primary text-white">
                                    <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="ps-3">No</th>
                                        <th class="ps-3">Nama Lengkap</th>
                                        <th class="ps-3">Cabang Olahraga</th>
                                        <th class="ps-3">Event</th>
                                        <th class="ps-3">Jenjang</th>
                                        <th class="ps-3">Kecamatan</th>
                                        <th class="ps-3">Sub Rayon</th>
                                        <th class="ps-3">Perolehan Medali (Juara)</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-700">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$("#O2SN").DataTable({
    processing: true,
    serverSide: true,
    paging: false,
    pageLength: 10,
    info: false,
    ajax: {
        url: `{{ route('athletes.get-lists') }}`,
        type: 'GET',
        dataSrc: 'data'
    },
    columns: [
        {
            data: null,
            name: 'no',
            className: 'ps-3',
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1 + '.';
            }
        },
        {
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
            data: 'nama_event',
            name: 'nama_event',
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
            data: null,
            name: 'perolehan_medali',
            orderable: false,
            searchable: false,
            className: 'ps-3',
            render: function (data, type, row) {
                return `
                    <select class="form-select form-select-sm perolehan-medali" data-id="${row.id}">
                        <option value="">Pilih Medali</option>
                        <option value="1">Emas (1)</option>
                        <option value="2">Perak (2)</option>
                        <option value="3">Perunggu (3)</option>
                    </select>
                `;
            }
        }
    ]
});
</script>
@endsection
