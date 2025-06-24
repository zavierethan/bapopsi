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
                        Rayon</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Master Data</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Rayon</li>
                        <!--end::Item-->
                        <!--begin::Item-->
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
                        <div class="card-body pt-10">
                            <form class="w-[60%]" method="POST" action="#" id="subrayon-form">
                                @csrf
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Nama Rayon</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-md form-control-solid" type="text"
                                                name="nama" id="nama" />
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Wilayah (Kecamatan)</label>
                                        <div class="row">
                                            @php
                                            $chunks = $kecamatan->chunk(10); // Maksimal 10 kecamatan per kolom
                                            @endphp
                                            @foreach ($chunks as $chunk)
                                            <div class="col-md-3">
                                                @foreach ($chunk as $item)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="kecamatan_id[]" value="{{ $item->id }}"
                                                        id="kec-{{ $item->id }}">
                                                    <label class="form-check-label" for="kec-{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>

                                        @if ($kecamatan->isEmpty())
                                        <p class="text-muted">Belum ada data kecamatan.</p>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        <div class="separator my-5"></div>
                        <div class="d-flex justify-content-end mb-5 gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('rayon.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                        <div id="alert-success" class="alert alert-success mt-5 d-none">Data berhasil disimpan!
                        </div>
                        <div id="alert-error" class="alert alert-danger mt-5 d-none">Gagal menyimpan data!</div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
</div>
</div>
@endsection

@section('script')
<script>
$('#subrayon-form').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('rayon.save') }}", // ganti sesuai route store kamu
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil disimpan.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('rayon.index') }}";
            });
        },
        error: function(err) {
            console.log(err);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menyimpan data.'
            });
        }
    });
});
</script>
@endsection

