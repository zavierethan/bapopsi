@extends('layouts.app')

@section('content')
<!-- Hero Section - Event Slider -->
<section id="home" class="pt-16">
    <div class="slider-container relative h-96 md:h-[500px] lg:h-[600px]">
        <div id="sliderWrapper" class="w-full h-full"></div>

        <!-- Navigation dots -->
        <div id="sliderDots" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2"></div>

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
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Rekapitulasi Perolehan Medali</h2>
        </div>
        <div class="flex border-b border-gray-200 mb-8">
            <button
                class="tab-btn px-6 py-3 font-semibold text-blue-600 border-b-4 border-blue-600 font-bold transition-all duration-300 ease-in-out rounded-t-lg"
                data-tab="o2sn">
                O2SN
            </button>
            <button
                class="tab-btn px-6 py-3 font-semibold text-gray-600 hover:text-blue-600 hover:border-blue-400 border-b-4 border-transparent font-bold transition-all duration-300 ease-in-out rounded-t-lg"
                data-tab="popda">
                POPDA
            </button>
            <button
                class="tab-btn px-6 py-3 font-semibold text-gray-600 hover:text-blue-600 hover:border-blue-400 border-b-4 border-transparent font-bold transition-all duration-300 ease-in-out rounded-t-lg"
                data-tab="popwill">
                POPWIL
            </button>
        </div>

        <div id="tab-o2sn" class="tab-content">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <div>
                        <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                        <select id="jenjang" name="jenjang"
                            class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="SD" selected>SD</option>
                            <option value="SMP">SMP</option>
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
                    <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali (O2SN)</h3>
                </div>
                <div class="table-responsive" id="o2sn-sd-table">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kecamatan</th>
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

                <div class="table-responsive" id="o2sn-smp-table">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sub Rayon</th>
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
                        <tbody class="bg-white divide-y divide-gray-200" id="medalSubRayonTableBody">
                        </tbody>
                        <tfoot class="bg-gray-100" id="medalSubRayonTableFooter">
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div id="tab-popda" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Cabang Olahraga Dropdown -->
                    <div>
                        <label for="cabor" class="block text-sm font-medium text-gray-700 mb-1">Cabang Olahraga</label>
                        <select id="caborPopda" name="cabor"
                            class="cabor w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">SEMUA</option>
                        </select>
                        <input type="hidden" value="{{$activeEvent->id}}" id="eventId" />
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
                    <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali (POPDA)</h3>
                </div>
                <div class="table-responsive">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Nama Atlet
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Cabang Olahraga
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    No. Kelas Pertandingan
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Asal Sekolah
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Perolehan Medali (Juara)
                                </th>
                            </tr>
                        </thead>
                        <tbody id="medalPOPDATableBody" class="bg-white divide-y divide-gray-200">
                            <!-- Rows via jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="tab-popwill" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Cabang Olahraga Dropdown -->
                    <div>
                        <label for="cabor" class="block text-sm font-medium text-gray-700 mb-1">Cabang Olahraga</label>
                        <select id="caborPopwil" name="cabor"
                            class="cabor w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">SEMUA</option>
                        </select>
                        <input type="hidden" value="{{$activeEvent->id}}" id="eventId" />
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
                    <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali (POPWIL)</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Nama Atlet
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Cabang Olahraga
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    No. Kelas Pertandingan
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Asal Sekolah
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase whitespace-nowrap">
                                    Perolehan Medali (Juara)
                                </th>
                            </tr>
                        </thead>
                        <tbody id="medalPOPWILTableBody" class="bg-white divide-y divide-gray-200">
                            <!-- Rows via jQuery -->
                        </tbody>
                    </table>
                </div>
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
let currentSlide = 0;
let start = 0; // pagination offset
let length = 3; // limit per fetch
let loading = false;

