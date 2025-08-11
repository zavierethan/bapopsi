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
                        <li class="breadcrumb-item text-muted">Edit</li>
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
                                    <label class="form-label fw-bold fs-6">Event</label>
                                    <select name="event_id" class="form-select form-select-solid"
                                        data-control="select2" disabled>
                                        <option value="">Pilih Event</option>
                                        @foreach($events as $event)
                                        <option value="{{ $event->id }}"
                                            <?php echo ($eventRegistration->event_id == $event->id) ? 'selected' : ''; ?>>
                                            {{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold fs-6">Jenjang</label>
                                    <select name="jenjang" class="form-select form-select-solid" data-control="select2"
                                        id="jenjang" disabled>
                                        <option value="">Pilih Jenjang</option>
                                        <option value="SD"
                                            <?php echo ($eventRegistration->jenjang == 'SD') ? 'selected' : '' ;?>>SD
                                        </option>
                                        <option value="SMP"
                                            <?php echo ($eventRegistration->jenjang == 'SMP') ? 'selected' : '' ;?>>SMP
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold fs-6">Cabang Olahraga</label>
                                    <select name="cabang_olahraga_id" class="form-select form-select-solid"
                                        data-control="select2" id="cabor-id" disabled>
                                        <option value="">Pilih Cabang</option>
                                        @foreach($cabangOlahraga as $cabor)
                                        <option value="{{ $cabor->id }}"
                                            <?php echo ($eventRegistration->sport_id == $cabor->id) ? 'selected' : ''; ?>>
                                            {{ $cabor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold fs-6 d-block">No. Kelas Pertandingan</label>
                                    <select name="kelas_olahraga_id" class="form-select form-select-solid"
                                        data-control="select2" id="kelas-cabor-id">
                                        <option value="">Pilih Cabang</option>
                                        @foreach($kelasOlahraga as $kelas)
                                        <option value="{{ $cabor->id }}"
                                            <?php echo ($kelas->id == $eventRegistration->sport_class_id) ? 'selected' : '' ;?>>
                                            {{$kelas->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Atlet -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title fw-bold">Data Atlet</h3>
                        </div>
                        <div class="card-body" id="atlet-wrapper">
                            @foreach($atlets as $atlet)
                            <div class="border p-4 mb-4 rounded position-relative atlet-item bg-light">
                                <div class="d-flex justify-content-end gap-2 mt-2 mb-5 me-2">
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

                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-primary btn-sm edit-atlet"
                                        data-id="{{$atlet->id}}">
                                        <i class="fa fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div class="row g-4">
                                    <!-- Foto Profil -->
                                    <div class="col-md-4 text-center">
                                        <div class="mb-5">
                                            <img src="{{ $atlet->pas_foto ? asset('storage/' . $atlet->pas_foto) : 'https://via.placeholder.com/150' }}"
                                                class="img-thumbnail preview-pas-foto"
                                                style="width: 150px; height: 150px; object-fit: cover;">
                                        </div>
                                        <input type="file" name="atlets[{{ $atlet->id }}][pas_foto]" accept="image/*"
                                            class="form-control input-pas-foto">
                                    </div>

                                    <!-- Biodata -->
                                    <div class="col-md-8">
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][nama_lengkap]"
                                                    value="{{ $atlet->nama_lengkap }}" readonly required>
                                                <input type="hidden" class="form-control" name="atlets[${index}][id]"
                                                    value="{{ $atlet->id }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][tempat_lahir]"
                                                    value="{{ $atlet->tempat_lahir }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-10">
                                                <input type="date" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][tanggal_lahir]"
                                                    value="{{ $atlet->tanggal_lahir }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select name="atlets[{{ $atlet->id }}][jenis_kelamin]" class="form-select" disabled>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="L"
                                                        {{ $atlet->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                                    </option>
                                                    <option value="P"
                                                        {{ $atlet->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Nama Sekolah</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][nama_sekolah]"
                                                    value="{{ $atlet->nama_sekolah }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">NISN</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="atlets[{{ $atlet->id }}][nisn]"
                                                    value="{{ $atlet->nisn }}" readonly>
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
                                                    onclick="showPdfModal('{{ asset('storage/' . $atlet->raport) }}'); return false;">Lihat
                                                    file Raport (PDF)</a><br>
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
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Status Approval</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="atlets[{{ $atlet->id }}][nisn]"
                                                    value="{{ $atlet->approval_status }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Catatan Approval</label>
                                            <div class="col-md-10">
                                                <textarea type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][appr_notes]" readonly>{{ $atlet->appr_notes }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Data Official -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title fw-bold">Data Official</h3>
                            <!-- <button type="button" id="add-official" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-plus"></i> Tambah Official
                            </button> -->
                        </div>
                        <div class="card-body" id="official-wrapper">
                            @foreach($officials as $official)
                            <div class="border p-4 mb-4 rounded position-relative official-item bg-light">
                                <div
                                    class="d-flex justify-content-end gap-2 mt-2 mb-5 me-2 position-absolute top-0 end-0">
                                    <!-- Approve Button -->
                                    <button type="button" class="btn btn-success btn-sm approve-atlet">
                                        <i class="fa fa-check"></i>
                                    </button>

                                    <!-- Reject Button -->
                                    <button type="button" class="btn btn-danger btn-sm reject-atlet">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-4 text-center">
                                        <img src="{{ $official->foto ? asset('storage/' . $official->foto) : 'https://via.placeholder.com/120' }}"
                                            class="img-thumbnail preview-foto-official mb-2"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                        <input type="file" name="officials[ {{$official->id}} ][foto]"
                                            class="form-control input-foto-official">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="officials[${index}][nama_lengkap]"
                                            placeholder="Nama Lengkap" class="form-control" value="{{$official->nama}}"
                                            required>
                                        <input type="hidden" name="officials[{{$official->id}}][id]" class="form-control"
                                            value="{{$official->id}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="officials[{{$official->id}}][jabatan]" class="form-select" required>
                                            <option value="">Pilih Jabatan</option>
                                            @foreach($jabatans as $jab)
                                            <option value="{{$jab->id}}"
                                                <?php echo ($official->jabatan_id == $jab->id) ? 'selected' : ''; ?>>
                                                {{$jab->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-end mb-10">
                        <button type="button" class="btn btn-success" id="submit-form">Submit</button>
                        <a href="/event-registrations" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
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
$('#submit-form').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah kamu yakin ingin memperbaharui data ini?",
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
                url: "{{ route('event-registrations.update', ['id' => $eventRegistration->id]) }}",
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
                        text: 'Data berhasil diperbaharui.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href =
                            "{{ route('event-registrations.index') }}"; // redirect jika perlu
                    });
                },
                error: function(xhr) {
                    console.log(xhr);
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error'
                    });
                }
            });
        }
    });
});

