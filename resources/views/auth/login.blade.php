<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | BAPOPSI Kabupaten Bandung</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!-- BAPOPSI Sporty Theme -->
    <link href="{{ asset('assets/css/sporty-theme.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Masuk</h1>
                                <div class="text-gray-500 fw-semibold fs-6">ke Akun BAPOPSI Anda</div>
                            </div>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Username" name="name" autocomplete="off" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="/password/reset" class="link-primary">Lupa Kata Sandi?</a>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Masuk</span>
                                    <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Belum punya akun?
                                <a href="{{ url('/registration') }}" class="link-primary">Buat Akun</a>
                            </div>
                        </form>
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
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
