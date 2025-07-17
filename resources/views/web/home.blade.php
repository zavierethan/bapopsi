@extends('layouts.app')

@section('content')
<!-- Hero Section - Event Slider -->
<section id="home" class="pt-16">
    <div class="slider-container relative h-96 md:h-[500px] lg:h-[600px]">
        <!-- Slide 1 -->
        <div class="slide active relative w-full h-full">
            <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="Event 1" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4">Kejuaraan Nasional Bola Basket Pelajar 2024</h1>
                    <p class="text-lg md:text-xl mb-2">15-20 Januari 2024</p>
                    <p class="text-base md:text-lg mb-6">Jakarta Convention Center</p>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide relative w-full h-full">
            <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="Event 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4">Festival Olahraga Pelajar Nusantara</h1>
                    <p class="text-lg md:text-xl mb-2">5-10 Februari 2024</p>
                    <p class="text-base md:text-lg mb-6">Gelora Bung Karno, Jakarta</p>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide relative w-full h-full">
            <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="Event 3" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4">Kompetisi Badminton Antar Sekolah</h1>
                    <p class="text-lg md:text-xl mb-2">20-25 Februari 2024</p>
                    <p class="text-base md:text-lg mb-6">Istora Senayan, Jakarta</p>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>

        <!-- Navigation dots -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75"
                data-slide="0"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75"
                data-slide="1"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75"
                data-slide="2"></button>
        </div>

        <!-- Navigation arrows -->
        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl hover:text-gray-300"
            id="prev-slide">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl hover:text-gray-300"
            id="next-slide">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>

<!-- Medal Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Rekapitulasi O2SN XIII 2025</h2>
            <p class="text-lg text-gray-600">Total pencapaian medali dalam berbagai kompetisi
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div
                class="medal-card bg-gradient-to-br from-yellow-400 to-yellow-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="45">0</div>
                <div class="text-yellow-100">Medali Emas</div>
            </div>
            <div class="medal-card bg-gradient-to-br from-gray-400 to-gray-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="38">0</div>
                <div class="text-gray-100">Medali Perak</div>
            </div>
            <div
                class="medal-card bg-gradient-to-br from-orange-400 to-orange-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="52">0</div>
                <div class="text-orange-100">Medali Perunggu</div>
            </div>
            <div class="medal-card bg-gradient-to-br from-blue-400 to-blue-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-trophy text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="135">0</div>
                <div class="text-blue-100">Total Medali</div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Cabang Olahraga Dropdown -->
                <div>
                    <label for="cabor" class="block text-sm font-medium text-gray-700 mb-1">Cabang Olahraga</label>
                    <select id="cabor" name="cabor"
                        class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Renang">Renang</option>
                        <option value="Atletik">Atletik</option>
                        <option value="Bola Basket">Bola Basket</option>
                        <option value="Bola Voli">Bola Voli</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Tenis Meja">Tenis Meja</option>
                    </select>
                </div>

                <!-- No Pertandingan Input -->
                <div>
                    <label for="no" class="block text-sm font-medium text-gray-700 mb-1">No. Pertandingan</label>
                    <select id="cabor" name="cabor"
                        class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Renang">Renang</option>
                        <option value="Atletik">Atletik</option>
                        <option value="Bola Basket">Bola Basket</option>
                        <option value="Bola Voli">Bola Voli</option>
                        <option value="Sepak Bola">Sepak Bola</option>
                        <option value="Tenis Meja">Tenis Meja</option>
                    </select>
                </div>
            </div>

            <!-- Filter Button -->
            <div>
                <button type="button" id="filter-btn"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 text-sm shadow">
                    Filter
                </button>
            </div>
        </div>

        <!-- Medal Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali per Cabang Olahraga</h3>
            </div>
            <div class="table-responsive">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cabang Olahraga</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-yellow-500"></i> Emas
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-gray-400"></i> Perak
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-orange-500"></i> Perunggu
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Badminton</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">12
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">6
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">26</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Renang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">10
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">12
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">30</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Atletik</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">10
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">7
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">9
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">26</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Bola Basket</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">4
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">7
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">16</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Bola Voli</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">4
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">17</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Sepak Bola</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">3
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">10</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Tenis Meja</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">3
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">10</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gray-100">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">TOTAL</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-yellow-600">45</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-600">38</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-orange-600">52</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-blue-600">135</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section id="news" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Berita Terkini BAPOPSI</h2>
            <p class="text-lg text-gray-600">Informasi terbaru seputar kegiatan olahraga pelajar di Indonesia</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Item 1 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/416978/pexels-photo-416978.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">12 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        BAPOPSI Luncurkan Program Pembinaan Atlet Muda Berbakat
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Program pembinaan khusus untuk mengembangkan potensi atlet muda Indonesia di berbagai cabang
                        olahraga prioritas...
                    </p>
                    <a href="/berita/judul-berita"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- News Item 2 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">10 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        Prestasi Membanggakan Tim Badminton Indonesia di Kejuaraan Asia
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Tim badminton pelajar Indonesia berhasil meraih medali emas dalam kejuaraan tingkat Asia yang
                        berlangsung di Thailand...
                    </p>
                    <a href="pages/detail-berita.html?id=2"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">8 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        Kerjasama BAPOPSI dengan Kementerian Pendidikan untuk Olahraga Sekolah
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        Penandatanganan MoU antara BAPOPSI dan Kemendikbud untuk meningkatkan kualitas olahraga di
                        sekolah-sekolah...
                    </p>
                    <a href="pages/detail-berita.html?id=3"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="/berita"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Galeri Kegiatan</h2>
            <p class="text-lg text-gray-600">Dokumentasi kegiatan dan prestasi olahraga pelajar Indonesia</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Gallery Items -->
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 2" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 3" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/416978/pexels-photo-416978.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 4" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/209977/pexels-photo-209977.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 5" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1263349/pexels-photo-1263349.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 6" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1040881/pexels-photo-1040881.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 7" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1618200/pexels-photo-1618200.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 8" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="/galery"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Lihat Semua Galeri
            </a>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
