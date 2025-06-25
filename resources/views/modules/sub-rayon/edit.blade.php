@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Edit Sub Rayon</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Master Data</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Sub Rayon</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Edit</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card">
                        <div class="card-body pt-10">
                            <form class="w-[60%]" method="POST" id="subrayon-form">
                                @csrf

                                <input type="hidden" name="id" value="{{ $subrayon->id }}">

                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Kecamatan</label>
                                        <div class="position-relative mb-3">
                                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="-" name="kecamatan_id" required>
                                                <option value=""></option>
                                                @foreach($kecamatan as $k)
                                                <option value="{{ $k->id }}" {{ $k->id == $subrayon->kecamatan_id ? 'selected' : '' }}>
                                                    {{ $k->nama }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator my-5"></div>

                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Nama Sub Rayon</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-md form-control-solid" type="text" name="nama" id="nama" value="{{ $subrayon->nama }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="separator my-5"></div>

                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('sub-rayon.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
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
$('#subrayon-form').on('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const id = $('input[name="id"]').val();

    $.ajax({
        url: `/sub-rayon/update/${id}`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: res.message || 'Data berhasil diperbaharui.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('sub-rayon.index') }}";
            });
        },
        error: function(err) {
            let message = 'Terjadi kesalahan saat menyimpan data.';

            if (err.status === 422 && err.responseJSON && err.responseJSON.message) {
                message = err.responseJSON.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: message
            });
        }
    });
});
</script>
@endsection