// Inisialisasi pertama
$(document).ready(function() {
    let caborPopda = $('#caborPopda').val();
    let caborPopwil = $('#caborPopwil').val();

    $('#next-slide').on('click', function() {
        nextSlide();
    });

    $('#prev-slide').on('click', function() {
        prevSlide();
    });

    $('.tab-btn').on('click', function() {
        $('.tab-btn').removeClass('text-blue-600 border-blue-600 border-b-2').addClass('text-gray-600');
        $(this).addClass('text-blue-600 border-blue-600 border-b-2');

        const target = $(this).data('tab');
        $('.tab-content').addClass('hidden');
        $('#tab-' + target).removeClass('hidden');
    });
    loadNewsInSlider();
    loadMedalSummary();
    loadKecamatanMedalTable();
    loadSubRayonMedalTable();
    loadPOPDAMedalTable(caborPopda);
    loadPOPWILMedalTable(caborPopwil);
    loadNews();
    loadGaleries(true);
    getCabor();

    $('#o2sn-smp-table').hide();
    $('#jenjang').on('change', function() {
        let value = $(this).val();
        if (value === 'SMP') {
            $('#o2sn-smp-table').show();
            $('#o2sn-sd-table').hide();
        } else {
            $('#o2sn-smp-table').hide();
            $('#o2sn-sd-table').show();
        }
    });

    $('#caborPopda').on('change', function() {
        let cabangOlahraga = $(this).val();
        loadPOPDAMedalTable(cabangOlahraga);
    });

    $('#caborPopwil').on('change', function() {
        let cabangOlahraga = $(this).val();
        loadPOPWILMedalTable(cabangOlahraga);
    });
});

function renderNews(newsArray) {
    newsArray.forEach(news => {
        const content = stripHtml(news.content).substring(0, 150) + '...';
        const html = `
                <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <img src="/storage/${news.thumbnail_url}" alt="${news.title}" class="w-full h-48 object-cover">
                    <div class="p-6 bg-white">
                        <div class="flex justify-between items-center text-sm text-blue-600 font-medium mb-2">
                            <span>${formatDate(news.published_at)}</span>
                            <span>${news.category}</span>
                        </div>
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

function loadNewsInSlider(reset = false) {
    $.ajax({
        url: `/api/posts/news`,
        method: 'GET',
        data: {
            type: 'latest',
            start: start,
            length: 6
        },
        success: function(response) {
            if (reset) {
                $('#sliderWrapper').empty();
            }
            renderNewsInSlider(response.data);
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat berita:', error);
        },
        complete: function() {
            loading = false;
        }
    });
}

function renderNewsInSlider(newsItems) {
    const sliderWrapper = $('#sliderWrapper');
    sliderWrapper.empty();

    newsItems.forEach((news, index) => {
        const isActive = index === 0 ? 'active' : '';
        const slide = `
           <div class="slide ${isActive} relative w-full h-full">
                <img src="/storage/${news.thumbnail_url}" alt="${news.title}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="text-center text-white px-4 max-w-3xl">
                        <div class="flex flex-wrap justify-center items-center gap-4 text-sm mb-6">
                            <span class="bg-blue-600 px-3 py-1 rounded-full uppercase tracking-wide font-semibold">
                                ${news.category}
                            </span>
                            <span class="text-gray-200 italic">
                                ${formatDate(news.published_at)}
                            </span>
                        </div>

                        <h1 class="text-3xl md:text-5xl font-bold mb-8 leading-tight drop-shadow-md">
                            ${news.title}
                        </h1>

                        <a href="/berita/${news.slug}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors shadow-lg">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        `;
        sliderWrapper.append(slide);
    });

    renderSliderDots(newsItems.length);
    showSlide(0); // Reset to first slide
}

// Generate and bind navigation dots
function renderSliderDots(count) {
    const dotContainer = $('#sliderDots');
    dotContainer.empty();

    for (let i = 0; i < count; i++) {
        dotContainer.append(`
            <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75"
                data-slide="${i}"></button>
        `);
    }

    attachDotEvents();
}

// Show slide by index
function showSlide(index) {
    const slides = $('.slide');
    const dots = $('.slider-dot');

    slides.removeClass('active').eq(index).addClass('active');
    dots.removeClass('bg-white').addClass('bg-opacity-50');
    dots.eq(index).removeClass('bg-opacity-50').addClass('bg-white');

    currentSlide = index;
}

// Move to next slide
function nextSlide() {
    const totalSlides = $('.slide').length;
    const next = (currentSlide + 1) % totalSlides;
    showSlide(next);
}

// Move to previous slide
function prevSlide() {
    const totalSlides = $('.slide').length;
    const prev = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(prev);
}

// Bind dot click events
function attachDotEvents() {
    $('.slider-dot').off('click').on('click', function() {
        const index = $(this).data('slide');
        showSlide(index);
    });
}

// Auto-slide
setInterval(() => {
    nextSlide();
}, 5000); // every 5 seconds

function formatDate(dateStr) {
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    return new Date(dateStr).toLocaleDateString('id-ID', options);
}

function loadNews(reset = false) {
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
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat berita:', error);
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
            length: 8
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
                        <td class="px-6 py-4 font-medium text-xs">
                            <a href="/prestasi/kecamatan/${item.id}" class="text-blue-700 hover:underline">
                                ${item.nama}
                            </a>
                        </td>
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

function loadSubRayonMedalTable() {
    $.ajax({
        url: '/api/getSubRayonMedalSummary',
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
                        <td class="px-6 py-4 font-medium text-xs">
                            <a href="/prestasi/subrayon/${item.id}" class="text-blue-700 hover:underline">
                                Sub Rayon ${item.nama}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center text-xs text-yellow-600 font-semibold">${item.emas}</td>
                        <td class="px-6 py-4 text-center text-xs text-gray-600 font-semibold">${item.perak}</td>
                        <td class="px-6 py-4 text-center text-xs text-orange-600 font-semibold">${item.perunggu}</td>
                        <td class="px-6 py-4 text-center text-xs text-blue-600 font-bold">${item.total}</td>
                    </tr>
                `;
            });

            $('#medalSubRayonTableBody').html(rows);
            $('#medalSubRayonTableFooter').html(`
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
            $('#medalSubRayonTableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
            );
        }
    });
}

function loadPOPDAMedalTable(cabangOlahragaId = '') {
    $.ajax({
        url: '/api/getPOPDAMedalSummary',
        method: 'GET',
        data: {
            cabang_olahraga_id: cabangOlahragaId
        },
        success: function(data) {
            let rows = '';

            $.each(data, function(i, item) {
                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">
                            ${escapeHtml(item.nama_lengkap)}
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.cabang_olahraga)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.no_pertandingan)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.asal_sekolah)}</td>
                        <td class="px-6 py-4 text-xs font-bold text-center">${escapeHtml(medalName(item.perolehan_medali))}</td>
                    </tr>
                `;
            });

            $('#medalPOPDATableBody').html(rows);
        },
        error: function() {
            $('#medalPOPDATableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
            );
        }
    });
}

