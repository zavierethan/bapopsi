@extends('layouts.app')

@section('content')
<!-- ✅ Hero Banner -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-emerald-600 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
        <div class="absolute bottom-10 right-20 w-24 h-24 bg-white opacity-5 rounded-full"></div>
        <div class="absolute top-1/2 right-10 w-16 h-16 bg-white opacity-5 rounded-full"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <div
                        class="inline-flex items-center space-x-2 bg-white bg-opacity-20 backdrop-blur-sm px-4 py-2 rounded-full">
                        <span class="text-sm font-medium">⚡ Platform Olahraga Pelajar Terdepan</span>
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                        BAPOPSI
                        <span class="block text-3xl lg:text-4xl font-normal mt-2 text-blue-100">
                            Badan Penyelenggara Olahraga Pelajar
                        </span>
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Platform digital terpadu untuk mengelola kompetisi olahraga pelajar,
                        memantau prestasi atlet, dan membangun ekosistem olahraga yang lebih baik.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <button
                        class="group px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <div class="flex items-center justify-center space-x-2">
                            <span>Masuk ke Sistem</span>
                            <div
                                class="w-5 h-5 bg-blue-600 rounded-full flex items-center justify-center group-hover:bg-blue-700 transition-colors">
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </button>
                    <button
                        class="px-8 py-4 border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                        Daftar Pengelola
                    </button>
                </div>
            </div>

            <div class="lg:justify-self-end">
                <div class="relative">
                    <div
                        class="bg-white bg-opacity-10 backdrop-blur-sm p-8 rounded-2xl border border-white border-opacity-20">
                        <div class="grid grid-cols-2 gap-6 text-center">
                            <div class="space-y-2">
                                <div
                                    class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center mx-auto">
                                    🏅</div>
                                <div id="medals" class="text-2xl font-bold">0</div>
                                <div class="text-sm text-blue-100">Total Medali</div>
                            </div>
                            <div class="space-y-2">
                                <div
                                    class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mx-auto">
                                    👥</div>
                                <div id="athletes" class="text-2xl font-bold">0</div>
                                <div class="text-sm text-blue-100">Atlet Terdaftar</div>
                            </div>
                            <div class="space-y-2">
                                <div
                                    class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center mx-auto">
                                    🎯</div>
                                <div id="sports" class="text-2xl font-bold">0</div>
                                <div class="text-sm text-blue-100">Cabang Olahraga</div>
                            </div>
                            <div class="space-y-2">
                                <div
                                    class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mx-auto">
                                    🏫</div>
                                <div id="schools" class="text-2xl font-bold">0</div>
                                <div class="text-sm text-blue-100">Sekolah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Statistik Prestasi Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Statistik Prestasi</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pantau perkembangan prestasi olahraga pelajar dengan visualisasi data yang komprehensif
            </p>
        </div>

        <!-- Filters -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border mb-12">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Wilayah</label>
                    <select class="w-full p-3 border rounded-xl">
                        <option>Pilih Wilayah</option>
                        <option>Bandung</option>
                        <option>Sumedang</option>
                        <option>Cimahi</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Jenis Medali</label>
                    <select class="w-full p-3 border rounded-xl">
                        <option>Pilih Medali</option>
                        <option>Emas</option>
                        <option>Perak</option>
                        <option>Perunggu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Cabang Olahraga</label>
                    <select class="w-full p-3 border rounded-xl">
                        <option>Pilih Cabang</option>
                        <option>Sepak Bola</option>
                        <option>Badminton</option>
                        <option>Renang</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Bar Chart -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border h-full">
                <div class="flex items-center space-x-3 mb-8">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-chart-bar text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Grafik Batang</h3>
                        <p class="text-sm text-gray-600">Perbandingan medali per cabang</p>
                    </div>
                </div>
                <canvas id="barChart" class="w-full h-60"></canvas>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border h-full">
                <div class="flex items-center space-x-3 mb-8">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-chart-pie text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Grafik Lingkaran</h3>
                        <p class="text-sm text-gray-600">Distribusi total medali</p>
                    </div>
                </div>
                <canvas id="pieChart" class="w-full h-60"></canvas>
            </div>

            <!-- Line Chart -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border h-full">
                <div class="flex items-center space-x-3 mb-8">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Grafik Tren</h3>
                        <p class="text-sm text-gray-600">Tren prestasi per tahun</p>
                    </div>
                </div>
                <canvas id="lineChart" class="w-full h-60"></canvas>
            </div>

        </div>
    </div>
</section>


<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Platform lengkap dengan berbagai fitur untuk mendukung pengelolaan olahraga pelajar
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
                class="group p-8 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-700 transition-colors">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Manajemen Atlet</h3>
                <p class="text-gray-600">Kelola data atlet, registrasi kompetisi, dan pemantauan prestasi secara
                    terpusat.</p>
            </div>

            <div
                class="group p-8 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-emerald-700 transition-colors">
                    <i class="fas fa-trophy text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Tracking Prestasi</h3>
                <p class="text-gray-600">Pantau perkembangan prestasi dan raihan medali dengan visualisasi yang
                    menarik.</p>
            </div>

            <div
                class="group p-8 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-orange-700 transition-colors">
                    <i class="fas fa-id-card text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">ID Card Digital</h3>
                <p class="text-gray-600">Generate dan cetak ID card untuk atlet, pelatih, dan official dengan mudah.
                </p>
            </div>

            <div
                class="group p-8 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-700 transition-colors">
                    <i class="fas fa-chart-bar text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Analisis Data</h3>
                <p class="text-gray-600">Dashboard analitik dengan grafik dan laporan untuk pengambilan keputusan.
                </p>
            </div>

            <div
                class="group p-8 bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-pink-700 transition-colors">
                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Multi Wilayah</h3>
                <p class="text-gray-600">Dukungan untuk manajemen multiple kecamatan dan sub rayon dalam satu
                    platform.</p>
            </div>

            <div
                class="group p-8 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                <div
                    class="w-14 h-14 bg-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-bullseye text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Input Hasil</h3>
                <p class="text-gray-600">Sistem input hasil pertandingan yang mudah dan real-time untuk berbagai
                    cabang olahraga.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-emerald-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">Siap Memulai?</h2>
        <p class="text-xl text-blue-100 mb-10 leading-relaxed">
            Bergabunglah dengan platform BAPOPSI dan rasakan kemudahan mengelola
            olahraga pelajar dengan teknologi terdepan.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/login"
                class="px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Masuk ke Sistem
            </a>
            <a href="/register"
                class="px-8 py-4 border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                Daftar Sebagai Pengelola
            </a>
        </div>
    </div>
</section>
@endsection
