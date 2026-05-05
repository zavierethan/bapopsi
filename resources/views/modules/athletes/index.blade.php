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
                        Atlet</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Data Atlet</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Atlet</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <!-- <a href="{{route('athletes.create')}}" class="btn btn-sm fw-bold btn-primary">New</a> -->
                    <!--end::Primary button-->
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
                                <!--begin::Tabs-->
                                <ul class="nav nav-tabs nav-line-tabs mb-0" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-waiting" data-bs-toggle="tab" href="#tab-waiting-pane" role="tab" aria-controls="tab-waiting-pane" aria-selected="true">
                                            <span class="d-flex align-items-center gap-2">
                                                <span class="fs-7 fw-bold">O2SN(SD)</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-processed" data-bs-toggle="tab" href="#tab-processed-pane" role="tab" aria-controls="tab-processed-pane" aria-selected="false">
                                            <span class="d-flex align-items-center gap-2">
                                                <span class="fs-7 fw-bold">O2SN(SMP)</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Tabs-->
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 overflow-x-auto">
                            <!--begin::Tab content-->
                            <div class="tab-content" id="athletesTabContent">
                                <!-- Tab Menunggu Persetujuan -->
                                <div class="tab-pane fade show active" id="tab-waiting-pane" role="tabpanel" aria-labelledby="tab-waiting">
                                    <!-- Filter untuk Tab SD -->
                                    <div class="card-toolbar w-100 d-flex justify-content-between mb-4" id="filterSD">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <!-- LEFT: Filters -->
                                            <div class="d-flex align-items-center gap-3">
                                                <!-- Cabor SD -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="caborSD" style="width: 300px;">
                                                    <option value="">-- Pilih Cabang Olahraga --</option>
                                                    @foreach($cabor as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- Kecamatan SD -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="kecamatanSD" style="width: 300px;">
                                                    <option value="">-- Pilih Kecamatan --</option>
                                                    @foreach($kecamatan as $k)
                                                        <option value="{{$k->id}}">{{$k->nama}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- Status SD -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="statusSD" style="width: 250px;">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="waiting">Waiting Approval</option>
                                                    <option value="1">Approved</option>
                                                    <option value="0">Rejected</option>
                                                </select>
                                            </div>

                                            <!-- RIGHT: Search -->
                                            <div class="d-flex align-items-center position-relative">
                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <input type="text" id="searchSD"
                                                    class="form-control form-control-solid w-250px ps-15"
                                                    placeholder="Search" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_groups_table_waiting">
                                        <thead>
                                            <tr class="text-start text-gray-700 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px">Nama Lengkap</th>
                                                <th class="min-w-125px">Cabang Olahraga</th>
                                                <th class="min-w-125px">Event</th>
                                                <th class="min-w-125px">Jenjang</th>
                                                <th class="min-w-125px">Kecamatan</th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="min-w-125px">Catatan</th>
                                                <th class="min-w-125px">Tanggal Approval</th>
                                                <th class="min-w-250px text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>

                                <!-- Tab Sudah Diproses -->
                                <div class="tab-pane fade" id="tab-processed-pane" role="tabpanel" aria-labelledby="tab-processed">
                                    <!-- Filter untuk Tab SMP -->
                                    <div class="card-toolbar w-100 d-flex justify-content-between mb-4" id="filterSMP">
                                        <div class="d-flex justify-content-between align-items-center w-100">
                                            <!-- LEFT: Filters -->
                                            <div class="d-flex align-items-center gap-3">
                                                <!-- Cabor SMP -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="caborSMP" style="width: 300px;">
                                                    <option value="">-- Pilih Cabang Olahraga --</option>
                                                    @foreach($cabor as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- Sub Rayon SMP -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="subRayonSMP" style="width: 300px;">
                                                    <option value="">-- Pilih Sub Rayon --</option>
                                                    @foreach($sub_rayon as $sr)
                                                        <option value="{{$sr->id}}">{{$sr->nama}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- Status SMP -->
                                                <select
                                                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    data-control="select2" data-hide-search="true"
                                                    data-dropdown-css-class="w-150px"
                                                    id="statusSMP" style="width: 250px;">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="waiting">Waiting Approval</option>
                                                    <option value="1">Approved</option>
                                                    <option value="0">Rejected</option>
                                                </select>
                                            </div>

                                            <!-- RIGHT: Search -->
                                            <div class="d-flex align-items-center position-relative">
                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <input type="text" id="searchSMP"
                                                    class="form-control form-control-solid w-250px ps-15"
                                                    placeholder="Search" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_groups_table_processed">
                                        <thead>
                                            <tr class="text-start text-gray-700 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px">Nama Lengkap</th>
                                                <th class="min-w-125px">Cabang Olahraga</th>
                                                <th class="min-w-125px">Event</th>
                                                <th class="min-w-125px">Jenjang</th>
                                                <th class="min-w-125px text-center">Sub Rayon</th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="min-w-125px">Catatan</th>
                                                <th class="min-w-125px">Tanggal Approval</th>
                                                <th class="min-w-250px text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Tab content-->
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

<div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfIframe" src="" width="100%" height="600px" style="border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    const userRoleId = {{ Auth::user()->group_id}};

    // DataTable untuk Tab SD
    const tableSD = $("#kt_groups_table_waiting").DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 10,
        ajax: {
            url: `{{ route('athletes.get-lists') }}`,
            type: 'GET',
            dataSrc: function(json) {
                return json.data;
            },
            data: function(d) {
                d.caborId = $('#caborSD').val();
                d.kecamatanId = $('#kecamatanSD').val();
                d.status = $('#statusSD').val();
                d.jenjang = 'SD';
            }
        },
        columns: [{
                data: 'nama_lengkap',
                name: 'nama_lengkap'
            },
            {
                data: 'cabang_olahraga',
                name: 'cabang_olahraga'
            },
            {
                data: 'nama_event',
                name: 'nama_event'
            },
            {
                data: 'jenjang',
                name: 'jenjang',
                className: 'text-center'
            },
            {
                data: 'nama_kecamatan',
                name: 'nama_kecamatan'
            },
            {
                data: 'approval_status',
                name: 'approval_status',
                className: 'text-center',
                render: function(data) {
                    let badgeClass = {
                        'Waiting Approval': 'badge badge-warning',
                        'Approved': 'badge badge-success',
                        'Rejected': 'badge badge-danger'
                    } [data] || 'badge badge-secondary';

                    return `<span class="${badgeClass}">${data}</span>`;
                }
            },
            {
                data: 'appr_notes',
                name: 'appr_notes'
            },
            {
                data: 'approval_date',
                name: 'approval_date'
            },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row) {
                    if (row.approval_status === 'Waiting Approval' && userRoleId === 14) {
                        return `
                        <div class="flex justify-center gap-2">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            <button class="btn btn-sm btn-success btn-approve" data-id="${row.id}">Approve</button>
                            <button class="btn btn-sm btn-danger btn-reject" data-id="${row.id}">Reject</button>
                        </div>
                    `;
                    } else if (row.approval_status === 'Rejected' && userRoleId === 14) {
                        return `
                        <div class="flex justify-center gap-2">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            <button class="btn btn-sm btn-success btn-approve" data-id="${row.id}">Approve</button>
                        </div>
                    `;
                    } else {
                        return `
                        <div class="flex justify-center">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                        </div>
                    `;
                    }
                }
            }
        ]
    });

    // DataTable untuk Tab SMP
    const tableSMP = $("#kt_groups_table_processed").DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 10,
        ajax: {
            url: `{{ route('athletes.get-lists') }}`,
            type: 'GET',
            dataSrc: function(json) {
                return json.data;
            },
            data: function(d) {
                d.caborId = $('#caborSMP').val();
                d.subRayonId = $('#subRayonSMP').val();
                d.status = $('#statusSMP').val();
                d.jenjang = 'SMP';
            }
        },
        columns: [{
                data: 'nama_lengkap',
                name: 'nama_lengkap'
            },
            {
                data: 'cabang_olahraga',
                name: 'cabang_olahraga'
            },
            {
                data: 'nama_event',
                name: 'nama_event'
            },
            {
                data: 'jenjang',
                name: 'jenjang',
                className: 'text-center'
            },
            {
                data: 'nama_sub_rayon',
                name: 'nama_sub_rayon',
                className: 'text-center'
            },
            {
                data: 'approval_status',
                name: 'approval_status',
                className: 'text-center',
                render: function(data) {
                    let badgeClass = {
                        'Waiting Approval': 'badge badge-warning',
                        'Approved': 'badge badge-success',
                        'Rejected': 'badge badge-danger'
                    } [data] || 'badge badge-secondary';

                    return `<span class="${badgeClass}">${data}</span>`;
                }
            },
            {
                data: 'appr_notes',
                name: 'appr_notes'
            },
            {
                data: 'approval_date',
                name: 'approval_date'
            },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row) {
                    if (row.approval_status === 'Waiting Approval' && userRoleId === 14) {
                        return `
                        <div class="flex justify-center gap-2">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            <button class="btn btn-sm btn-success btn-approve" data-id="${row.id}">Approve</button>
                            <button class="btn btn-sm btn-danger btn-reject" data-id="${row.id}">Reject</button>
                        </div>
                    `;
                    } else if (row.approval_status === 'Rejected' && userRoleId === 14) {
                        return `
                        <div class="flex justify-center gap-2">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                            <button class="btn btn-sm btn-success btn-approve" data-id="${row.id}">Approve</button>
                        </div>
                    `;
                    } else {
                        return `
                        <div class="flex justify-center">
                            <a href="/athletes/detail/${row.id}" class="btn btn-sm btn-primary">Lihat</a>
                        </div>
                    `;
                    }
                }
            }
        ]
    });

    // Filter untuk Tab SD
    $('#caborSD, #kecamatanSD, #statusSD').on('change', function() {
        tableSD.ajax.reload(null, false);
    });

    // Search untuk Tab SD
    $('#searchSD').on('keyup', function() {
        tableSD.search(this.value).draw();
    });

    // Filter untuk Tab SMP
    $('#caborSMP, #subRayonSMP, #statusSMP').on('change', function() {
        tableSMP.ajax.reload(null, false);
    });

    // Search untuk Tab SMP
    $('#searchSMP').on('keyup', function() {
        tableSMP.search(this.value).draw();
    });

});