// Data dummy atlet per kecamatan (dengan asal sekolah)
const atletDetailData = {
    'Kec. Bandung Wetan': [{
            nama: 'Rizky Maulana',
            sekolah: 'SMA 1 Bandung',
            total: 3,
            jenis: 'Emas'
        },
        {
            nama: 'Dewi Lestari',
            sekolah: 'SMA 2 Bandung',
            total: 2,
            jenis: 'Perak'
        },
        {
            nama: 'Budi Santoso',
            sekolah: 'SMA 1 Bandung',
            total: 3,
            jenis: 'Perunggu'
        },
    ],
    'Kec. Sumedang Selatan': [{
            nama: 'Andi Saputra',
            sekolah: 'SMA 1 Sumedang',
            total: 2,
            jenis: 'Emas'
        },
        {
            nama: 'Siti Nurhaliza',
            sekolah: 'SMA 1 Sumedang',
            total: 2,
            jenis: 'Perunggu'
        },
    ],
    'Kec. Cimahi Tengah': [{
            nama: 'Siti Aminah',
            sekolah: 'SMA Cimahi 1',
            total: 1,
            jenis: 'Emas'
        },
        {
            nama: 'Dian Pratama',
            sekolah: 'SMA Cimahi 1',
            total: 1,
            jenis: 'Perak'
        },
        {
            nama: 'Rina Kurnia',
            sekolah: 'SMA Cimahi 1',
            total: 1,
            jenis: 'Perunggu'
        },
    ]
};
let currentAtletList = [];

function renderAtletTable(list) {
    let html = '';
    if (list.length === 0) {
        html =
            '<tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data atlet untuk filter ini.</td></tr>';
    } else {
        list.forEach(function(a, idx) {
            html += `<tr>
                <td class=\"px-4 py-4 whitespace-nowrap text-black\">${idx+1}</td>
                <td class=\"px-4 py-4 whitespace-nowrap font-semibold text-black\">${a.nama}</td>
                <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.sekolah}</td>
                <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.total}</td>
                <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.jenis}</td>
            </tr>`;
        });
    }
    $('#atlet-detail-tbody').html(html);
}

