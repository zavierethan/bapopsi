@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Officials</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Data Atlet</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Officials</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{route('officials.create')}}" class="btn btn-sm fw-bold btn-primary">New</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <!--begin::Search-->

                                <!--end::Search-->
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <div class="position-relative my-1">
                                        <i
                                            class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="text" data-kt-menu-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-15"
                                            placeholder="Search" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 overflow-x-auto">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_menus_table">
                                <thead>
                                    <tr class="text-start text-gray-700 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Nama Lengkap</th>
                                        <th class="min-w-125px">Jabatan</th>
                                        <th class="min-w-125px">Kecamatan</th>
                                        <th class="min-w-125px">Sub Rayon</th>
                                        <th class="min-w-125px">Cabang Olahraga</th>
                                        <th class="min-w-125px">Approval Status</th>
                                        <th class="min-w-125px">Catatan Approval</th>
                                        <th class="min-w-125px">Tanggal Approval</th>
                                        <th class="text-center min-w-70px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
const userRoleId = {{ Auth::user()->group_id }};
var table = $("#kt_menus_table").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{route('officials.get-lists')}}`,
        type: 'GET',
        data: function(d) {
            d.parent_id = $('#parent-id').val();
        },
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [
        {
            data: 'nama',
            name: 'nama'
        },
        {
            data: 'nama_jabatan',
            name: 'nama_jabatan'
        },
        {
            data: 'nama_kecamatan',
            name: 'nama_kecamatan'
        },
        {
            data: 'nama_sub_rayon',
            name: 'nama_sub_rayon'
        },
        {
            data: 'nama_jabatan',
            name: 'nama_jabatan'
        },
        {
            data: 'approval_status',
            name: 'approval_status',
            className: 'text-center',
            render: function (data) {
                let badgeClass = {
                    'Waiting Approval': 'badge badge-warning',
                    'Approved': 'badge badge-success',
                    'Rejected': 'badge badge-danger'
                }[data] || 'badge badge-secondary';

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
                if (row.approval_status === 'Waiting Approval') {
                    if (userRoleId === 14 || userRoleId === 1 ) { // approval hanya bisa di lakukan oleh admin dan superadmin
                        return `
                            <div class="flex justify-center gap-2">
                                <button class="btn btn-sm btn-success btn-approve" data-id="${row.id}">Approve</button>
                                <button class="btn btn-sm btn-danger btn-reject" data-id="${row.id}">Reject</button>
                            </div>
                        `;
                    } else {
                        return `
                            <div class="flex justify-center">
                                <button class="btn btn-sm btn-success btn-print-id-card" data-id="${row.id}">Cetak ID Card</button>
                            </div>
                        `;
                    }
                } else {
                    return `
                        <div class="flex justify-center">
                            <button class="btn btn-sm btn-success btn-print-id-card" data-id="${row.id}">Cetak ID Card</button>
                        </div>
                    `;
                }
            }
        }
    ]
});

$('[data-kt-menu-table-filter="search"]').on('keyup', function() {
    const searchTerm = $(this).val();
    table.search(searchTerm).draw();
});

$(document).on('click', '.btn-print-id-card', function () {
    const officialId = $(this).data('id');
    const url = `/officials/id-card/${officialId}`; // route to controller

    // Set URL ke iframe untuk load konten
    $('#pdfIframe').attr('src', url);

    // Tampilkan modal
    $('#pdfPreviewModal').modal('show');
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
                url: `/officials/approve/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Official berhasil disetujui.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#kt_menus_table').DataTable().ajax.reload(null, false);
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
        title: 'Tolak Official?',
        text: "Masukkan alasan penolakan Official ini:",
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
                url: `/officials/reject/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: result.value
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Official berhasil ditolak.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#kt_menus_table').DataTable().ajax.reload();
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

</script>
@endsection
