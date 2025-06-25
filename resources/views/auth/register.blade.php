<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi | BAPOPSI</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/sporty-theme.css') }}" rel="stylesheet" />
</head>

<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">

            {{-- Left Side Form --}}
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" id="kt_register_form" method="POST"
                            action="{{ route('register.save') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Buat Akun</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Daftarkan Diri Anda untuk Memulai</div>
                            </div>

                            {{-- Fields --}}
                            <div class="fv-row mb-8">
                                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                                    class="form-control bg-transparent" required />
                            </div>
                            <div class="fv-row mb-8">
                                <input type="email" name="email" placeholder="Email" class="form-control bg-transparent"
                                    required />
                            </div>
                            <div class="fv-row mb-8">
                                <select name="jenjang" class="form-control bg-transparent" id="jenjang" required>
                                    <option disabled selected>-- Pilih Jenjang --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                </select>
                            </div>
                            <div class="fv-row mb-8">
                                <select name="kecamatan_id" class="form-control bg-transparent" id="kecamatan" required>
                                    <option disabled selected>-- Pilih Kecamatan --</option>
                                    @foreach($kecamatan as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-8" id="sub-rayon" style="display:none;">
                                <select name="sub_rayon_id" class="form-control bg-transparent" id="subRayonSelect">
                                    <option disabled selected>-- Pilih Sub Rayon --</option>
                                </select>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" name="username" placeholder="Username"
                                    class="form-control bg-transparent" required />
                            </div>

                            {{-- Password --}}
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="position-relative mb-3">
                                    <input type="password" name="password" id="passwordInputReg" placeholder="Password"
                                        class="form-control bg-transparent" required />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        id="togglePasswordReg">
                                        <i class="fa fa-eye-slash" id="iconEyeReg"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-grow-1 bg-secondary rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary rounded h-5px"></div>
                                </div>
                                <div class="text-muted">Gunakan 8+ karakter dengan campuran huruf, angka & simbol.</div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="fv-row mb-8 position-relative">
                                <input type="password" name="password_confirmation" id="confirmPasswordInputReg"
                                    placeholder="Konfirmasi Password" class="form-control bg-transparent" required />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    id="toggleConfirmPasswordReg">
                                    <i class="fa fa-eye-slash" id="iconEyeConfirmReg"></i>
                                </span>
                                <div class="text-danger small mt-1" id="passwordMismatchWarning" style="display:none;">
                                    Password yang dimasukkan tidak sama.
                                </div>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_register_submit" class="btn btn-primary">
                                    <span class="indicator-label">Daftar</span>
                                </button>
                            </div>

                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Sudah punya akun? <a href="{{ url('/login') }}" class="link-primary">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Info Box --}}
                <div class="mt-8">
                    <div class="alert alert-info p-4 rounded shadow-sm">
                        <div class="fw-bold mb-2">Informasi Pendaftaran :</div>
                        <ul class="mb-0 ps-4">
                            <li>Akun akan diverifikasi oleh admin dalam 1-2 hari kerja.</li>
                            <li>Pastikan data yang dimasukkan sudah benar.</li>
                            <li>Hubungi admin jika ada kendala dalam pendaftaran.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Right Side Banner --}}
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background: linear-gradient(135deg, #FF6B35 0%, #1E3A8A 50%, #3B82F6 100%);">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <a href="#" class="mb-12">
                        <img src="{{ asset('assets/media/logos/bapopsi-logo.png') }}" class="h-100px h-lg-120px"
                            alt="Logo" />
                    </a>
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Membangun Generasi Emas
                    </h1>
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        Platform digital untuk pertandingan olahraga pelajar, melacak prestasi atlet, dan membangun
                        ekosistem kompetisi unggul.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Scripts --}}
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script>
    $(function() {
        // Toggle Sub Rayon based on Jenjang
        $('#jenjang').change(function() {
            $('#sub-rayon').toggle($(this).val() === "SMP");
            if ($(this).val() !== "SMP") {
                $('#subRayonSelect').val('');
            }
        });

        // Load Sub Rayon by Kecamatan
        $('#kecamatan').change(function() {
            const kecamatanId = $(this).val();
            if (!kecamatanId) return;

            $.get(`/api/getSubRayonByKecamatan/${kecamatanId}`, function(response) {
                const options = response.data.map(item =>
                    `<option value="${item.id}">${item.nama}</option>`);
                $('#subRayonSelect').html(
                    '<option disabled selected>-- Pilih Sub Rayon --</option>' + options
                    .join(''));
            }).fail(xhr => {
                console.error('Gagal mengambil sub rayon:', xhr);
            });
        });

        // Show/Hide Password
        $('#togglePasswordReg, #toggleConfirmPasswordReg').click(function() {
            const input = $(this).siblings('input');
            const icon = $(this).find('i');
            const isHidden = input.attr('type') === 'password';
            input.attr('type', isHidden ? 'text' : 'password');
            icon.toggleClass('fa-eye fa-eye-slash');
        });

        // Submit Form via AJAX
        $('#kt_register_form').submit(function(e) {
            e.preventDefault();

            const $form = $(this);
            const $btn = $('#kt_register_submit');

            // Validasi password match secara manual (opsional)
            const password = $('#passwordInputReg').val();
            const confirmPassword = $('#confirmPasswordInputReg').val();
            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Password Tidak Cocok',
                    text: 'Konfirmasi password tidak sama.'
                });
                return;
            }

            $btn.prop('disabled', true).text('Memproses...');

            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Berhasil!',
                            html: `
                                <div class="mt-4 text-start">
                                    <div class="alert alert-info p-4 rounded shadow-sm">
                                        <div class="fw-bold mb-2">Informasi Pendaftaran :</div>
                                        <ul class="mb-0 ps-4">
                                            <li>Akun akan diverifikasi oleh admin dalam 1-2 hari kerja.</li>
                                            <li>Pastikan data yang dimasukkan sudah benar.</li>
                                            <li>Hubungi admin jika ada kendala dalam pendaftaran.</li>
                                        </ul>
                                    </div>
                                </div>
                            `,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "/login";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    let msg = 'Terjadi kesalahan saat mendaftar.';
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        const errors = xhr.responseJSON.errors;
                        msg = Object.values(errors).flat().join("\n");
                    } else if (xhr.responseJSON?.message) {
                        msg = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mendaftar',
                        text: msg
                    });
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Daftar');
                }
            });
        });
    });
    </script>
</body>

</html>
