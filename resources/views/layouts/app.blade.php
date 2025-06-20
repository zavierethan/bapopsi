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
    <nav class="fixed top-0 left-0 w-full z-50 bg-white shadow-md px-6 py-4 text-gray-800">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="https://via.placeholder.com/40" alt="Logo" class="w-10 h-10 rounded-full">
                <span class="text-xl font-bold text-blue-600">BAPOPSI</span>
            </div>

            <!-- Hamburger Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 text-base font-medium">
                <a href="/" class="hover:text-blue-600">Beranda</a>
                <a href="/prestasi" class="hover:text-blue-600">Prestasi</a>
                <a href="/berita" class="hover:text-blue-600">Berita</a>
                <a href="/galery" class="hover:text-blue-600">Galeri</a>
            </div>

            <!-- Desktop Buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="/login"
                    class="px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">Masuk</a>
                <a href="/registration"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Daftar
                    Pengelola</a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pt-4 pb-2 space-y-2 font-medium text-gray-700">
            <a href="/" class="block hover:text-blue-600">Beranda</a>
            <a href="/prestasi" class="block hover:text-blue-600">Prestasi</a>
            <a href="/berita" class="block hover:text-blue-600">Berita</a>
            <a href="/galery" class="block hover:text-blue-600">Galeri</a>
            <div class="pt-2 space-y-2">
                <a href="/login"
                    class="w-full px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">Masuk</a>
                <a href="/registration"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Daftar
                    Pengelola</a>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">

                <!-- Logo & Description -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-gradient-to-r from-blue-600 to-emerald-600 p-2 rounded-lg">
                            <!-- Trophy Icon (Heroicons as inline SVG) -->
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 21h8m-4-4v4m-5-9h10a4 4 0 004-4V5a2 2 0 00-2-2h-1a2 2 0 00-2-2H9a2 2 0 00-2 2H6a2 2 0 00-2 2v3a4 4 0 004 4z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold">BAPOPSI</span>
                    </div>
                    <p class="text-gray-400">
                        Platform digital terpadu untuk mengelola kompetisi olahraga pelajar.
                    </p>
                </div>

                <!-- Menu -->
                <div>
                    <h3 class="font-semibold mb-4">Menu</h3>
                    <div class="space-y-2">
                        <a href="#beranda" class="block text-gray-400 hover:text-white transition-colors">Beranda</a>
                        <a href="#prestasi" class="block text-gray-400 hover:text-white transition-colors">Prestasi</a>
                        <a href="#berita" class="block text-gray-400 hover:text-white transition-colors">Berita</a>
                        <a href="#galeri" class="block text-gray-400 hover:text-white transition-colors">Galeri</a>
                    </div>
                </div>

                <!-- Akses -->
                <div>
                    <h3 class="font-semibold mb-4">Akses</h3>
                    <div class="space-y-2">
                        <a href="#login" class="block text-gray-400 hover:text-white transition-colors">Login</a>
                        <a href="#register" class="block text-gray-400 hover:text-white transition-colors">Daftar
                            Pengelola</a>
                        <a href="#" class="block text-gray-400 hover:text-white transition-colors">Panduan</a>
                    </div>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="font-semibold mb-4">Kontak</h3>
                    <div class="space-y-2 text-gray-400">
                        <p>Email: info@bapopsi.id</p>
                        <p>Telepon: (021) 1234-5678</p>
                        <p>Alamat: Jakarta, Indonesia</p>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 BAPOPSI. Seluruh hak cipta dilindungi.</p>
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

    <script>
    // Bar Chart
    new Chart(document.getElementById("barChart"), {
        type: "bar",
        data: {
            labels: ["Sepak Bola", "Renang", "Badminton", "Pencak Silat"],
            datasets: [{
                label: "Jumlah Medali",
                backgroundColor: ["#3B82F6", "#06B6D4", "#10B981", "#F59E0B"],
                data: [12, 9, 15, 7]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Pie Chart
    new Chart(document.getElementById("pieChart"), {
        type: "pie",
        data: {
            labels: ["Emas", "Perak", "Perunggu"],
            datasets: [{
                label: "Distribusi Medali",
                backgroundColor: ["#FBBF24", "#9CA3AF", "#CD7F32"],
                data: [25, 18, 12]
            }]
        },
        options: {
            responsive: true
        }
    });

    // Line Chart
    new Chart(document.getElementById("lineChart"), {
        type: "line",
        data: {
            labels: ["2020", "2021", "2022", "2023", "2024"],
            datasets: [{
                label: "Total Medali",
                borderColor: "#F97316",
                fill: false,
                data: [10, 15, 12, 20, 25]
            }]
        },
        options: {
            responsive: true
        }
    });
    </script>


</body>

</html>
