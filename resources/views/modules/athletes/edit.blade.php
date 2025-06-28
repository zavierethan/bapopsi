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
                                    <div class="col-md-6 mb-4">
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Nama Lengkap</label>
                                                <input type="hidden" id="atlet_id" value="{{ $atlet->id }}">
                                                <input class="form-control form-control-md"
                                                    type="text" name="nama_lengkap" value="{{ $atlet->nama_lengkap }}" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Tempat Lahir</label>
                                                <input class="form-control form-control-md"
                                                    type="text" name="tempat_lahir" value="{{ $atlet->tempat_lahir }}" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Tanggal Lahir</label>
                                                <input class="form-control form-control-md"
                                                    type="date" name="tanggal_lahir" value="{{ $atlet->tanggal_lahir }}" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Jenis Kelamin</label>
                                                <div class="position-relative mb-3">
                                                    <select class="form-select" data-control="select2"
                                                        data-placeholder="-" name="jenis_kelamin" id="jenis_kelamin">
                                                        <option value=""></option>
                                                        <option value="L" <?php echo ($atlet->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki - Laki</option>
                                                        <option value="P" <?php echo ($atlet->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Nama Sekolah</label>
                                                <input class="form-control form-control-md"
                                                    type="text" name="nama_sekolah" value="{{ $atlet->nama_sekolah }}" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">NISN</label>
                                                <input class="form-control form-control-md"
                                                    type="text" name="nisn" value="{{ $atlet->nisn }}" />
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Cabang Olahraga</label>
                                                <div class="position-relative mb-3">
                                                    <select class="form-select" name="cabang_olahraga" data-control="select2" id="caborId">
                                                        @foreach($cabor as $c)
                                                        <option value="{{ $c->id }}" {{ $c->id == $atlet->cabang_olahraga_id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Kelas Cabang
                                                    Olahraga</label>
                                                <div class="position-relative mb-3 mt-2" id="radioContainer">
                                                    @foreach($kelas as $k)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kelas_id" id="kelas_{{ $k->id }}" value="{{ $k->id }}" {{ $k->id == $atlet->kelas_id ? 'checked' : '' }}>
                                                        <label class="form-label fw-bold fs-6 mb-2" for="kelas_{{ $k->id }}">{{ $k->name }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Pas Photo</label>
                                                <input class="form-control form-control-md"
                                                    type="file" name="pas_foto" id="inputPasFoto" accept="image/*" />
                                                @if($atlet->pas_foto)
                                                <img src="{{ asset('storage/' . $atlet->pas_foto) }}" id="previewFoto" class="mt-2" style="max-width:140px; max-height:180px; border-radius:10px;" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Raport</label>
                                                <input class="form-control form-control-md"
                                                    type="file" name="raport" />
                                                @if($atlet->raport)
                                                    <small class="d-block mt-1">
                                                        <a href="#" class="text-primary" onclick="showPdfModal('{{ asset('storage/' . $atlet->raport) }}'); return false;">Lihat file Raport (PDF)</a>
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="fv-row mb-5">
                                            <div class="mb-1">
                                                <label class="form-label fw-bold fs-6 mb-2">Akta Lahir</label>
                                                <input class="form-control form-control-md"
                                                    type="file" name="akta_lahir" />
                                                @if($atlet->akta_lahir)
                                                    <small class="d-block mt-1">
                                                        <a href="#" class="text-primary" onclick="showPdfModal('{{ asset('storage/' . $atlet->akta_lahir) }}'); return false;">Lihat file Akta Lahir (PDF)</a>
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
                                        <select class="form-select" data-control="select2" data-placeholder="-" name="officials[{{ $index }}][jabatan]">
                                            <option value=""></option>
                                            @foreach($jabatan as $jab)
                                            <option value="{{$jab->id}}" <?php echo ($jab->id == $o->jabatan_id ) ? 'selected' : ''; ?>>{{$jab->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
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
                                    @if($atlet->appr_status == 1 && Auth::user()->group_id == 15)
                                    <button type="submit" class="btn btn-primary ms-2">Update</button>
                                    @endif
                                    @if(is_null($atlet->appr_status) && (Auth::user()->group_id == 14 || Auth::user()->group_id == 1))
                                    <button type="submit" class="btn btn-primary ms-2">Approve</button>
                                    <button type="submit" class="btn btn-danger ms-2">Reject</button>
                                    @endif

                                    @if($atlet->appr_status == 1)
                                    <a href="{{ route('athletes.idcard', $atlet->id) }}" class="btn btn-info ms-2" target="_blank">
                                        <i class="fa fa-id-card"></i> Cetak Id Card Tag (PDF)
                                    </a>
                                    @endif
                                    <a href="{{ route('athletes.index') }}" class="btn btn-danger ms-2">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview PDF -->
<div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfIframe" src="" width="100%" height="600px" style="border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

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

function showPdfModal(pdfUrl) {
    $('#pdfIframe').attr('src', pdfUrl);
    $('#pdfPreviewModal').modal('show');
}
</script>
@endsection
