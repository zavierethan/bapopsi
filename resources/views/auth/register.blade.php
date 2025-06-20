<!DOCTYPE html>
<html lang="en">

<head>
    <title>Priyadis Butchers</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="Priyadis Butchers" />
    <meta property="og:title" content="Priyadis Butchers" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_register_form" method="POST" action="">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                            </div>

                            <!--begin::Nama Lengkap-->
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" autocomplete="off"
                                    class="form-control bg-transparent" id="namaLengkap" />
                            </div>
                            <!--end::Nama Lengkap-->

                            <!--begin::Email-->
                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent" id="email"/>
                            </div>
                            <!--end::Email-->

                            <!--begin::Jenjang-->
                            <div class="fv-row mb-8">
                                <select name="jenjang" class="form-select bg-transparent" id="jenjang">
                                    <option value="" disabled selected>-- Pilih Jenjang --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                </select>
                            </div>
                            <!--end::Jenjang-->

                            <!--begin::Jenjang-->
                            <div class="fv-row mb-8">
                                <select name="jenjang"
                                    class="form-select bg-transparent" id="kecamatan">
                                    <option disabled selected>-- Pilih Kecamatan --</option>
                                    @foreach($kecamatan as $k)
                                    <option value="{{$k->id}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Jenjang-->

                            <!--begin::Nama Lengkap-->
                            <div class="fv-row mb-8" id="sub-rayon">
                                <select name="jenjang"
                                    class="form-select bg-transparent" id="subRayonSelect">
                                    <option value="" disabled selected>-- Pilih Sub Rayon --</option>
                                </select>
                            </div>
                            <!--end::Nama Lengkap-->

                            <!--begin::Username-->
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Username" name="name" autocomplete="off"
                                    class="form-control bg-transparent" id="username"/>
                            </div>
                            <!--end::Username-->

                            <!--begin::Password-->
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" id="password"/>
                            </div>
                            <!--end::Password-->

                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                <a href="/login" class="link-primary">Kembali ke login</a>
                                <!--end::Link-->
                            </div>

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_register_submit" class="btn btn-primary">
                                    <span class="indicator-label">Register</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->

                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(assets/media/misc/auth-bg.png)">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Title-->
                    <img src="{{asset('assets/media/logos/bapopsi-logo.png')}}" alt="Company Logo"
                        style="max-width: 300px;">
                    <!--end::Title-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script>
        $('#sub-rayon').hide();
        $('#jenjang').on("change", function() {
            let val = $(this).val();

            if(val === "SMP") {
                $('#sub-rayon').show();
            } else {
                $('#sub-rayon').hide();
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

                    // Clear old options
                    $subRayonSelect.empty();

                    // Add default option
                    $subRayonSelect.append('<option value="" disabled selected>-- Pilih Sub Rayon --</option>');

                    // Append new options
                    $.each(data, function (index, item) {
                        $subRayonSelect.append(
                            $('<option></option>').val(item.id).text(item.nama)
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch sub rayon:', error);
                }
            });
        });

        $('#kt_register_submit').on('click', function (e) {
            e.preventDefault();

            // Collect form data
            const formData = {
                _token: $('input[name="_token"]').val(), // required for Laravel CSRF
                nama_lengkap: $('#namaLengkap').val(),
                email: $('#email').val(),
                jenjang: $('#jenjang').val(),
                kecamatan: $('#kecamatan').val(),
                sub_rayon: $('#subRayonSelect').val(),
                username: $('#username').val(),
                password: $('#password').val()
            };

            // Optional: disable button and show spinner
            $(this).prop('disabled', true).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();

            $.ajax({
                url: '/register',
                method: 'POST',
                data: formData,
                success: function (response) {
                    alert("Registrasi berhasil!");
                    window.location.href = "/login"; // redirect after success
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat registrasi.");

                    // Re-enable button
                    $('#kt_register_submit').prop('disabled', false)
                        .find('.indicator-label').show();
                    $('#kt_register_submit').find('.indicator-progress').hide();
                }
            });
        });

    </script>
</body>
<!--end::Body-->

</html>
