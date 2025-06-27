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
                        Registrasi (verifikasi & Approval)</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Registration</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">verifikasi & Approval</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->

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
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pt-0 overflow-x-auto">
                            <div class="row g-5 g-xl-10 mb-3 mt-3">
                                <div class="col-md-4">
                                    <div class="card bg-warning">
                                        <div class="card-body">
                                            <h5 class="text-white text-center">Waiting Approval</h5>
                                            <h2 class="text-white text-center" id="count-waiting">0</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <h5 class="text-white text-center">Approved</h5>
                                            <h2 class="text-white text-center" id="count-approved">0</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-danger">
                                        <div class="card-body">
                                            <h5 class="text-white text-center">Rejected</h5>
                                            <h2 class="text-white text-center" id="count-rejected">0</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--begin::Table-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->

                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
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
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-customer-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 overflow-x-auto">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_registration_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-700 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Nama Lengkap</th>
                                        <th class="min-w-125px">Email</th>
                                        <th class="min-w-125px">Jenjang</th>
                                        <th class="min-w-125px">Kecamatan</th>
                                        <th class="min-w-125px">Sub Rayon</th>
                                        <th class="min-w-125px">Tanggal Registrasi</th>
                                        <th class="min-w-125px text-center">Approval Status</th>
                                        <th class="min-w-125px">Tanggal Approval</th>
                                        <th class="text-center min-w-70px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-700">
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
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
fetchApprovalSummary()
$("#kt_registration_table").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    ajax: {
        url: `{{route('registrations.get-lists')}}`,
        type: 'GET',
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [{
            data: 'nama_lengkap',
            name: 'nama_lengkap'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'jenjang',
            name: 'jenjang'
        },
        {
            data: 'nama_kecamatan',
            name: 'nama_kecamatan'
        },
        {
            data: 'sub_rayon',
            name: 'sub_rayon'
        },
        {
            data: 'created_at_formatted',
            name: 'created_at_formatted'
        },
        {
            data: 'approval_status',
            name: 'approval_status',
            className: 'text-center',
            render: function(data, type, row) {
                let badgeClass = '';

                switch (data) {
                    case 'Waiting Approval':
                        badgeClass = 'badge badge-warning';
                        break;
                    case 'Approved':
                        badgeClass = 'badge badge-success';
                        break;
                    case 'Rejected':
                        badgeClass = 'badge badge-danger';
                        break;
                    default:
                        badgeClass = 'badge badge-secondary';
                }

                return `<span class="${badgeClass}">${data}</span>`;
            }
        },
        {
            data: 'approval_date_formatted',
            name: 'approval_date_formatted'
        },
        {
            data: null,
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                if (row.approval_status === 'Waiting Approval') {
                    return `
                            <div class="text-center">
                                <button class="btn btn-sm btn-success btn-active-light-primary w-80 btn-approve" data-id="${row.id}">Approve</button>
                                <button class="btn btn-sm btn-danger btn-active-light-primary w-80 btn-reject" data-id="${row.id}">Reject</button>
                            </div>
                        `;
                } else {
                    return `<div class="text-center text-muted">No actions</div>`;
                }
            }
        }
    ]
});

$(document).on('click', '.btn-approve', function() {
    const id = $(this).data('id');

    if (confirm('Are you sure you want to approve this registration?')) {
        $.ajax({
            url: `/registrations/approve/${id}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                alert('Approved successfully!');
                fetchApprovalSummary()
                $('#kt_registration_table').DataTable().ajax.reload(null, false);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Failed to approve.');
            }
        });
    }
});

$(document).on('click', '.btn-reject', function() {
    const id = $(this).data('id');

    if (confirm('Are you sure you want to reject this registration?')) {
        $.ajax({
            url: `/registrations/reject/${id}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Rejected successfully!');
                fetchApprovalSummary()
                $('#kt_registration_table').DataTable().ajax.reload();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Failed to reject.');
            }
        });
    }
});

function fetchApprovalSummary() {
    $.ajax({
        url: '{{ route("registrations.summary") }}',
        method: 'GET',
        success: function (data) {
            $('#count-waiting').text(data.waiting_approval);
            $('#count-approved').text(data.approved);
            $('#count-rejected').text(data.rejected);
        },
        error: function (xhr) {
            console.error('Failed to fetch summary', xhr.responseText);
        }
    });
}
</script>
@endsection