let atletIndex = 0;
let officialIndex = 0;

const jabatanOptions = @json($jabatans);

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
    let $radioContainer = $('#radioContainer');
    $radioContainer.empty();

    if (sportId) {
        $.ajax({
            url: '/api/getKelasByCabor/' + sportId,
            method: 'GET',
            success: function(response) {
                const $container = $('#radioContainer');
                $container.empty();

                // Buat struktur row dan col
                const $row = $('<div class="row mt-5"></div>');
                const $col = $('<div class="col-md-12 mb-4"></div>');
                const $label = $(
                    '<label class="form-label fw-bold fs-6 d-block">Kelas Cabang Olahraga</label>'
                );

                // Tambahkan label ke col
                $col.append($label);

                // Loop hanya checkbox-nya
                $.each(response.data, function(index, item) {
                    const $formCheck = $(`
                        <div class="form-check form-check-inline me-4">
                            <input class="form-check-input" type="radio" name="sport_class_id" id="kelas_${item.id}" value="${item.id}">
                            <label class="form-check-label" for="kelas_${item.id}">${item.name}</label>
                        </div>
                    `);
                    $col.append($formCheck);
                });

                $row.append($col);
                $container.append($row);
            },
            error: function() {
                $('#radioContainer').html('<p class="text-danger">Gagal memuat kelas.</p>');
            }
        });
    }
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

function showPdfModal(pdfUrl) {
    $('#pdfIframe').attr('src', pdfUrl);
    $('#pdfPreviewModal').modal('show');
}
</script>
@endsection
