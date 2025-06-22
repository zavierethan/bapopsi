<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BAPOPSI Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome (for icons, optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- BAPOPSI Sporty Theme -->
    <link href="{{ asset('assets/css/sporty-theme.css') }}" rel="stylesheet" type="text/css" />
    
    <style>
        body, .font-sans {
            font-family: 'Open Sans', Arial, Helvetica, sans-serif !important;
        }
        h1, .text-6xl, .text-7xl {
            font-weight: 800 !important;
        }
        h2, .text-4xl, .text-3xl, .font-bold {
            font-weight: 700 !important;
        }
        .font-semibold {
            font-weight: 600 !important;
        }
        .font-medium {
            font-weight: 500 !important;
        }
        .font-normal, .text-base, .text-lg, .text-sm, p, span, a, td, th {
            font-weight: 400 !important;
        }
    </style>

    <script>
    window.statsData = {
        totalMedals: 240,
        totalAthletes: 1850,
        totalSports: 24,
        totalSchools: 130
    };
    </script>
</head>

<body class="text-white">

    <!-- ✅ Navigation Header -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-orange-500 to-blue-600 shadow-lg px-6 py-4 text-white">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/media/logos/bapopsi-logo.png') }}" alt="Logo" class="w-14 h-14 rounded-full">
                <span class="text-3xl font-extrabold text-white">BAPOPSI</span>
            </div>

            <!-- Hamburger Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 text-base font-bold">
                <a href="/" class="text-white hover:text-orange-200 transition-colors">Beranda</a>
                <a href="/prestasi" class="text-white hover:text-orange-200 transition-colors">Prestasi</a>
                <a href="/berita" class="text-white hover:text-orange-200 transition-colors">Berita</a>
                <a href="/galery" class="text-white hover:text-orange-200 transition-colors">Galeri</a>
            </div>

            <!-- Desktop Buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="/login"
                    class="px-4 py-2 border-2 border-white text-white rounded-lg hover:bg-white hover:text-orange-600 transition-all duration-300">Masuk</a>
                <a href="/registration"
                    class="px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-orange-50 transition-all duration-300 font-semibold">Daftar
                    Pengelola</a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pt-4 pb-2 space-y-2 font-bold text-white">
            <a href="/" class="block text-white hover:text-orange-200 transition-colors">Beranda</a>
            <a href="/prestasi" class="block text-white hover:text-orange-200 transition-colors">Prestasi</a>
            <a href="/berita" class="block text-white hover:text-orange-200 transition-colors">Berita</a>
            <a href="/galery" class="block text-white hover:text-orange-200 transition-colors">Galeri</a>
            <div class="pt-2 space-y-2">
                <a href="/login"
                    class="w-full px-4 py-2 border-2 border-white text-white rounded-lg hover:bg-white hover:text-orange-600 transition-all duration-300 text-center block">Masuk</a>
                <a href="/registration"
                    class="w-full px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-orange-50 transition-all duration-300 text-center block font-semibold">Daftar
                    Pengelola</a>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">

                <!-- Logo & Description -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/media/logos/bapopsi-logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                        <span class="text-xl font-bold text-white">BAPOPSI</span>
                    </div>
                    <p class="text-gray-300">
                        Platform digital terpadu untuk mengelola kompetisi olahraga pelajar.
                    </p>
                </div>

                <!-- Footer Menu -->
                <div>
                    <h3 class="font-semibold mb-4 text-white">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="hover:text-orange-300 transition-colors text-gray-300">Beranda</a></li>
                        <li><a href="/prestasi" class="hover:text-orange-300 transition-colors text-gray-300">Prestasi</a></li>
                        <li><a href="/berita" class="hover:text-orange-300 transition-colors text-gray-300">Berita</a></li>
                        <li><a href="/galery" class="hover:text-orange-300 transition-colors text-gray-300">Galeri</a></li>
                    </ul>
                </div>

                <!-- Footer Access -->
                <div>
                    <h3 class="font-semibold mb-4 text-white">Akses</h3>
                    <ul class="space-y-2">
                        <li><a href="/login" class="hover:text-orange-300 transition-colors text-gray-300">Login</a></li>
                        <li><a href="/register" class="hover:text-orange-300 transition-colors text-gray-300">Daftar Pengelola</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="font-semibold mb-4 text-white">Kontak</h3>
                    <div class="space-y-2 text-gray-300">
                        <span class="block text-sm text-gray-400">Alamat : JL Raya Soreang Cipatik, Kopo, Kutawaringin, Komplek Sarana Olahraga Jalak Harupat, Bandung, 40911, Indonesia</span>
                        <span class="block text-sm text-gray-400">Kontak : 022 5893 833</span>
                    </div>
                    <!-- Social links below contact -->
                    <div class="mt-4 flex justify-start items-center space-x-4">
                        <a href="https://www.instagram.com/bapopsi.kab.bandung/" target="_blank" class="inline-flex items-center hover:text-orange-300 transition-colors">
                            <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 2.75a5.75 5.75 0 1 1 0 11.5 5.75 5.75 0 0 1 0-11.5zm0 1.5a4.25 4.25 0 1 0 0 8.5 4.25 4.25 0 0 0 0-8.5zm6.25 1.25a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                        </a>
                        <a href="https://www.youtube.com/@bapopsikabupatenbandung6105" target="_blank" class="inline-flex items-center hover:text-orange-300 transition-colors">
                            <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a2.994 2.994 0 0 0-2.107-2.117C19.228 3.5 12 3.5 12 3.5s-7.228 0-9.391.569A2.994 2.994 0 0 0 .502 6.186C0 8.35 0 12 0 12s0 3.65.502 5.814a2.994 2.994 0 0 0 2.107 2.117C4.772 20.5 12 20.5 12 20.5s7.228 0 9.391-.569a2.994 2.994 0 0 0 2.107-2.117C24 15.65 24 12 24 12s0-3.65-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p class="text-center text-xs text-gray-400 mt-4">© 2025 BAPOPSI. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>


    <script>
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    document.getElementById('medals').innerText = statsData.totalMedals;
    document.getElementById('athletes').innerText = statsData.totalAthletes.toLocaleString();
    document.getElementById('sports').innerText = statsData.totalSports;
    document.getElementById('schools').innerText = statsData.totalSchools;
    </script>
    <script src="{{ asset('assets/js/custom/custom-charts.js') }}"></script>

</body>

</html>
