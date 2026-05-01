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
                                    <label class="form-label fw-bold fs-6">Nomor Registrasi</label>
                                    <input type="text" class="form-control" name="register_number" value="{{ $eventRegistration->register_number }}" readonly required>
                                </div>
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
                                        data-control="select2" id="kelas-cabor-id" disabled>
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
                                                onclick="document.getElementById('atlet-pas-foto-{{ $atlet->id }}').click()">
                                            <input type="file" name="atlets[{{ $atlet->id }}][pas_foto]"
                                                   id="atlet-pas-foto-{{ $atlet->id }}"
                                                   class="d-none input-pas-foto"
                                                   accept="image/*">
                                            <div class="mt-2 text-muted small"><i class="fa fa-camera"></i> Klik untuk upload</div>
                                        </div>
                                    </div>

                                    <!-- Biodata -->
                                    <div class="col-md-8">
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][nama_lengkap]"
                                                    value="{{ $atlet->nama_lengkap }}" readonly required>
                                                <input type="hidden" name="atlets[{{ $atlet->id }}][id]"
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
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Status Approval</label>
                                            <div class="col-md-10">
                                                @if($atlet->appr_status == '0')
                                                <span class="badge badge-danger">{{ $atlet->approval_status_str }}</span>
                                                @elseif($atlet->appr_status == '1')
                                                <span class="badge badge-success">{{ $atlet->approval_status_str }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $atlet->approval_status_str }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        @if($atlet->appr_status == '0')
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Catatan Approval</label>
                                            <div class="col-md-10">
                                                <textarea type="text" class="form-control"
                                                    name="atlets[{{ $atlet->id }}][appr_notes]" readonly>{{ $atlet->appr_notes }}</textarea>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @if(Auth::user()->group_id == 15)
                    <!-- Data Official -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title fw-bold">Data Official</h3>
                        </div>
                        <div class="card-body" id="official-wrapper">
                            @foreach($officials as $official)
                            <div class="border p-4 mb-4 rounded position-relative official-item bg-light" data-approval-status="{{ $official->appr_status }}">
                                <div class="d-flex justify-content-end gap-2 mt-2 mb-5 me-2">
                                    @if(Auth::user()->group_id == 14)
                                        @if($official->appr_status == '0' || $official->appr_status == NULL)
                                        <!-- Approve Button -->
                                        <button type="button" class="btn btn-success btn-sm approve-atlet">
                                            <i class="fa fa-check"></i>
                                        </button>

                                        <!-- Reject Button -->
                                        <button type="button" class="btn btn-danger btn-sm reject-atlet">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        @endif
                                    @endif

                                    @if(Auth::user()->group_id == 15)
                                        @if($official->appr_status == '0' || $official->appr_status == NULL)
                                        <button type="button" class="btn btn-primary btn-sm edit-official"
                                            data-id="{{$official->id}}">
                                            <i class="fa fa-pen-to-square"></i>
                                        </button>
                                        @endif
                                        @if($official->appr_status == '1')
                                        <button type="button" class="btn btn-primary btn-print-id-card"
                                            data-id="{{$official->id}}">
                                            <i class="fa fa-print"></i>
                                        </button>
                                        @endif
                                    @endif
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-4 text-center">
                                        <div class="mb-5">
                                            <img src="{{ $official->foto ? asset('storage/' . $official->foto) : 'https://via.placeholder.com/120' }}"
                                                class="img-thumbnail preview-foto-official mb-2"
                                                style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;"
                                                onclick="document.getElementById('official-foto-{{ $official->id }}').click()">
                                            <input type="file" name="officials[{{ $official->id }}][foto]"
                                                id="official-foto-{{ $official->id }}"
                                                class="d-none input-foto-official"
                                                accept="image/*">
                                            <div class="mt-2 text-muted small"><i class="fa fa-camera"></i> Klik untuk upload</div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <input type="text" name="officials[{{ $official->id }}][nama_lengkap]"
                                                    placeholder="Nama Lengkap" class="form-control" value="{{$official->nama}}"
                                                    required readonly>
                                                <input type="hidden" name="officials[{{$official->id}}][id]"
                                                    value="{{$official->id}}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Jabatan</label>
                                            <div class="col-md-10">
                                                <select class="form-select" required disabled>
                                                    <option value="">Pilih Jabatan</option>
                                                    @foreach($jabatans as $jab)
                                                    <option value="{{$jab->id}}"
                                                        <?php echo ($official->jabatan_id == $jab->id) ? 'selected' : ''; ?>>
                                                        {{$jab->nama_jabatan}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="officials[{{$official->id}}][jabatan]" value="{{$official->jabatan_id}}">
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <label class="col-md-2 col-form-label">Status Approval</label>
                                            <div class="col-md-10">
                                                @if($official->appr_status == '0')
                                                <span class="badge badge-danger">{{ $official->approval_status_str ?? 'Rejected' }}</span>
                                                @elseif($official->appr_status == '1')
                                                <span class="badge badge-success">{{ $official->approval_status_str ?? 'Approved' }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $official->approval_status_str ?? 'Waiting Approval' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- Submit -->
                    <div class="text-end mb-10">
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

<!-- Edit Official Modal -->
<div class="modal fade" id="editOfficialModal" tabindex="-1" aria-labelledby="editOfficialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form-official-update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfficialModalLabel">Edit Official</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editOfficialId" name="official_id">
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-5">
                                <img src="https://via.placeholder.com/150" class="img-thumbnail" id="officialModalPhotoPreview"
                                    style="width: 300px; height: 300px; object-fit: cover; cursor: pointer;"
                                    onclick="document.getElementById('editOfficialPhoto').click()">
                                <input type="file" name="foto" id="editOfficialPhoto" class="d-none" accept="image/*">
                                <div class="mt-2 text-muted small"><i class="fa fa-camera"></i> Klik untuk upload foto</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="editOfficialName" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Jabatan</label>
                                <div class="col-md-9">
                                    <select class="form-select" id="editOfficialJabatan" name="jabatan" required>
                                        <option value="">Pilih Jabatan</option>
                                        @foreach($jabatans as $jab)
                                        <option value="{{ $jab->id }}">{{ $jab->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-md-3 col-form-label">Status Approval</label>
                                <div class="col-md-9">
                                    <span class="badge badge-secondary" id="editOfficialApprovalStatus">-</span>
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

function setOfficialModalStatusText(status) {
    if (status === '0') {
        return 'Rejected';
    }
    if (status === '1') {
        return 'Approved';
    }
    return 'Waiting Approval';
}

$(document).on('click', '.edit-official', function() {
    const $row = $(this).closest('.official-item');
    const officialId = $(this).data('id');
    const name = $row.find('input[name="officials[' + officialId + '][nama_lengkap]"]').val();
    const jabatan = $row.find('input[name="officials[' + officialId + '][jabatan]"]').val();
    const approvalStatus = $row.data('approval-status');
    const photoSrc = $row.find('.preview-foto-official').attr('src');

    $('#editOfficialId').val(officialId);
    $('#editOfficialName').val(name);
    $('#editOfficialJabatan').val(jabatan);
    $('#editOfficialApprovalStatus').text(setOfficialModalStatusText(approvalStatus));
    $('#officialModalPhotoPreview').attr('src', photoSrc || 'https://via.placeholder.com/150');
    $('#editOfficialPhoto').val('');

    $('#editOfficialModal').modal('show');
});

$('#editOfficialPhoto').on('change', function() {
    const input = this;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#officialModalPhotoPreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
});

$('#editAtletPhoto').on('change', function() {
    const input = this;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#editAtletPhotoPreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
});

$('#form-official-update').on('submit', function(e) {
    e.preventDefault();

    const officialId = $('#editOfficialId').val();
    const formData = new FormData(this);

    Swal.fire({
        title: 'Simpan Perubahan Official?',
        text: 'Apakah kamu yakin ingin menyimpan perubahan official ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (!result.isConfirmed) {
            return;
        }

        $.ajax({
            url: `/officials/update/${officialId}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil',
                    text: response.message || 'Data official berhasil diperbarui.',
                    icon: 'success',
                    timer: 1200,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                let message = 'Terjadi kesalahan saat menyimpan data official.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Gagal',
                    text: message,
                    icon: 'error'
                });
            }
        });
    });
});

$('#form-atlet-update').on('submit', function(e) {
    e.preventDefault();

    // Validasi form update atlet
    let errorMessages = [];

    const namaLengkap = $('#editNamaLengkap').val();
    const tempatLahir = $('#editTempatLahir').val();
    const tanggalLahir = $('#editTanggalLahir').val();
    const jenisKelamin = $('#editJenisKelamin').val();
    const namaSekolah = $('#editNamaSekolah').val();
    const nisn = $('#editNisn').val();

    if (!namaLengkap) {
        errorMessages.push('• Nama Lengkap harus diisi');
        $('#editNamaLengkap').addClass('is-invalid');
    } else {
        $('#editNamaLengkap').removeClass('is-invalid');
    }

    if (!tempatLahir) {
        errorMessages.push('• Tempat Lahir harus diisi');
        $('#editTempatLahir').addClass('is-invalid');
    } else {
        $('#editTempatLahir').removeClass('is-invalid');
    }

    if (!tanggalLahir) {
        errorMessages.push('• Tanggal Lahir harus diisi');
        $('#editTanggalLahir').addClass('is-invalid');
    } else {
        $('#editTanggalLahir').removeClass('is-invalid');
    }

    if (!jenisKelamin) {
        errorMessages.push('• Jenis Kelamin harus dipilih');
        $('#editJenisKelamin').addClass('is-invalid');
    } else {
        $('#editJenisKelamin').removeClass('is-invalid');
    }

    if (!namaSekolah) {
        errorMessages.push('• Nama Sekolah harus diisi');
        $('#editNamaSekolah').addClass('is-invalid');
    } else {
        $('#editNamaSekolah').removeClass('is-invalid');
    }

    if (!nisn) {
        errorMessages.push('• NISN harus diisi');
        $('#editNisn').addClass('is-invalid');
    } else {
        $('#editNisn').removeClass('is-invalid');
    }

    // Tampilkan error jika ada
    if (errorMessages.length > 0) {
        Swal.fire({
            title: 'Validasi Gagal!',
            html: errorMessages.join('<br>'),
            icon: 'error'
        });
        return;
    }

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
            const formData = new FormData($('#form-atlet-update')[0]);
            const id = $('#editId').val();

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
                        location.href = location.href;
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
