@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Galleries</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Posts</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Galleries</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{route('posts.galeries.create')}}" class="btn btn-sm fw-bold btn-primary">New</a>
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
                                            placeholder="Search by Title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 overflow-x-auto">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_menus_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">Title</th>
                                        <th class="min-w-125px">Description</th>
                                        <th class="min-w-125px">category</th>
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
@endsection

@section('script')
<script>
    var table = $("#kt_menus_table").DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 10,
        ajax: {
            url: `{{route('posts.galeries.get-lists')}}`,
            type: 'GET',
            data: function(d) {
                d.parent_id = $('#parent-id').val();
            },
            dataSrc: function(json) {
                return json.data;
            }
        },
        columns: [{
                data: 'title',
                name: 'title'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                            <div class="text-center">
                                <a href="/posts/galeries/edit/${row.id}" class="btn btn-sm btn-light btn-active-light-primary">Edit</a>
                                <button class="btn btn-sm btn-light btn-active-light-danger btn-delete" data-id="${row.id}">Delete</button>
                            <div>
                        `;
                }
            }
        ]
    });

    $('[data-kt-menu-table-filter="search"]').on('keyup', function() {
        const searchTerm = $(this).val();
        table.search(searchTerm).draw();
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data tidak bisa dikembalikan setelah dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/posts/galeries/delete/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        Swal.fire('Berhasil!', res.message, 'success');
                        $('#kt_menus_table').DataTable().ajax.reload();
                    },
                    error: function(err) {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    });
</script>
@endsection