function loadPOPWILMedalTable(cabangOlahragaId = '') {
    $.ajax({
        url: '/api/getPOPWILMedalSummary',
        method: 'GET',
        data: {
            cabang_olahraga_id: cabangOlahragaId
        },
        success: function(data) {
            let rows = '';

            $.each(data, function(i, item) {
                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">
                            ${escapeHtml(item.nama_lengkap)}
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.cabang_olahraga)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.no_pertandingan)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.asal_sekolah)}</td>
                        <td class="px-6 py-4 text-xs font-bold text-center">${escapeHtml(medalName(item.perolehan_medali))}</td>
                    </tr>
                `;
            });

            $('#medalPOPWILTableBody').html(rows);
        },
        error: function() {
            $('#medalPOPWILTableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
            );
        }
    });
}

function getCabor() {
    $.ajax({
        url: '/api/cabor',
        method: 'GET',
        success: function(response) {
            if (response && response.data) {
                $.each(response.data, function(index, cabor) {
                    $('.cabor').append(
                        $('<option>', {
                            value: cabor.id,
                            text: cabor.name
                        })
                    );
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat data cabor:', error);
        }
    });
}

function medalName(code) {
    switch (code) {
        case 1:
            return 'I';
        case 2:
            return 'II';
        case 3:
            return 'III';
        default:
            return '-';
    }
}

function escapeHtml(text) {
    return $('<div>').text(text || '-').html();
}

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
</script>
@endsection
