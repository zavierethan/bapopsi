<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPOPSI - Badan Pembina Olahraga Pelajar Seluruh Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-trophy text-3xl text-blue-600"></i>
                        <span class="ml-2 text-xl font-bold text-gray-900">BAPOPSI</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="/" class="text-blue-600 px-3 py-2 text-sm font-medium">Beranda</a>
                        <a href="/berita" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Berita</a>
                        <a href="/galery" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Galeri</a>
                        <a href="pages/cabor-prestasi.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Cabor & Prestasi</a>
                        <a href="pages/kontak.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Kontak</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                <a href="/" class="block px-3 py-2 text-base font-medium text-blue-600">Beranda</a>
                <a href="/berita" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600">Berita</a>
                <a href="/galery" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600">Galeri</a>
                <a href="pages/cabor-prestasi.html" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600">Cabor & Prestasi</a>
                <a href="pages/kontak.html" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600">Kontak</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-trophy text-2xl text-blue-400"></i>
                        <span class="ml-2 text-xl font-bold">BAPOPSI</span>
                    </div>
                    <p class="text-gray-400 mb-4 max-w-md">
                        Badan Pembina Olahraga Pelajar Seluruh Indonesia - Membangun generasi pelajar yang sehat, berprestasi, dan berkarakter melalui olahraga.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/berita" class="text-gray-400 hover:text-white transition-colors">Berita</a></li>
                        <li><a href="/galery" class="text-gray-400 hover:text-white transition-colors">Galeri</a></li>
                        <li><a href="pages/cabor-prestasi.html" class="text-gray-400 hover:text-white transition-colors">Cabor & Prestasi</a></li>
                        <li><a href="pages/tentang.html" class="text-gray-400 hover:text-white transition-colors">Tentang</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-400">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Jakarta, Indonesia
                        </li>
                        <li class="text-gray-400">
                            <i class="fas fa-phone mr-2"></i>
                            +62 21 1234567
                        </li>
                        <li class="text-gray-400">
                            <i class="fas fa-envelope mr-2"></i>
                            info@bapopsi.org
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">
                    © 2024 BAPOPSI. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <span class="close">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-4 right-4 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-colors hidden">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
