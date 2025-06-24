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
                        Atlet</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Data Atlet</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Atlet</li>
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
                    <form id="form-atlet" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Biodata Atlet</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Nama Lengkap</label>
                                        <input class="form-control form-control-md form-control-solid" type="text"
                                            name="nama_lengkap" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Tempat Lahir</label>
                                        <input class="form-control form-control-md form-control-solid" type="text"
                                            name="tempat_lahir" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-md form-control-solid" type="date"
                                            name="tanggal_lahir" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Jenis Kelamin</label>
                                        <input class="form-control form-control-md form-control-solid" type="text"
                                            name="jenis_kelamin" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Nama Sekolah</label>
                                        <input class="form-control form-control-md form-control-solid" type="text"
                                            name="nama_sekolah" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">NISN</label>
                                        <input class="form-control form-control-md form-control-solid" type="text"
                                            name="nisn" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Pas Photo</label>
                                        <input class="form-control form-control-md form-control-solid" type="file"
                                            name="pas_foto" id="inputPasFoto" accept="image/*" />
                                        <div class="mt-2">
                                            <img id="previewFoto" src="#" alt="Preview Foto" style="display:none; max-width:140px; max-height:180px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08); border:2px solid #eee;" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Raport</label>
                                        <input class="form-control form-control-md form-control-solid" type="file"
                                            name="raport" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Akta Lahir</label>
                                        <input class="form-control form-control-md form-control-solid" type="file"
                                            name="akta_lahir" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold fs-6 mb-2">Cabang Olahraga</label>
                                        <div class="position-relative mb-3">
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="-" name="cabang_olahraga" id="caborId">
                                                <option value=""></option>
                                                @foreach($cabor as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Spacer -->
                        <div class="my-4"></div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Kelas Cabang Olahraga</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row" id="radioContainer">
                                </div>
                            </div>
                        </div>
                        <!-- Spacer -->
                        <div class="my-4"></div>

                        <!-- Card 2: Official -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Official</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div id="official-wrapper">
                                    <div class="row official-item align-items-end mb-4">
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold fs-6 mb-2">Nama Official</label>
                                            <input class="form-control form-control-md form-control-solid" type="text"
                                                name="officials[0][jabatan]" placeholder="Contoh: Pelatih Kepala">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold fs-6 mb-2">Nama Lengkap</label>
                                            <input class="form-control form-control-md form-control-solid" type="text"
                                                name="officials[0][nama]" placeholder="Contoh: Budi Santoso">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold fs-6 mb-2">Foto</label>
                                            <input class="form-control form-control-md form-control-solid" type="file">
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-light-danger remove-official d-none"
                                                title="Hapus">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="add-official" class="btn btn-light-primary mb-5">
                                    <i class="fa fa-plus"></i> Tambah Official
                                </button>

                                <div class="d-flex justify-content-end gap-3 mt-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('athletes.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$('#form-atlet').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('athletes.save') }}",
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
                window.location.href = "{{ route('athletes.index') }}";
            });
        },
        error: function(err) {
            let message = 'Terjadi kesalahan saat menyimpan data.';

            if (err.status === 422 && err.responseJSON?.errors) {
                message = '<ul style="text-align:left;">';
                $.each(err.responseJSON.errors, function(field, errors) {
                    errors.forEach(function(error) {
                        message += `<li>${error}</li>`;
                    });
                });
                message += '</ul>';
            } else if (err.responseJSON?.message) {
                message = err.responseJSON.message;
            }

            Swal.fire({
                icon: 'warning',
                title: 'Perhatian!',
                html: message
            });
        }
    });
});


$('#caborId').on('change', function() {
    let sportId = $(this).val();
    let $radioContainer = $('#radioContainer');
    $radioContainer.empty();

    if (sportId) {
        $.ajax({
            url: '/api/getKelasByCabor/' + sportId,
            method: 'GET',
            success: function(response) {
                const $container = $('#radioContainer');
                $container.empty();

                const radios = $.map(response.data, function(item) {
                    return `
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas_id" id="kelas_${item.id}" value="${item.id}">
                                <label class="form-label fw-bold fs-6 mb-2" for="kelas_${item.id}">
                                    ${item.name}
                                </label>
                            </div>
                        </div>
                    </div>
            `;
                });

                $container.html(radios.join(''));
            },
            error: function() {
                $('#radioContainer').html('<p class="text-danger">Gagal memuat kelas.</p>');
            }
        });
    }
});

let officialIndex = 1;

$('#add-official').click(function() {
    const officialItem = `
        <div class="row official-item align-items-end mb-4">
            <div class="col-md-4">
                <input class="form-control form-control-md form-control-solid" type="text"
                    name="officials[${officialIndex}][jabatan]" placeholder="Contoh: Asisten Pelatih" required>
            </div>
            <div class="col-md-4">
                <input class="form-control form-control-md form-control-solid" type="text"
                    name="officials[${officialIndex}][nama]" placeholder="Contoh: Rudi Hartono" required>
            </div>
            <div class="col-md-3">
                <input class="form-control form-control-md form-control-solid" type="file"
                    name="officials[${officialIndex}][foto]" required>
            </div>
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-icon btn-sm btn-light-danger remove-official" title="Hapus">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    `;
    $('#official-wrapper').append(officialItem);
    officialIndex++;
    updateRemoveOfficialButtons();
});

$(document).on('click', '.remove-official', function() {
    $(this).closest('.official-item').remove();
    updateRemoveOfficialButtons();
});

function updateRemoveOfficialButtons() {
    const total = $('.official-item').length;
    $('.remove-official').toggle(total > 1);
}

updateRemoveOfficialButtons();

// Preview foto pas photo
$(document).on('change', '#inputPasFoto', function(e) {
    const [file] = this.files;
    if (file) {
        $('#previewFoto').attr('src', URL.createObjectURL(file)).show();
    } else {
        $('#previewFoto').hide();
    }
});
</script>
@endsection
