@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Cabang Olahraga</h1>
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
                        <li class="breadcrumb-item text-muted">Cabang Olahraga</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card">
                        <div class="card-body pt-10">
                            <form id="sport-form" method="POST">
                                @csrf
                                <div class="mb-5">
                                    <label class="form-label fw-bold">Nama</label>
                                    <input type="text" class="form-control form-control-solid" name="name" value="{{ $sport->name }}">
                                </div>
                                <div class="separator my-5"></div>
                                <div class="mb-5">
                                    <label class="form-label fw-bold">Deskripsi</label>
                                    <textarea type="text" class="form-control form-control-solid" name="description">{{ $sport->description }}</textarea>
                                </div>
                                <div class="separator my-5"></div>
                                <label class="form-label fw-bold">Kelas</label>
                                <div id="classes-wrapper">
                                    @foreach($classes as $index => $class)
                                    <div class="class-item position-relative mb-3">
                                        <input type="text" name="sport_classes[{{ $index }}][name]"
                                            class="form-control pe-10" value="{{ $class->name }}" required>
                                        <button type="button"
                                            class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class"
                                            title="Hapus">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>

                                <button type="button" id="add-class" class="btn btn-light-primary mb-5">
                                    <i class="fa fa-plus"></i> Tambah Kelas
                                </button>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                                    <a href="{{ route('cabang-olahraga.index') }}" class="btn btn-danger ms-2">Cancel</a>
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
let classIndex = {{ count($classes) }};

function updateRemoveButtons() {
    $('.remove-class').toggle($('.class-item').length > 1);
}

$('#add-class').click(function () {
    const newInput = `
        <div class="class-item position-relative mb-3">
            <input type="text" name="sport_classes[${classIndex}][name]" class="form-control pe-10" placeholder="Nama Kelas" required>
            <button type="button" class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class" title="Hapus">
                <i class="fa fa-times"></i>
            </button>
        </div>`;
    $('#classes-wrapper').append(newInput);
    classIndex++;
    updateRemoveButtons();
});

$(document).on('click', '.remove-class', function () {
    $(this).closest('.class-item').remove();
    updateRemoveButtons();
});

updateRemoveButtons();

$('#sport-form').on('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Simpan Perubahan?',
        text: 'Data akan diperbarui',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('cabang-olahraga.update', $sport->id) }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data cabang olahraga berhasil diperbarui.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('cabang-olahraga.index') }}";
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan data.'
                    });
                }
            });
        }
    });
});
</script>
@endsection