$(document).on('click', '.btn-approve', function() {
    const id = $(this).data('id');

    Swal.fire({
        title: 'Approve Atlet?',
        text: "Apakah kamu yakin ingin menyetujui atlet ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Setujui!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/approve/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil disetujui.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#kt_groups_table_waiting').DataTable().ajax.reload(null, false);
                    $('#kt_groups_table_processed').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal menyetujui atlet.'
                    });
                }
            });
        }
    });
});

$(document).on('click', '.btn-reject', function() {
    const id = $(this).data('id');

    Swal.fire({
        title: 'Tolak Atlet?',
        text: "Masukkan alasan penolakan atlet ini:",
        icon: 'warning',
        input: 'textarea',
        inputPlaceholder: 'Contoh: Dokumen tidak lengkap...',
        inputAttributes: {
            'aria-label': 'Masukkan alasan penolakan'
        },
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Batal',
        inputValidator: (value) => {
            if (!value) {
                return 'Alasan penolakan wajib diisi!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/reject/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: result.value
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil ditolak.',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    $('#kt_groups_table_waiting').DataTable().ajax.reload(null, false);
                    $('#kt_groups_table_processed').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal menolak atlet.'
                    });
                }
            });
        }
    });
});


$(document).on('click', '.btn-print-id-card', function() {
    const atletId = $(this).data('id');
    const url = `/athletes/id-card/${atletId}`; // route to controller

    // Set URL ke iframe untuk load konten
    $('#pdfIframe').attr('src', url);

    // Tampilkan modal
    $('#pdfPreviewModal').modal('show');
});
</script>
@endsection
