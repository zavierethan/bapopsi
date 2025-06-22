@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card">
                        <div class="card-body pt-10">
                            <form id="sport-form" method="POST">
                                @csrf

                                <!-- Nama Cabang Olahraga -->
                                <div class="mb-5">
                                    <label class="form-label fw-bold">Nama Cabang Olahraga</label>
                                    <input type="text" class="form-control form-control-solid" name="code" required>
                                </div>

                                <div class="separator my-5"></div>

                                <!-- Kelas -->
                                <h4 class="mb-4">Daftar Kelas Pertandingan</h4>
                                <div id="classes-wrapper">
                                    <div class="class-item position-relative mb-3">
                                        <input type="text" name="sport_classes[0][name]" class="form-control pe-10"
                                            placeholder="Nama Kelas" required>
                                        <button type="button"
                                            class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class"
                                            style="display: none;" title="Hapus">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="button" id="add-class" class="btn btn-light-primary mb-5">
                                    <i class="fa fa-plus"></i> Tambah Kelas
                                </button>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('cabang-olahraga.index') }}" class="btn btn-danger ms-2">Batal</a>
                                </div>
                            </form>

                            <!-- Notifikasi -->
                            <div id="alert-success" class="alert alert-success mt-5 d-none">Data berhasil disimpan!
                            </div>
                            <div id="alert-error" class="alert alert-danger mt-5 d-none">Terjadi kesalahan saat
                                menyimpan data.</div>
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
let classIndex = 1;

$('#add-class').click(function() {
    const newClass = `
            <div class="class-item position-relative mb-3">
                <input type="text" name="sport_classes[${classIndex}][name]" class="form-control pe-10" placeholder="Nama Kelas" required>
                <button type="button" class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class" title="Hapus">
                    <i class="fa fa-times"></i>
                </button>
            </div>`;
    $('#classes-wrapper').append(newClass);
    classIndex++;
    updateRemoveClassButtons();
});

$(document).on('click', '.remove-class', function() {
    $(this).closest('.class-item').remove();
    updateRemoveClassButtons();
});

function updateRemoveClassButtons() {
    const total = $('.class-item').length;
    $('.remove-class').toggle(total > 1);
}

updateRemoveClassButtons();

// Submit pakai AJAX
$('#sport-form').on('submit', function(e) {
    e.preventDefault();
    $('#alert-success').addClass('d-none');
    $('#alert-error').addClass('d-none');

    const formData = $(this).serialize();

    $.ajax({
        url: "{{ route('cabang-olahraga.save') }}",
        type: "POST",
        data: formData,
        success: function(res) {
            $('#alert-success').removeClass('d-none');
            $('#sport-form')[0].reset();
            $('#classes-wrapper').html(`
                    <div class="class-item position-relative mb-3">
                        <input type="text" name="sport_classes[0][name]" class="form-control pe-10" placeholder="Nama Kelas" required>
                        <button type="button" class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class" style="display: none;" title="Hapus">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                `);
            classIndex = 1;
            updateRemoveClassButtons();
        },
        error: function(xhr) {
            $('#alert-error').removeClass('d-none');
            console.error(xhr.responseText);
        }
    });
});
</script>
@endsection
