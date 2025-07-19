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

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="text-3xl font-bold mb-1" id="emas">0</div>
                <div class="text-yellow-100">Medali Emas</div>
            </div>
            <div class="bg-gradient-to-br from-gray-400 to-gray-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="text-3xl font-bold mb-1" id="perak">0</div>
                <div class="text-gray-100">Medali Perak</div>
            </div>
            <div class="bg-gradient-to-br from-orange-400 to-orange-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="text-3xl font-bold mb-1" id="perunggu">0</div>
                <div class="text-orange-100">Medali Perunggu</div>
            </div>
            <div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-trophy text-4xl mb-4"></i>
                <div class="text-3xl font-bold mb-1" id="total-medal">0</div>
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
                <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali Per Kecamatan</h3>
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
                    <tbody class="bg-white divide-y divide-gray-200" id="medalTableBody">
                    </tbody>
                    <tfoot class="bg-gray-100" id="medalTableFooter">
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Berita Terkini</h2>
            <p class="text-lg text-gray-600">Informasi terbaru seputar kegiatan olahraga antar pelajar</p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-5">
            <div class="flex flex-wrap gap-4 justify-center">
                <button
                    class="filter-btn bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                    data-filter="latest">
                    Latest
                </button>
                <button
                    class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                    data-filter="popular">
                    Popular
                </button>
                <button
                    class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                    data-filter="trending">
                    Trending
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="newsGrid">
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

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="galeriesGrid">
            <!-- Gallery Items -->
            <!-- <div
                class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Galeri 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            </div> -->
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
let currentFilter = 'latest'; // default filter
let start = 0; // pagination offset
let length = 3; // limit per fetch
let loading = false;

// Inisialisasi pertama
$(document).ready(function() {
    loadMedalSummary();
    loadKecamatanMedalTable();
    loadNews();
    loadGaleries(true);
});

function formatDate(dateStr) {
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    return new Date(dateStr).toLocaleDateString('id-ID', options);
}

function stripHtml(html) {
    return $('<div>').html(html).text();
}

function renderNews(newsArray) {
    newsArray.forEach(news => {
        const content = stripHtml(news.content).substring(0, 150) + '...';
        const html = `
                <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <img src="/storage/${news.thumbnail_url}" alt="${news.title}" class="w-full h-48 object-cover">
                    <div class="p-6 bg-white">
                        <div class="text-sm text-blue-600 font-medium mb-2">${formatDate(news.published_at)}</div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">${news.title}</h3>
                        <p class="text-gray-600 text-sm mb-4">${content}</p>
                        <a href="berita/${news.slug}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            `;
        $('#newsGrid').append(html);
    });
}

function loadNews(reset = false) {
    if (loading) return;
    loading = true;
    $('#loadMoreBtn').prop('disabled', true).text('Memuat...');

    $.ajax({
        url: `/api/posts/news`,
        method: 'GET',
        data: {
            type: currentFilter,
            start: start,
            length: 6
        },
        success: function(response) {
            if (reset) {
                $('#newsGrid').empty();
            }

            renderNews(response.data);

            start += length;

            if (response.data.length < length) {
                $('#loadMoreBtn').hide();
            } else {
                $('#loadMoreBtn').show().prop('disabled', false).text('Muat Lebih Banyak');
            }
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat berita:', error);
            $('#loadMoreBtn').prop('disabled', false).text('Muat Lebih Banyak');
        },
        complete: function() {
            loading = false;
        }
    });
}

function renderGaleries(galeriesArray) {
    galeriesArray.forEach(galeries => {
        const html = `
                <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <img src="/storage/${galeries.image_url}"
                        alt="Galeri 1" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                </div>
            `;
        $('#galeriesGrid').append(html);
    });
}

function loadGaleries(reset = false) {
    $.ajax({
        url: `/api/posts/galeries`,
        method: 'GET',
        data: {
            start: start,
            length: length
        },
        success: function(response) {
            if (reset) {
                $('#galeriesGrid').empty();
            }

            renderGaleries(response.data);
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat berita:', error);
            $('#loadMoreBtn').prop('disabled', false).text('Muat Lebih Banyak');
        },
        complete: function() {
            loading = false;
        }
    });
}

function loadMedalSummary() {
    $.ajax({
        url: '/api/getTotalMedalSummary',
        method: 'GET',
        success: function(data) {
            $('#emas').text(data.emas);
            $('#perak').text(data.perak);
            $('#perunggu').text(data.perunggu);
            $('#total-medal').text(data.emas + data.perak + data.perunggu);
        }
    });
}

function loadKecamatanMedalTable() {
    $.ajax({
        url: '/api/getKecamatanMedalSummary',
        method: 'GET',
        success: function(data) {
            let emas = 0,
                perak = 0,
                perunggu = 0,
                total = 0;
            let rows = '';

            $.each(data, function(i, item) {
                emas += item.emas;
                perak += item.perak;
                perunggu += item.perunggu;
                total += item.total;

                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">${item.nama}</td>
                        <td class="px-6 py-4 text-center text-xs text-yellow-600 font-semibold">${item.emas}</td>
                        <td class="px-6 py-4 text-center text-xs text-gray-600 font-semibold">${item.perak}</td>
                        <td class="px-6 py-4 text-center text-xs text-orange-600 font-semibold">${item.perunggu}</td>
                        <td class="px-6 py-4 text-center text-xs text-blue-600 font-bold">${item.total}</td>
                    </tr>
                `;
            });

            $('#medalTableBody').html(rows);
            $('#medalTableFooter').html(`
                <tr>
                    <td class="px-6 py-4 font-medium text-xs">TOTAL</td>
                    <td class="px-6 py-4 text-center font-bold text-yellow-600">${emas}</td>
                    <td class="px-6 py-4 text-center font-bold text-gray-600">${perak}</td>
                    <td class="px-6 py-4 text-center font-bold text-orange-600">${perunggu}</td>
                    <td class="px-6 py-4 text-center font-bold text-blue-600">${total}</td>
                </tr>
            `);
        },
        error: function() {
            $('#medalTableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
                );
        }
    });
}
</script>
@endsection
