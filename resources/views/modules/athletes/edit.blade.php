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
                        <li class="breadcrumb-item text-muted">Edit</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <form id="form-atlet-edit" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Biodata Atlet</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <input type="hidden" id="atlet_id" value="{{ $atlet->id }}">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="nama_lengkap" value="{{ $atlet->nama_lengkap }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Tempat Lahir</label>
                                        <input class="form-control" type="text" name="tempat_lahir" value="{{ $atlet->tempat_lahir }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggal_lahir" value="{{ $atlet->tanggal_lahir }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Jenis Kelamin</label>
                                        <input class="form-control" type="text" name="jenis_kelamin" value="{{ $atlet->jenis_kelamin }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Nama Sekolah</label>
                                        <input class="form-control" type="text" name="nama_sekolah" value="{{ $atlet->nama_sekolah }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">NISN</label>
                                        <input class="form-control" type="text" name="nisn" value="{{ $atlet->nisn }}" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Pas Foto</label>
                                        <input class="form-control" type="file" name="pas_foto" id="inputPasFoto" />
                                        @if($atlet->pas_foto)
                                        <img src="{{ asset('storage/' . $atlet->pas_foto) }}" id="previewFoto" class="mt-2" style="max-width:140px; max-height:180px; border-radius:10px;" />
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Raport</label>
                                        <input class="form-control" type="file" name="raport" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Akta Lahir</label>
                                        <input class="form-control" type="file" name="akta_lahir" />
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold">Cabang Olahraga</label>
                                        <select class="form-select" name="cabang_olahraga" id="caborId">
                                            <option value="">-- Pilih --</option>
                                            @foreach($cabor as $c)
                                            <option value="{{ $c->id }}" {{ $c->id == $atlet->cabang_olahraga_id ? 'selected' : '' }}>{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-4"></div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Kelas Cabang Olahraga</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row" id="radioContainer">
                                    @foreach($kelas as $k)
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelas_id" id="kelas_{{ $k->id }}" value="{{ $k->id }}" {{ $k->id == $atlet->kelas_id ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kelas_{{ $k->id }}">{{ $k->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="my-4"></div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Official</h3>
                            </div>
                            <div class="card-body pt-5" id="official-wrapper">
                                @foreach($officials as $index => $o)
                                <div class="row official-item align-items-end mb-4">
                                    <div class="col-md-4">
                                        <input class="form-control" name="officials[{{ $index }}][jabatan]" value="{{ $o->jabatan }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" name="officials[{{ $index }}][nama]" value="{{ $o->nama }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="file" name="officials[{{ $index }}][foto]">
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-official">X</button>
                                    </div>
                                </div>
                                @endforeach
                                <button type="button" id="add-official" class="btn btn-light-primary mb-3">Tambah Official</button>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('athletes.idcard', $atlet->id) }}" class="btn btn-info ms-2" target="_blank">
                                        <i class="fa fa-id-card"></i> Cetak Id Card Tag (PDF)
                                    </a>
                                    <a href="{{ route('athletes.index') }}" class="btn btn-danger ms-2">Cancel</a>
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
$('#form-atlet-edit').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let id = $('#atlet_id').val();

    $.ajax({
        url: `/athletes/update/${id}`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: res.message,
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "{{ route('athletes.index') }}";
            });
        },
        error: function(err) {
            let message = 'Gagal menyimpan data.';
            if (err.status === 422 && err.responseJSON?.errors) {
                message = '<ul>';
                $.each(err.responseJSON.errors, function(field, errors) {
                    errors.forEach(error => message += `<li>${error}</li>`);
                });
                message += '</ul>';
            } else if (err.responseJSON?.message) {
                message = err.responseJSON.message;
            }
            Swal.fire({ icon: 'error', title: 'Error', html: message });
        }
    });
});
</script>
@endsection
