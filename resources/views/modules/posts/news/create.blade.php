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
                        News</h1>
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
                        <li class="breadcrumb-item text-muted">News</li>
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
                            <form class="w-[60%]" id="newsForm">
                                @csrf
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Title</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-md form-control-solid" type="text"
                                                name="title" id="title" />
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Thumbnail</label>
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-md form-control-solid" type="file"
                                                name="thumbnail" id="thumbnail" />
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Content</label>
                                        <div class="position-relative mb-3">
                                            <textarea class="form-control form-control-md form-control-solid"
                                                type="text" name="content" id="content"></textarea>
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
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="fv-row mb-5">
                                    <div class="mb-1">
                                        <label class="form-label fw-bold fs-6 mb-2">Status</label>
                                        <div class="position-relative mb-3">
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="-" name="status">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Non Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('posts.news.index')}}" class="btn btn-danger">Cancel</a>
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
<!-- Load CKEditor 5 Classic -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
let editor;

ClassicEditor
    .create(document.querySelector('#content'))
    .then(e => editor = e)
    .catch(error => console.error(error));

$('#newsForm').on('submit', function(e) {
    e.preventDefault();

    // Sync CKEditor data to textarea
    $('#content').val(editor.getData());

    const form = $('#newsForm')[0];
    const formData = new FormData(form);

    $.ajax({
        url: "{{ route('posts.news.save') }}",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'News berhasil disimpan!',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('posts.news.index') }}";
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
                    title: 'Warning !',
                    html: errorList,
                    confirmButtonText: 'Ok'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan Server',
                    text: 'Terjadi kesalahan pada sistem. Coba lagi nanti atau hubungi administrator.'
                });
            }
        }
    });
});
</script>
@endsection