function applyAtletFilter() {
    let sekolah = $('#filter-sekolah').val();
    let jenis = $('#filter-medali').val();
    let allword = $('#filter-allword').val().toLowerCase();
    let filtered = currentAtletList.filter(function(a) {
        let matchSek = !sekolah || a.sekolah === sekolah;
        let matchJenis = !jenis || a.jenis === jenis;
        let matchAll = !allword || (
            a.nama.toLowerCase().includes(allword) ||
            a.sekolah.toLowerCase().includes(allword) ||
            a.jenis.toLowerCase().includes(allword)
        );
        return matchSek && matchJenis && matchAll;
    });
    renderAtletTable(filtered);
}

let debounceTimer;
let currentType = 'latest';

$(document).ready(function() {

    loadArticles(currentType);
    loadGalery();
    loadMedalSummary();
    loadKecamatanTable();

    $('#news-tabs').on('click', '.tab-btn', function() {
        $('.tab-btn').removeClass(
                'bg-gradient-to-r from-orange-500 to-red-500 text-white shadow active')
            .addClass('text-gray-700 bg-gray-100 hover:bg-orange-100');
        $(this).addClass('bg-gradient-to-r from-orange-500 to-red-500 text-white shadow active')
            .removeClass('text-gray-700 bg-gray-100 hover:bg-orange-100');

        currentType = $(this).data('type');
        const searchQuery = $('#searchInput').val();
        loadArticles(currentType, searchQuery);
    });
});

$(document).on('click', '.kecamatan', function() {
    const kecamatanId = $(this).data('kecamatan');

    // Debug: tampilkan id kecamatan
    console.log("Kecamatan ID:", kecamatanId);

    // Tampilkan modal
    $('#modal-atlet').removeClass('hidden');

    // (Opsional) ubah judul modal jika perlu
    $('#modal-atlet-title').text(`Daftar Atlet Kecamatan ${kecamatanId}`);

    // (Opsional) kosongkan isi tabel sebelumnya
    $('#modal-atlet-tbody').empty();

    $.ajax({
        url: '/api/getAtletByKecamatanId',
        type: 'GET',
        data: {
            kecamatan_id: kecamatanId
        },
        success: function(data) {
            $('#modal-atlet-tbody').empty();

            if (data.length === 0) {
                $('#modal-atlet-tbody').append(`
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data atlet.</td>
                    </tr>
                `);
            } else {
                data.forEach((row, index) => {
                    $('#modal-atlet-tbody').append(`
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-black">${index + 1}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">${row.nama_lengkap}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">${row.nama_sekolah}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">${row.total_medali}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">
                                <span class="text-yellow-600 font-bold">🥇 ${row.emas}</span>,
                                <span class="text-gray-500 font-bold">🥈 ${row.perak}</span>,
                                <span class="text-orange-700 font-bold">🥉 ${row.perunggu}</span>
                            </td>
                        </tr>
                    `);
                });
            }
        },
        error: function() {
            alert("Gagal mengambil data atlet.");
        }
    });
});

$(document).on('click', '#close-modal-atlet', function() {
    $('#modal-atlet').addClass('hidden');
});



function loadArticles(type = 'trending', search = '') {
    $.ajax({
        url: '/api/posts/news',
        type: 'GET',
        data: {
            type: type,
            search: search
        },
        dataType: 'json',
        success: function(response) {
            let articles = response.data;
            let html = '';
            if (articles.length === 0) {
                $('#articles-wrapper').html(
                    '<div class="text-gray-500 text-center">Tidak ditemukan artikel.</div>');
                return;
            }

            $.each(articles, function(index, article) {
                let contentText = $('<div>').html(article.content).text().substring(0, 100);
                html += `
                    <a href="/berita/${article.slug}">
                    <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <img src="/storage/${article.thumbnail_url}" alt="${article.title}" class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-medium">${article.category}</span>
                                <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 6v6l4 2" />
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                    </svg>
                                    <span>3 menit</span>
                                </div>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">${article.title}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">${contentText}...</p>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                                    </svg>
                                    <span>${article.author ?? 'Admin'}</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM5 20V9h14v11H5z" />
                                        </svg>
                                        <span>${new Date(article.published_at).toLocaleDateString('id-ID')}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                `;
            });
            $('#articles-wrapper').html(html);
        },
        error: function() {
            $('#articles-wrapper').html('<div class="text-red-500">Gagal memuat data artikel.</div>');
        }
    });
}

