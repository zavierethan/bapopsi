@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Event Registrations</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted"><a href="#" class="text-muted text-hover-primary">Data
                                Atlet</a></li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Event Registrations</li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Create</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form id="form-atlet" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!-- Informasi Event -->
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">Informasi Event</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold fs-6">Nama Event</label>
                                    <select name="event_id" class="form-select form-select-solid"
                                        data-control="select2">
                                        <option value="">Pilih Event</option>
                                        @foreach($events as $event)
                                        <option value="{{ $event->id }}" <?php echo ($event->event_category_id == 1) ? 'selected' : ''; ?>>{{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold fs-6">Cabang Olahraga</label>
                                    <select name="cabang_olahraga_id" class="form-select form-select-solid"
                                        data-control="select2" id="cabor-id" <?php echo (Auth::user()->group_id == 16) ? 'disabled' : '';?>>
                                        <option value="">Pilih Cabang</option>
                                        @foreach($cabangOlahraga as $cabor)
                                        <option value="{{ $cabor->id }}" <?php echo (Auth::user()->group_id == 16 && Auth::user()->cabor_id == $cabor->id) ? 'selected' : '';?>>{{ $cabor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4" id="radioContainer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Atlet -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title fw-bold">Data Atlet</h3>
                            <button type="button" id="add-atlet" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-plus"></i> Tambah Atlet
                            </button>
                        </div>
                        <div class="card-body" id="atlet-wrapper"></div>
                    </div>

                    @if(Auth::user()->group_id == 15)
                    <!-- Data Official -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title fw-bold">Data Official</h3>
                            <button type="button" id="add-official" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-plus"></i> Tambah Official
                            </button>
                        </div>
                        <div class="card-body" id="official-wrapper"></div>
                    </div>
                    @endif

                    <!-- Submit -->
                    <div class="text-end mb-10">
                        <button type="button" class="btn btn-success" id="submit-form">Simpan</button>
                        <a href="/event-registrations" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$('#submit-form').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah kamu yakin ingin menyimpan data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = $('#form-atlet')[0];
            const formData = new FormData(form);
            $.ajax({
                url: "{{ route('event-registrations.save') }}", // Ganti dengan route sesuai kebutuhan
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href =
                            "{{ route('event-registrations.index') }}"; // redirect jika perlu
                    });
                },
                error: function(xhr) {
                    let message = 'Terjadi kesalahan saat menyimpan data.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        title: 'Gagal!',
                        text: message,
                        icon: 'error'
                    });
                }
            });
        }
    });
});

let atletIndex = 0;
let officialIndex = 0;

const jabatanOptions = @json($jabatan);

function atletRow(index) {
    return `
    <div class="border p-4 mb-4 rounded position-relative atlet-item bg-light">
        <button type="button" class="btn btn-icon btn-danger btn-sm position-absolute top-0 end-0 mt-2 me-2 remove-atlet">
            <i class="fa fa-times"></i>
        </button>
        <div class="row g-4">
            <!-- Foto Profil -->
            <div class="col-md-4 text-center">
                <div class="mb-5">
                    <img src="https://via.placeholder.com/150"
                         class="img-thumbnail preview-pas-foto"
                         style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <input type="file" name="atlets[${index}][pas_foto]" accept="image/*"
                       class="form-control input-pas-foto">
            </div>

            <!-- Biodata -->
            <div class="col-md-8">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="atlets[${index}][nama_lengkap]" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="atlets[${index}][tempat_lahir]">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="atlets[${index}][tanggal_lahir]">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-10">
                        <select name="atlets[${index}][jenis_kelamin]" class="form-select">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Nama Sekolah</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="atlets[${index}][nama_sekolah]">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">NISN</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="atlets[${index}][nisn]">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Rapor</label>
                    <div class="col-md-10">
                        <input type="file" name="atlets[${index}][raport]" class="form-control mt-1">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">SK</label>
                    <div class="col-md-10">
                        <input type="file" name="atlets[${index}][sk]" class="form-control mt-1">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 col-form-label">Akta Lahir</label>
                    <div class="col-md-10">
                        <input type="file" name="atlets[${index}][akta_lahir]" class="form-control mt-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;
}


function officialRow(index) {
    // Buat elemen <option> dari jabatanOptions
    const jabatanSelectOptions = jabatanOptions.map(j =>
        `<option value="${j.id}">${j.nama_jabatan}</option>`
    ).join('');

    return `
    <div class="border p-4 mb-4 rounded position-relative official-item bg-light">
        <button type="button" class="btn btn-icon btn-danger btn-sm position-absolute top-0 end-0 mt-2 me-2 remove-official">
            <i class="fa fa-times"></i>
        </button>
        <div class="row g-3 align-items-end">
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/120" class="img-thumbnail preview-foto-official mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                <input type="file" name="officials[${index}][foto]" class="form-control input-foto-official">
            </div>
            <div class="col-md-4">
                <input type="text" name="officials[${index}][nama_lengkap]" placeholder="Nama Lengkap" class="form-control" required>
            </div>
            <div class="col-md-4">
                <select name="officials[${index}][jabatan]" class="form-select" required>
                    <option value="">Pilih Jabatan</option>
                    ${jabatanSelectOptions}
                </select>
            </div>
        </div>
    </div>`;
}

$('#add-atlet').on('click', function() {
    $('#atlet-wrapper').append(atletRow(atletIndex));
    atletIndex++;
});

$('#add-official').on('click', function() {
    $('#official-wrapper').append(officialRow(officialIndex));
    officialIndex++;
});

$(document).on('click', '.remove-atlet', function() {
    $(this).closest('.atlet-item').remove();
});

$(document).on('click', '.remove-official', function() {
    $(this).closest('.official-item').remove();
});

$(document).on('change', '.input-pas-foto', function() {
    const input = this;
    const reader = new FileReader();

    reader.onload = function(e) {
        $(input).closest('.atlet-item').find('.preview-pas-foto').attr('src', e.target.result);
    };

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
});

$(document).on('change', '.input-foto-official', function() {
    const input = this;
    const reader = new FileReader();

    reader.onload = function(e) {
        $(input).closest('.official-item').find('.preview-foto-official').attr('src', e.target.result);
    };

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
});

$('#cabor-id').on('change', function() {
    let sportId = $(this).val();
    let $container = $('#radioContainer'); // masih pakai id yg sama
    $container.empty();

    if (sportId) {
        $.ajax({
            url: '/api/getKelasByCabor/' + sportId,
            method: 'GET',
            success: function(response) {
                // Buat elemen label dan select
                const $label = $(
                    '<label class="form-label fw-bold fs-6 d-block" for="sport_class_id">No. Kelas Pertandingan</label>'
                    );
                const $select = $(
                    '<select class="form-select form-select-solid" data-control="select2" id="sport_class_id" name="sport_class_id"></select>'
                    );

                // Tambahkan option default
                $select.append('<option value="">-- Pilih Kelas --</option>');

                // Loop data kelas
                $.each(response.data, function(index, item) {
                    const $option = $('<option></option>')
                        .attr('value', item.id)
                        .text(item.name);
                    $select.append($option);
                });

                // Masukkan ke container
                $container.append($label).append($select);
            },
            error: function() {
                $container.html('<p class="text-danger">Gagal memuat kelas.</p>');
            }
        });
    }
});
</script>
@endsection
