@extends('layouts.main')

@section('main-content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <form id="form-atlet-edit" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="atlet_id" value="{{ $atlet->id }}">

                        <!-- Biodata Atlet -->
                        <div class="card mb-5">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Biodata Atlet</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Nama -->
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="{{ $atlet->nama_lengkap }}">
                                        </div>
                                        <!-- Tempat Lahir -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="{{ $atlet->tempat_lahir }}">
                                        </div>
                                        <!-- Tanggal Lahir -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $atlet->tanggal_lahir }}">
                                        </div>
                                        <!-- Jenis Kelamin -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" data-control="select2">
                                                <option value="L" {{ $atlet->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                                <option value="P" {{ $atlet->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <!-- Nama Sekolah -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Sekolah</label>
                                            <input type="text" name="nama_sekolah" class="form-control" value="{{ $atlet->nama_sekolah }}">
                                        </div>
                                        <!-- NISN -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">NISN</label>
                                            <input type="text" name="nisn" class="form-control" value="{{ $atlet->nisn }}">
                                        </div>
                                        <!-- Cabang Olahraga -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Cabang Olahraga</label>
                                            <select name="cabang_olahraga" id="caborId" class="form-select" data-control="select2">
                                                @foreach($cabor as $c)
                                                <option value="{{ $c->id }}" {{ $c->id == $atlet->cabang_olahraga_id ? 'selected' : '' }}>
                                                    {{ $c->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Kelas -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Kelas Cabang</label>
                                            <div id="radioContainer">
                                                @foreach($kelas as $k)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelas_id" id="kelas_{{ $k->id }}" value="{{ $k->id }}" {{ $k->id == $atlet->kelas_id ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="kelas_{{ $k->id }}">{{ $k->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Pas Foto -->
                                        <div class="mb-3">
                                            <label class="form-label">Pas Foto</label>
                                            <input type="file" name="pas_foto" class="form-control" accept="image/*">
                                            @if($atlet->pas_foto)
                                            <img src="{{ asset('storage/' . $atlet->pas_foto) }}" class="mt-2" style="max-width:140px;">
                                            @endif
                                        </div>
                                        <!-- Raport -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Raport</label>
                                            <input type="file" name="raport" class="form-control">
                                            @if($atlet->raport)
                                             <a href="#" class="text-primary" onclick="showPdfModal('{{ asset('storage/' . $atlet->raport) }}'); return false;">Lihat file Raport (PDF)</a>
                                            @endif
                                        </div>
                                        <!-- Akta -->
                                         <div class="separator my-5"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Akta Lahir</label>
                                            <input type="file" name="akta_lahir" class="form-control">
                                            @if($atlet->akta_lahir)
                                            <a href="#" class="text-primary" onclick="showPdfModal('{{ asset('storage/' . $atlet->akta_lahir) }}'); return false;">Lihat file Akta Lahir (PDF)</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Officials Table -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Official</h3>
                            </div>
                            <div class="card-body pt-5" id="official-wrapper">
                                <table class="table align-middle">
                                    <thead>
                                        <tr class="text-start text-gray-700 fw-bolder fs-7 text-uppercase gs-0">
                                            <th style="width: 20%;">Foto</th>
                                            <th style="width: 25%;">Jabatan</th>
                                            <th style="width: 25%;">Nama</th>
                                            <th style="width: 5%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($officials as $index => $o)
                                        <tr class="official-item">
                                            <td class="text-center">
                                                <label for="official-foto-{{ $index }}" style="cursor:pointer;">
                                                    <img src="{{ $o->foto ? asset('storage/' . $o->foto) : asset('assets/img/placeholder.jpg') }}"
                                                        class="img-thumbnail official-preview mb-2" style="max-height: 100px;">
                                                </label>
                                                <input class="form-control d-none" type="file" name="officials[{{ $index }}][foto]"
                                                    id="official-foto-{{ $index }}" onchange="previewImage(event, {{ $index }})">
                                                <input type="hidden" name="officials[{{ $index }}][foto_existing]" value="{{ $o->foto }}">
                                            </td>
                                            <td>
                                                <select name="officials[{{ $index }}][jabatan]" class="form-select" data-control="select2">
                                                    <option value=""></option>
                                                    @foreach($jabatan as $jab)
                                                    <option value="{{ $jab->id }}" {{ $jab->id == $o->jabatan_id ? 'selected' : '' }}>
                                                        {{ $jab->nama_jabatan }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" name="officials[{{ $index }}][nama]" value="{{ $o->nama }}">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm remove-official">X</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="button" id="add-official" class="btn btn-light-primary mt-3">Tambah Official</button>

                                <div class="d-flex justify-content-end mt-4">
                                    @if($atlet->appr_status == 1 && Auth::user()->group_id == 15)
                                    <button type="submit" class="btn btn-primary ms-2">Update</button>
                                    @endif

                                    @if(is_null($atlet->appr_status) && (Auth::user()->group_id == 14 ||
                                    Auth::user()->group_id == 1))
                                    <a href="#" class="btn btn-primary ms-2" id="btn-approve">Approve</a>
                                    <a href="#" class="btn btn-danger ms-2" id="btn-reject">Reject</a>
                                    @endif

                                    @if($atlet->appr_status == 1)
                                    <a href="{{ route('athletes.idcard', $atlet->id) }}" class="btn btn-info ms-2"
                                        target="_blank">
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
let officialIndex = {{ count($officials) }};

function previewImage(event, index) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function () {
        const img = input.closest('td').querySelector('.official-preview');
        if (img) {
            img.src = reader.result;
        }
    };
    reader.readAsDataURL(input.files[0]);
}

$('#add-official').on('click', function () {
    const row = `
        <tr class="official-item">
            <td class="text-center">
                <label for="official-foto-${officialIndex}" style="cursor:pointer;">
                    <img src="{{ asset('assets/img/placeholder.jpg') }}" class="img-thumbnail official-preview mb-2" style="max-height: 100px;">
                </label>
                <input class="form-control d-none" type="file" name="officials[${officialIndex}][foto]" id="official-foto-${officialIndex}" onchange="previewImage(event, ${officialIndex})">
                <input type="hidden" name="officials[${officialIndex}][foto_existing]" value="">
            </td>
            <td>
                <select name="officials[${officialIndex}][jabatan]" class="form-select jabatan-select" data-control="select2">
                    <option value=""></option>
                    @foreach($jabatan as $jab)
                    <option value="{{ $jab->id }}">{{ $jab->nama_jabatan }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input class="form-control" name="officials[${officialIndex}][nama]" value="">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-official">X</button>
            </td>
        </tr>
    `;
    $('table tbody').append(row);
    $(`select[name="officials[${officialIndex}][jabatan]"]`).select2();
    officialIndex++;
});

$(document).on('click', '.remove-official', function () {
    $(this).closest('tr').remove();
});

$('#form-atlet-edit').on('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const id = $('#atlet_id').val();

    $.ajax({
        url: `/athletes/update/${id}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: res.message
            }).then(() => {
                window.location.href = "{{ route('athletes.index') }}";
            });
        },
        error: function (err) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Terjadi kesalahan'
            });
        }
    });
});

$(document).on('click', '#btn-approve', function() {
    const id = $('#atlet_id').val();

    Swal.fire({
        title: 'Approve Atlet?',
        text: "Apakah kamu yakin ingin menyetujui atlet ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Setujui!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/approve/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil disetujui.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal menyetujui atlet.'
                    });
                }
            });
        }
    });
});


$(document).on('click', '#btn-reject', function() {
    const id = $('#atlet_id').val();

    Swal.fire({
        title: 'Tolak Atlet?',
        text: "Apakah kamu yakin ingin menolak atlet ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/reject/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil ditolak.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal menolak atlet.'
                    });
                }
            });
        }
    });
});

function showPdfModal(pdfUrl) {
    $('#pdfIframe').attr('src', pdfUrl);
    $('#pdfPreviewModal').modal('show');
}
</script>
@endsection
