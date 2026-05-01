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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title fw-bold">Biodata Atlet</h3>
                            </div>
                            <div class="card-body" id="atlet-wrapper">
                                <div class="border p-4 mb-4 rounded position-relative atlet-item bg-light">
                                    <div class="d-flex justify-content-end gap-2 mt-2 mb-5 me-2">

                                        @if(Auth::user()->group_id == 14)
                                            @if($atlet->appr_status == '0' || $atlet->appr_status == NULL)
                                            <!-- Approve Button -->
                                            <button type="button" class="btn btn-success btn-sm approve-atlet"
                                                data-id="{{$atlet->id}}">
                                                <i class="fa fa-check"></i>
                                            </button>

                                            <!-- Reject Button -->
                                            <button type="button" class="btn btn-danger btn-sm reject-atlet"
                                                data-id="{{$atlet->id}}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            @endif
                                        @endif

                                        @if(Auth::user()->group_id == 15)
                                            @if($atlet->appr_status == '0' || $atlet->appr_status == NULL)
                                            <button type="button" class="btn btn-primary btn-sm edit-atlet"
                                                data-id="{{$atlet->id}}">
                                                <i class="fa fa-pen-to-square"></i>
                                            </button>
                                            @endif
                                            @if($atlet->appr_status == '1')
                                            <button type="button" class="btn btn-primary btn-print-id-card"
                                                data-id="{{$atlet->id}}">
                                                <i class="fa fa-print"></i>
                                            </button>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="row g-4">
                                        <!-- Foto Profil -->
                                        <div class="col-md-4 text-center">
                                            <div class="mb-5">
                                                <img src="{{ $atlet->pas_foto ? asset('storage/' . $atlet->pas_foto) : 'https://via.placeholder.com/150' }}"
                                                    class="img-thumbnail preview-pas-foto"
                                                    style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;"
                                                    onclick="document.getElementById('input-pas-foto').click()">
                                                <input type="file" name="pas_foto" accept="image/*"
                                                    id="input-pas-foto" class="d-none input-pas-foto">
                                                <div class="mt-2 text-muted small"><i class="fa fa-camera"></i> Klik untuk upload</div>
                                            </div>
                                        </div>

                                        <!-- Biodata -->
                                        <div class="col-md-8">
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="nama_lengkap"
                                                        value="{{ $atlet->nama_lengkap }}" required>
                                                    <input type="hidden" class="form-control"
                                                        name="id" value="{{ $atlet->id }}" id="id"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Tempat Lahir</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="tempat_lahir"
                                                        value="{{ $atlet->tempat_lahir }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Tanggal Lahir</label>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control"
                                                        name="tanggal_lahir"
                                                        value="{{ $atlet->tanggal_lahir }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-md-10">
                                                    <select name="jenis_kelamin" class="form-select">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="L" {{ $atlet->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                            Laki-laki
                                                        </option>
                                                        <option value="P" {{ $atlet->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Nama Sekolah</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="nama_sekolah"
                                                        value="{{ $atlet->nama_sekolah }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">NISN</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control"
                                                        name="nisn" value="{{ $atlet->nisn }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Raport</label>
                                            <div class="col-md-10">
                                                <!-- <input type="file" name="atlets[{{ $atlet->id }}][raport]"
                                                    class="form-control mt-1"> -->
                                                @if($atlet->raport)
                                                <a href="#" class="text-primary"
                                                    onclick="showPdfModal('{{ asset('storage/' . $atlet->raport) }}'); return false;">Lihat
                                                    file Raport (PDF)</a><br>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">SK</label>
                                            <div class="col-md-10">
                                                <!-- <input type="file" name="atlets[{{ $atlet->id }}][sk]"
                                                    class="form-control mt-1"> -->
                                                @if($atlet->sk)
                                                <a href="#" class="text-primary"
                                                    onclick="showPdfModal('{{ asset('storage/' . $atlet->sk) }}'); return false;">Lihat
                                                    file SK (PDF)</a><br>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Akta Lahir</label>
                                            <div class="col-md-10">
                                                <!-- <input type="file" name="atlets[{{ $atlet->id }}][akta_lahir]"
                                                    class="form-control mt-1"> -->
                                                @if($atlet->akta_lahir)
                                                <a href="#" class="text-primary"
                                                    onclick="showPdfModal('{{ asset('storage/' . $atlet->akta_lahir) }}'); return false;">Lihat
                                                    file Akta (PDF)</a><br>
                                                @endif
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Perolehan Medali</label>
                                                <div class="col-md-10">
                                                    <select class="form-select form-select perolehan-medali" name="perolehan_medali">
                                                        <option value="">Pilih Medali</option>
                                                        <option value="1" {{ $atlet->perolehan_medali == 1 ? 'selected' : '' }}>Emas (1)</option>
                                                        <option value="2" {{ $atlet->perolehan_medali == 2 ? 'selected' : '' }}>Perak (2)</option>
                                                        <option value="3" {{ $atlet->perolehan_medali == 3 ? 'selected' : '' }}>Perunggu (3)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-10">
                                <a href="/athletes" class="btn btn-danger">Kembali</a>
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

<!-- Edit Atlet Modal -->
<div class="modal fade" id="editAtletModal" tabindex="-1" aria-labelledby="editAtletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form-atlet-update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAtletModalLabel">Edit Atlet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="registration_id" id="editRegistId">
                    <input type="hidden" class="form-control" name="id" id="editId">
                    <input type="hidden" class="form-control" name="perolehan_medali" id="editPerolehanMedali">
                    <input type="hidden" class="form-control" name="flag" id="flag" value="revision">

                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-5">
                                <img src="https://via.placeholder.com/150" class="img-thumbnail" id="editAtletPhotoPreview"
                                    style="width: 100%; max-width: 300px; height: 300px; object-fit: cover; cursor: pointer;"
                                    onclick="document.getElementById('editAtletPhoto').click()">
                                <input type="file" name="pas_foto" id="editAtletPhoto" class="d-none" accept="image/*">
                                <div class="mt-2 text-muted small"><i class="fa fa-camera"></i> Klik untuk upload foto</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_lengkap" id="editNamaLengkap" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Tempat Lahir</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tempat_lahir" id="editTempatLahir" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="editTanggalLahir" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <select name="jenis_kelamin" class="form-select" id="editJenisKelamin" required>
                                        <option value="">Pilih</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Nama Sekolah</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama_sekolah" id="editNamaSekolah" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">NISN</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nisn" id="editNisn" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Raport</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="raport" id="editRaport">
                                    <small class="text-muted">Pilih file jika perlu mengganti raport</small>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">SK</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="sk" id="editSK">
                                    <small class="text-muted">Pilih file jika perlu mengganti SK</small>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Akta Lahir</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="akta_lahir" id="editAktaLahir">
                                    <small class="text-muted">Pilih file jika perlu mengganti akta lahir</small>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Status Approval</label>
                                <div class="col-md-9">
                                    <span class="badge badge-secondary" id="editAtletApprovalStatus">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>

$(document).on('click', '#print-id-card', function () {
    const atletId = $(this).data('id');
    const url = `/athletes/id-card/59`; // route to controller

    // Set URL ke iframe untuk load konten
    $('#pdfIframe').attr('src', url);

    // Tampilkan modal
    $('#pdfPreviewModal').modal('show');
});

$(document).on('click', '#approve', function() {
    const id = $('#id').val();

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
                    $('#kt_groups_table').DataTable().ajax.reload(null, false);
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

$(document).on('click', '#reject', function() {
    const id = $('#id').val();

    Swal.fire({
        title: 'Tolak Atlet?',
        text: "Masukkan alasan penolakan atlet ini:",
        icon: 'warning',
        input: 'textarea',
        inputPlaceholder: 'Contoh: Dokumen tidak lengkap...',
        inputAttributes: {
            'aria-label': 'Masukkan alasan penolakan'
        },
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Batal',
        inputValidator: (value) => {
            if (!value) {
                return 'Alasan penolakan wajib diisi!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/reject/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: result.value
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil ditolak.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#kt_groups_table').DataTable().ajax.reload();
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

let medalIndex = 0;

$('#add-medals').on('click', function () {
    const row = `
        <div class="row g-3 align-items-center medal-item mb-3" data-index="${medalIndex}">
            <div class="col-md-3">
                <label class="form-label mb-1">Medali</label>
                <select name="medals[${medalIndex}][medal_type]" class="form-select">
                    <option value="">Pilih Medali</option>
                    <option value="emas">Emas</option>
                    <option value="perak">Perak</option>
                    <option value="perunggu">Perunggu</option>
                </select>
            </div>
            <div class="col-md-5">
                <label class="form-label mb-1">Nama Event</label>
                <input type="text" name="medals[${medalIndex}][event]" class="form-control" placeholder="Contoh: PON 2024">
            </div>
            <div class="col-md-2">
                <label class="form-label mb-1">Tahun</label>
                <input type="number" name="medals[${medalIndex}][tahun]" class="form-control" placeholder="e.g. 2024">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-medal mt-7">X</button>
            </div>
        </div>
    `;
    $('#medals-wrapper').append(row);
    medalIndex++;
});


$(document).on('click', '.remove-medal', function () {
    $(this).closest('.medal-item').remove();
});

$('#form-atlet-edit').on('submit', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Simpan Perubahan?',
        text: "Apakah kamu yakin ingin menyimpan perubahan data atlet?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData($('#form-atlet-edit')[0]);
            const id = $('#atlet_id').val();

            $.ajax({
                url: `/athletes/update/${id}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.message
                    }).then(() => {
                        window.location.href = "{{ route('perolehan-medali.index') }}";
                    });
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan'
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

function previewImage(event, index) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
        const img = input.closest('td').querySelector('.official-preview');
        if (img) {
            img.src = reader.result;
        }
    };
    reader.readAsDataURL(input.files[0]);
}

$(document).on('click', '.edit-atlet', function() {
    let atletId = $(this).data('id');
    $.ajax({
        url: `/athletes/edit/${atletId}`, // Pastikan route ini mengembalikan JSON data atlet
        type: 'GET',
        success: function(data) {
            // Isi form modal dengan data dari server
            $('#editRegistId').val(data.event_reg_id);
            $('#editId').val(data.id);
            $('#editNamaLengkap').val(data.nama_lengkap);
            $('#editTempatLahir').val(data.tempat_lahir);
            $('#editTanggalLahir').val(data.tanggal_lahir);
            $('#editJenisKelamin').val(data.jenis_kelamin);
            $('#editNamaSekolah').val(data.nama_sekolah);
            $('#editNisn').val(data.nisn);
            $('#editPerolehanMedali').val(data.perolehan_medali);
            $('#editAtletPhoto').val('');

            if (data.pas_foto) {
                $('#editAtletPhotoPreview').attr('src', data.pas_foto);
            } else {
                $('#editAtletPhotoPreview').attr('src', 'https://via.placeholder.com/150');
            }

            if (typeof data.approval_status !== 'undefined') {
                $('#editAtletApprovalStatus').text(setOfficialModalStatusText(data.approval_status));
            } else {
                $('#editAtletApprovalStatus').text('-');
            }

            // Tampilkan modal
            $('#editAtletModal').modal('show');
        }
    });
});

$(document).on('click', '.approve-atlet', function() {
    const id = $(this).data('id');

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

                    location.href = location.href;
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


$(document).on('click', '.reject-atlet', function() {
    const id = $(this).data('id');

    Swal.fire({
        title: 'Tolak Atlet?',
        text: "Masukkan alasan penolakan atlet ini:",
        icon: 'warning',
        input: 'textarea',
        inputPlaceholder: 'Contoh: Dokumen tidak lengkap...',
        inputAttributes: {
            'aria-label': 'Masukkan alasan penolakan'
        },
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Batal',
        inputValidator: (value) => {
            if (!value) {
                return 'Alasan penolakan wajib diisi!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/athletes/reject/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reason: result.value
                },
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Atlet berhasil ditolak.',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    location.href = location.href;
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


$(document).on('click', '.btn-print-id-card', function () {
    const atletId = $(this).data('id');
    const url = `/athletes/id-card/${atletId}`; // route to controller

    // Set URL ke iframe untuk load konten
    $('#pdfIframe').attr('src', url);

    // Tampilkan modal
    $('#pdfPreviewModal').modal('show');
});
</script>
@endsection
