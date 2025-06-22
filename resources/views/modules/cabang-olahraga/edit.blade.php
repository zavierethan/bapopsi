@extends('layouts.main')

@section('main-content')
<div class="container py-5">
    <h2>Edit Cabang Olahraga</h2>
    <form id="sport-form">
        @csrf
        <!-- Cabang Olahraga -->
        <div class="mb-4">
            <label class="form-label fw-bold">Nama Cabang Olahraga</label>
            <input type="text" name="code" class="form-control" value="{{ $sport->name }}" required>
        </div>

        <!-- Sport Classes -->
        <div id="classes-wrapper">
            @foreach($classes as $index => $class)
                <div class="class-item position-relative mb-3">
                    <input type="text" name="sport_classes[{{ $index }}][name]" class="form-control pe-10" value="{{ $class->name }}" required>
                    <button type="button" class="btn btn-icon btn-sm btn-light-danger position-absolute top-50 translate-middle-y end-0 me-2 remove-class" title="Hapus">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-class" class="btn btn-light-primary my-3">
            <i class="fa fa-plus"></i> Tambah Kelas
        </button>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cabang-olahraga.index') }}" class="btn btn-danger ms-2">Batal</a>
        </div>
        <div id="alert-success" class="alert alert-success mt-4 d-none">Berhasil diupdate!</div>
        <div id="alert-error" class="alert alert-danger mt-4 d-none">Gagal update!</div>
    </form>
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

// AJAX update
$('#sport-form').on('submit', function (e) {
    e.preventDefault();
    $('#alert-success, #alert-error').addClass('d-none');

    $.ajax({
        url: "{{ route('cabang-olahraga.update', $sport->id) }}",
        method: 'POST',
        data: $(this).serialize(),
        success: function () {
            $('#alert-success').removeClass('d-none');
        },
        error: function () {
            $('#alert-error').removeClass('d-none');
        }
    });
});
</script>
@endsection
