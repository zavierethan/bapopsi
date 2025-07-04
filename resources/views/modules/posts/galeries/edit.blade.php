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
                        Galleries</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Posts</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Galleries</li>
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
                            <form class="w-[60%]" id="editGaleryForm">
                                @csrf
                                <input type="hidden" id="galery_id" value="{{ $galery->id }}">
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Title</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-md form-control-solid" type="text"
                                                name="title" id="title" value="{{ $galery->title }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Image</label></br>
                                        <img src="{{ asset('storage/' . $galery->image_url) }}" width="100" class="mt-2" />
                                        </br>
                                        <div class="position-relative mb-3 mt-3">
                                            <input class="form-control form-control-md form-control-solid" type="file"
                                                name="image" id="image" />
                                        </div>
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">
                                            Description
                                        </label>
                                        <div class="position-relative mb-3">
                                            <textarea class="form-control form-control-md form-control-solid"
                                                type="text" name="description">{{ $galery->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="mb-1">
                                    <label class="form-label fw-bold fs-6 mb-2">Category</label>
                                    <div class="position-relative mb-3">
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="-" name="category">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $galery->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('posts.galeries.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
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
$('#editGaleryForm').on('submit', function(e) {
    e.preventDefault();

    const form = $('#editGaleryForm')[0];
    const formData = new FormData(form);
    const galeryId = $('#galery_id').val();

    $.ajax({
        url: `/posts/galeries/update/${galeryId}`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Galery berhasil diperbarui!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('posts.galeries.index') }}";
            });
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorList = '<ul style="text-align: left;">';
                $.each(errors, function(key, messages) {
                    messages.forEach(function(message) {
                        errorList += `<li>${message}</li>`;
                    });
                });
                errorList += '</ul>';

                Swal.fire({
                    icon: 'warning',
                    title: 'Validasi Gagal!',
                    html: errorList,
                    confirmButtonText: 'Perbaiki'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan pada server.'
                });
            }
        }
    });
});
</script>
@endsection
