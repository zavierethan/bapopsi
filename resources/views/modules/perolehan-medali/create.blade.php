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
                            <div class="mb-5">
                                <label class="form-label fw-bold fs-6 mb-2">Kategori Event</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="-" name="cabor_id">
                                        <option value=""></option>
                                        @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="separator my-5"></div>
                            <div class="mb-5">
                                <label class="form-label fw-bold fs-6 mb-2">Cabang Olahraga</label>
                                <div class="position-relative mb-3">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="-" name="cabor_id" id="cabor_id" disabled>
                                        <option value=""></option>
                                        @foreach($cabangOlahraga as $cabor)
                                        <option value="{{$cabor->id}}" <?php echo (Auth::user()->group_id == 16 && Auth::user()->cabor_id == $cabor->id) ? 'selected' : '';?>>{{$cabor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="separator my-5"></div>
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mt-2" id="O2SN">
                                <thead class="bg-primary text-white">
                                    <tr class="text-start text-white fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="ps-3">No</th>
                                        <th class="ps-3">Nama Lengkap</th>
                                        <th class="ps-3">Cabang Olahraga</th>
                                        <th class="ps-3">Perolehan Medali (Juara)</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-700">
                                </tbody>
                            </table>
                            <div class="text-end mb-10">
                                <button type="button" class="btn btn-sm btn-success" id="submit-form">Simpan</button>
                                <a href="/perolehan-medali" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
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
        data: function(d) {
            d.eventId = 1;
            d.caborId = $("#cabor_id").val();
        },
        dataSrc: function(json) {
            return json.data;
        }
    },
    columns: [{
            data: null,
            name: 'no',
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
            data: 'cabang_olahraga',
            name: 'cabang_olahraga',
            className: 'ps-3'
        },
        {
            data: null,
            name: 'perolehan_medali',
            orderable: false,
            searchable: false,
            className: 'ps-3',
            render: function(data, type, row) {
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

$("#submit-form").on("click", function () {
    let dataToSave = [];

    // Loop semua select di tabel
    $("#O2SN tbody tr").each(function () {
        let medal = $(this).find(".perolehan-medali").val();
        let athleteId = $(this).find(".perolehan-medali").data("id");

        if (athleteId) {
            dataToSave.push({
                athlete_id: athleteId,
                medal: medal
            });
        }
    });

    // Kirim via AJAX
    $.ajax({
        url: "{{ route('perolehan-medali.saveAll') }}", // bikin route untuk batch save
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}", // wajib untuk Laravel
            data: dataToSave
        },
        success: function (res) {
            if (res.success) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: "Data perolehan medali berhasil disimpan"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Tidak bisa menyimpan data"
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Terjadi kesalahan server"
            });
        }
    });
});

</script>
@endsection
