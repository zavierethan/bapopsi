<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi | BAPOPSI Kabupaten Bandung</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/bapopsi-logo.png')}}" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/sporty-theme.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="kt_register_form" method="POST" action="{{ route('register.save') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Buat Akun</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Daftarkan Diri Anda untuk Memulai</div>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" autocomplete="off" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required />
                            </div>
                            <div class="row fv-row mb-8">
                                <div class="col-xl-6">
                                    <select name="jenjang" class="form-select bg-transparent" id="jenjang" required>
                                        <option value="" disabled selected>-- Pilih Jenjang --</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <select name="kecamatan_id" class="form-select bg-transparent" id="kecamatan" required>
                                        <option disabled selected>-- Pilih Kecamatan --</option>
                                        @foreach($kecamatan as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="fv-row mb-8" id="sub-rayon" style="display:none;">
                                <select name="sub_rayon_id" class="form-select bg-transparent" id="subRayonSelect">
                                    <option value="" disabled selected>-- Pilih Sub Rayon --</option>
                                </select>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" id="passwordInputReg" required />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="togglePasswordReg" style="cursor:pointer;">
                                            <i class="fa fa-eye-slash" id="iconEyeReg"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Gunakan 8+ karakter dengan campuran huruf, angka & simbol.</div>
                            </div>
                            <div class="fv-row mb-8 position-relative">
                                <input class="form-control bg-transparent" type="password" placeholder="Konfirmasi Password" name="password_confirmation" autocomplete="off" id="confirmPasswordInputReg" required />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggleConfirmPasswordReg" style="cursor:pointer;">
                                    <i class="fa fa-eye-slash" id="iconEyeConfirmReg"></i>
                                </span>
                                <div class="text-danger small mt-1" id="passwordMismatchWarning" style="display:none;">Password yang dimasukkan tidak sama.</div>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_register_submit" class="btn btn-primary">
                                    <span class="indicator-label">Daftar</span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Sudah punya akun?
                                <a href="{{ url('/login') }}" class="link-primary">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="alert alert-info p-4 rounded shadow-sm">
                        <div class="fw-bold mb-2">Informasi Pendaftaran :</div>
                        <ul class="mb-0 ps-4">
                            <li>Akun akan diverifikasi oleh admin dalam 1-2 hari kerja. Jika dalam hari ketiga anda tidak bisa login berarti akun anda tidak terverifikasi, lakukan pendaftaran ulang akun.</li>
                            <li>Pastikan data yang dimasukkan sudah benar.</li>
                            <li>Hubungi admin jika ada kendala dalam pendaftaran.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background: linear-gradient(135deg, #FF6B35 0%, #1E3A8A 50%, #3B82F6 100%);">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <a href="#" class="mb-12">
                        <img alt="Logo" src="{{ asset('assets/media/logos/bapopsi-logo.png') }}" class="h-100px h-lg-120px" />
                    </a>
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Membangun Generasi Emas</h1>
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        Platform digital terdepan untuk mengelola pertandingan olahraga pelajar, melacak prestasi atlet, dan membangun ekosistem kompetisi yang unggul. <br /> Bersaing, Berprestasi, Berjaya bersama BAPOPSI.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Assets -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <!-- AJAX & Dependent Dropdown Logic -->
    <script>
        $(document).ready(function () {
            $('#jenjang').on("change", function () {
                if ($(this).val() === "SMP") {
                    $('#sub-rayon').show();
                } else {
                    $('#sub-rayon').hide();
                    $('#subRayonSelect').val('');
                }
            });

            $('#kecamatan').on('change', function () {
                var kecamatanId = $(this).val();
                var $subRayonSelect = $('#subRayonSelect');
                if (!kecamatanId) return;
                $.ajax({
                    url: '/api/getSubRayonByKecamatan/' + kecamatanId,
                    method: 'GET',
                    success: function (response) {
                        var data = response.data || [];
                        $subRayonSelect.empty().append('<option value="" disabled selected>-- Pilih Sub Rayon --</option>');
                        $.each(data, function (index, item) {
                            $subRayonSelect.append($('<option></option>').val(item.id).text(item.nama));
                        });
                    },
                    error: function (xhr) {
                        console.error('Gagal mengambil data sub rayon:', xhr);
                    }
                });
            });

            // AJAX Form Submission
            $('#kt_register_form').on('submit', function (e) {
                e.preventDefault();
                let form = $(this);
                let formData = form.serialize();

                $('#kt_register_submit').prop('disabled', true).text('Memproses...');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function (response) {
                        alert('Registrasi berhasil!');
                        window.location.href = "/login";
                    },
                    error: function (xhr) {
                        let msg = 'Terjadi kesalahan saat mendaftar.';
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            msg = Object.values(errors).flat().join("\n");
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        alert(msg);
                    },
                    complete: function () {
                        $('#kt_register_submit').prop('disabled', false).text('Daftar');
                    }
                });
            });

            // Toggle password visibility (register)
            $(document).on('click', '#togglePasswordReg', function() {
                const input = $('#passwordInputReg');
                const icon = $('#iconEyeReg');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
            $(document).on('click', '#toggleConfirmPasswordReg', function() {
                const input = $('#confirmPasswordInputReg');
                const icon = $('#iconEyeConfirmReg');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
