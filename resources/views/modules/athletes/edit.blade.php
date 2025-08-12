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
                                <!-- <button type="button" id="add-atlet" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-plus"></i> Tambah Atlet
                            </button> -->
                            </div>
                            <div class="card-body" id="atlet-wrapper">
                                <div class="border p-4 mb-4 rounded position-relative atlet-item bg-light">
                                    <div class="row g-4">
                                        <!-- Foto Profil -->
                                        <div class="col-md-4 text-center">
                                            <div class="mb-5">
                                                <img src="{{ $atlet->pas_foto ? asset('storage/' . $atlet->pas_foto) : 'https://via.placeholder.com/150' }}"
                                                    class="img-thumbnail preview-pas-foto"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            </div>
                                            <input type="file" name="pas_foto" accept="image/*"
                                                class="form-control input-pas-foto">
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
                                                <label class="col-md-2 col-form-label">Rapor</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="raport"
                                                        class="form-control mt-1">
                                                    @if($atlet->raport)
                                                    <a href="#" class="text-primary"
                                                        onclick="showPdfModal('{{ asset('storage/' . $atlet->raport) }}'); return false;">Lihat
                                                        file Raport (PDF)</a><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <label class="col-md-2 col-form-label">Akta Lahir</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="akta_lahir"
                                                        class="form-control mt-1">
                                                    @if($atlet->akta_lahir)
                                                    <a href="#" class="text-primary"
                                                        onclick="showPdfModal('{{ asset('storage/' . $atlet->akta_lahir) }}'); return false;">Lihat
                                                        file Akta (PDF)</a><br>
                                                    @endif
                                                </div>
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
                        </div>
                        <div class="d-flex justify-content-between mb-10">
                            <div>
                                <a href="/perolehan-medali" class="btn btn-danger">Kembali</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success me-2" id="submit">Submit</button>
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
</script>
@endsection