function loadGalery() {
    $.ajax({
        url: '/api/posts/galeries',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let galleries = response.data.slice(0, 8); // tampilkan max 8 galeri
            let html = '';
            if (galleries.length === 0) {
                $('#gallery-empty-home').removeClass('hidden');
            } else {
                $('#gallery-empty-home').addClass('hidden');
                $.each(galleries, function(index, article) {
                    html += `
                        <div class="group bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <div class="relative overflow-hidden">
                                <img src="/storage/${article.image_url}" alt="${article.title}"
                                    class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" />
                                <div class="absolute top-3 right-3">
                                    <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-medium">${article.category}</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 text-sm leading-tight">${article.title || 'Judul Kegiatan'}</h3>
                                <p class="text-gray-600 text-xs mb-3 line-clamp-2">${article.description || ''}</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM5 20V9h14v11H5z" />
                                        </svg>
                                        <span>${new Date(article.created_at).toLocaleDateString('id-ID')}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                        </svg>
                                        <span class="truncate max-w-20">${article.location || 'Bandung'}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#galleries-wrapper-home').html(html);
            }
        },
        error: function(xhr, status, error) {
            $('#galleries-wrapper-home').html('<div class="text-red-500">Gagal memuat data galeri.</div>');
        }
    });
}

function loadMedalSummary() {
    $.ajax({
        url: '/api/getTotalMedalSummary',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            totalEmas = parseInt(data.emas) || 0;
            totalPerak = parseInt(data.perak) || 0;
            totalPerunggu = parseInt(data.perunggu) || 0;

            const html = `
                <div class='flex-1 flex items-center gap-3 bg-yellow-50 border-l-4 border-yellow-400 rounded-xl p-4 shadow'>
                    <span class='text-3xl font-bold text-yellow-500'><i class="fas fa-medal"></i> ${totalEmas}</span>
                    <span class='text-gray-700 font-semibold'>Emas</span>
                    <span class='ml-auto text-sm text-gray-500'>${persen(totalEmas)}%</span>
                </div>
                <div class='flex-1 flex items-center gap-3 bg-gray-100 border-l-4 border-gray-400 rounded-xl p-4 shadow'>
                    <span class='text-3xl font-bold text-gray-500'><i class="fas fa-medal"></i> ${totalPerak}</span>
                    <span class='text-gray-700 font-semibold'>Perak</span>
                    <span class='ml-auto text-sm text-gray-500'>${persen(totalPerak)}%</span>
                </div>
                <div class='flex-1 flex items-center gap-3 bg-orange-100 border-l-4 border-orange-400 rounded-xl p-4 shadow'>
                    <span class='text-3xl font-bold text-orange-500'><i class="fas fa-medal"></i> ${totalPerunggu}</span>
                    <span class='text-gray-700 font-semibold'>Perunggu</span>
                    <span class='ml-auto text-sm text-gray-500'>${persen(totalPerunggu)}%</span>
                </div>
            `;

            $('#medali-summary').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat data medali:', error);
            $('#medali-summary').html('<p class="text-red-500">Gagal memuat data medali.</p>');
        }
    });
}

function loadKecamatanTable() {
    $.ajax({
        url: '/api/getKecamatanMedalSummary',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            let rows = '';

            data.forEach((item, index) => {
                rows += `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-black">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-blue-700 underline cursor-pointer kecamatan" data-kecamatan="${item.id}">${item.nama}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-black">${item.total}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-black">${item.emas}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-black">${item.perak}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-black">${item.perunggu}</td>
                    </tr>
                `;
            });

            $('#kecamatan-tbody').html(rows);
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat data kecamatan:', error);
            $('#modal-atlet-tbody').html(
                '<tr><td colspan="6" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
                );
        }
    });
}

let totalEmas = 0;
let totalPerak = 0;
let totalPerunggu = 0;

function persen(count) {
    const total = totalEmas + totalPerak + totalPerunggu;
    if (total === 0) return 0;
    return ((count / total) * 100).toFixed(1);
}
</script>
@endsection
