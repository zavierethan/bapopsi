@extends('layouts.app')

@section('content')
<!-- ✅ Hero Banner -->
<section class="relative bg-gradient-to-br from-orange-500 via-red-500 to-blue-700 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
        <div class="absolute bottom-10 right-20 w-24 h-24 bg-white opacity-5 rounded-full"></div>
        <div class="absolute top-1/2 right-10 w-16 h-16 bg-white opacity-5 rounded-full"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-10">
                <div class="space-y-6">
                    <h1 class="text-6xl lg:text-7xl font-extrabold leading-tight text-white drop-shadow-lg">
                        BAPOPSI
                    </h1>
                    <h2 class="text-3xl lg:text-4xl font-semibold text-blue-100 mb-2 drop-shadow">
                        Badan Penyelenggara Olahraga Pelajar
                    </h2>
                    <p class="text-2xl text-blue-100 leading-relaxed max-w-2xl drop-shadow">
                        Platform digital terpadu untuk mengelola kompetisi olahraga pelajar, memantau prestasi atlet, dan membangun ekosistem olahraga yang lebih baik.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/login"
                        class="group px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center space-x-2 text-lg">
                        <span>Masuk ke Sistem</span>
                        <div
                            class="w-5 h-5 bg-white bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition-colors">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </a>
                    <a href="/register"
                        class="px-8 py-4 border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:text-blue-700 transition-all duration-300 transform hover:scale-105 flex items-center justify-center text-lg">
                        Daftar Pengelola
                    </a>
                </div>
                <div class="pt-4">
                    <a href="https://www.instagram.com/bapopsi_kab.bandung/" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-40 rounded-full text-white font-medium transition text-lg">
                        <i class="fab fa-instagram text-pink-500 text-2xl"></i>
                        <span class="text-base">@bapopsi_kab.bandung</span>
                    </a>
                </div>
            </div>
            <div class="lg:justify-self-end flex justify-center lg:justify-end mt-12 lg:mt-0">
                <div class="relative ml-0">
                    <img src="/assets/media/bupati.png" alt="Bupati Bandung" class="h-[600px] max-h-[98vh] w-auto object-contain drop-shadow-2xl" style="margin:0 auto;" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-500 via-red-500 to-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold mb-10 text-white">Berita</h2>
        <div class="flex space-x-4 mb-8" id="news-tabs">
            <button class="tab-btn px-6 py-2 rounded-full font-semibold text-white bg-gradient-to-r from-orange-500 to-red-500 shadow active" data-type="latest">Latest</button>
            <button class="tab-btn px-6 py-2 rounded-full font-semibold text-gray-700 bg-gray-100 hover:bg-orange-100 transition" data-type="popular">Popular</button>
            <button class="tab-btn px-6 py-2 rounded-full font-semibold text-gray-700 bg-gray-100 hover:bg-orange-100 transition" data-type="trending">Trending</button>
        </div>
        <div class="flex space-x-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-blue-300 scrollbar-track-blue-100" id="articles-wrapper">

        </div>
    </div>
</section>

<!-- Statistik Prestasi Section -->
<section class="py-20 bg-gradient-to-br from-orange-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Statistik Prestasi</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pantau perkembangan prestasi olahraga pelajar dengan visualisasi data yang komprehensif
            </p>
        </div>
        <div class="bg-white rounded-3xl shadow-lg border p-8 mt-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Statistik Prestasi</h3>
            <!-- Ringkasan Medali -->
            <div id="medali-summary" class="flex flex-col md:flex-row md:justify-between gap-4 mb-8"></div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <div class="flex items-center gap-2">
                    <label for="filter-kecamatan" class="font-semibold text-gray-700">Filter Kecamatan:</label>
                    <select id="filter-kecamatan" class="p-2 border rounded-xl text-black min-w-[180px]">
                        <option value="">Semua Kecamatan</option>
                    </select>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-xl overflow-hidden cursor-pointer" id="kecamatanTable">
                    <thead class="bg-gradient-to-r from-orange-500 to-blue-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nama Kecamatan</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Perolehan Medali</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Medali Emas</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Medali Perak</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Medali Perunggu</th>
                        </tr>
                    </thead>
                    <tbody id="kecamatan-tbody" class="bg-white divide-y divide-gray-100">
                        <!-- Data akan diisi oleh JS -->
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-6" id="pagination-wrapper"></div>
        </div>
    </div>
</section>

<!-- Galeri Section -->
<section class="py-20 bg-gradient-to-br from-green-50 via-blue-50 to-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <h2 class="text-4xl font-bold text-gray-800">Galeri</h2>
            <a href="/galery" class="px-6 py-2 rounded-full font-semibold text-white bg-gradient-to-r from-orange-500 to-red-500 shadow hover:from-orange-600 hover:to-red-600 transition-all">Lihat Semua</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-4" id="galleries-wrapper-home">
            <!-- Galeri akan diisi oleh JS -->
        </div>
        <div id="gallery-empty-home" class="text-center py-12 hidden">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Tidak ada foto ditemukan</h3>
            <p class="text-gray-500">Coba kunjungi halaman galeri untuk koleksi lebih lengkap.</p>
        </div>
    </div>
</section>

<!-- Modal Atlet per Kecamatan -->
<div id="modal-atlet" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-3xl shadow-2xl border-2 border-orange-200 max-w-4xl w-full p-10 relative transition-all duration-300">
        <button id="close-modal-atlet" class="absolute top-6 right-8 text-gray-500 hover:text-red-500 text-3xl font-bold transition">&times;</button>
        <h3 class="text-3xl font-extrabold mb-6 text-gray-800 text-center tracking-wide" id="modal-atlet-title">Daftar Atlet</h3>
        <!-- Filter Section -->
        <div class="flex flex-col md:flex-row md:items-center gap-4 mb-8 justify-center">
            <input type="text" id="filter-nama-atlet" class="p-3 border-2 border-orange-200 rounded-xl text-black w-full md:w-1/3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition" placeholder="Cari Nama Atlet...">
            <input type="text" id="filter-sekolah-atlet" class="p-3 border-2 border-orange-200 rounded-xl text-black w-full md:w-1/3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition" placeholder="Cari Asal Sekolah...">
        </div>
        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full divide-y divide-gray-200 rounded-xl overflow-hidden shadow-md">
                <thead class="bg-gradient-to-r from-orange-500 to-blue-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">Nama Atlet</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">Asal Sekolah</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">Perolehan Medali</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">Jenis Medali</th>
                    </tr>
                </thead>
                <tbody id="modal-atlet-tbody" class="bg-white divide-y divide-gray-100">
                    <!-- Data atlet akan diisi oleh JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
// Data dummy atlet per kecamatan (dengan asal sekolah)
const atletDetailData = {
    'Kec. Bandung Wetan': [
        { nama: 'Rizky Maulana', sekolah: 'SMA 1 Bandung', total: 3, jenis: 'Emas' },
        { nama: 'Dewi Lestari', sekolah: 'SMA 2 Bandung', total: 2, jenis: 'Perak' },
        { nama: 'Budi Santoso', sekolah: 'SMA 1 Bandung', total: 3, jenis: 'Perunggu' },
    ],
    'Kec. Sumedang Selatan': [
        { nama: 'Andi Saputra', sekolah: 'SMA 1 Sumedang', total: 2, jenis: 'Emas' },
        { nama: 'Siti Nurhaliza', sekolah: 'SMA 1 Sumedang', total: 2, jenis: 'Perunggu' },
    ],
    'Kec. Cimahi Tengah': [
        { nama: 'Siti Aminah', sekolah: 'SMA Cimahi 1', total: 1, jenis: 'Emas' },
        { nama: 'Dian Pratama', sekolah: 'SMA Cimahi 1', total: 1, jenis: 'Perak' },
        { nama: 'Rina Kurnia', sekolah: 'SMA Cimahi 1', total: 1, jenis: 'Perunggu' },
    ]
};
let currentAtletList = [];
function renderAtletTable(list) {
    let html = '';
    if (list.length === 0) {
        html = '<tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data atlet untuk filter ini.</td></tr>';
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
$(document).ready(function() {
    $('.kecamatan-row').on('click', function() {
        var kecamatan = $(this).data('kecamatan');
        var atlet = atletDetailData[kecamatan] || [];
        currentAtletList = atlet;
        renderAtletTable(atlet);
        $('#atlet-detail-title').text('Daftar Atlet - ' + kecamatan);
        $('#atlet-detail-wrapper').removeClass('hidden');
        // Reset filter
        $('#filter-sekolah').val('');
        $('#filter-medali').val('');
        $('#filter-allword').val('');
        // Scroll ke tabel detail
        $('html, body').animate({ scrollTop: $('#atlet-detail-wrapper').offset().top - 100 }, 500);
    });
    $('#filter-sekolah, #filter-medali').on('change', applyAtletFilter);
    $('#filter-allword').on('input', applyAtletFilter);
    $('#btn-back-kecamatan').on('click', function() {
        $('#atlet-detail-wrapper').addClass('hidden');
        $('html, body').animate({ scrollTop: $('#kecamatanTable').offset().top - 100 }, 500);
    });

    // Tambahkan script untuk load berita dengan kategori
    function loadArticles(type = 'latest') {
        $.ajax({
            url: '/api/posts/news?type=' + type,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let articles = response.data;
                let html = '';
                $.each(articles, function(index, article) {
                    let contentText = $('<div>').html(article.content).text().substring(0, 100);
                    html += `
                        <a href="/berita/${article.slug}">
                        <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer min-w-[320px] max-w-xs">
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
                                        <span>Admin</span>
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
            error: function(xhr, status, error) {
                $('#articles-wrapper').html('<div class="text-red-500">Gagal memuat data artikel.</div>');
            }
        });
    }
    loadArticles('latest');
    $('#news-tabs').on('click', '.tab-btn', function() {
        $('.tab-btn').removeClass('bg-gradient-to-r from-orange-500 to-red-500 text-white shadow active').addClass('text-gray-700 bg-gray-100 hover:bg-orange-100');
        $(this).addClass('bg-gradient-to-r from-orange-500 to-red-500 text-white shadow active').removeClass('text-gray-700 bg-gray-100 hover:bg-orange-100');
        let type = $(this).data('type');
        loadArticles(type);
    });

    // Galeri Panel Home
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

    // Dummy data kecamatan (20 data untuk contoh pagination)
    const kecamatanData = [
        { nama: 'Kec. Bandung Wetan', total: 8, emas: 3, perak: 2, perunggu: 3 },
        { nama: 'Kec. Sumedang Selatan', total: 4, emas: 1, perak: 1, perunggu: 2 },
        { nama: 'Kec. Cimahi Tengah', total: 3, emas: 1, perak: 1, perunggu: 1 },
        { nama: 'Kec. Bojongsoang', total: 7, emas: 2, perak: 3, perunggu: 2 },
        { nama: 'Kec. Cileunyi', total: 6, emas: 2, perak: 2, perunggu: 2 },
        { nama: 'Kec. Dayeuhkolot', total: 5, emas: 1, perak: 2, perunggu: 2 },
        { nama: 'Kec. Rancaekek', total: 9, emas: 4, perak: 3, perunggu: 2 },
        { nama: 'Kec. Soreang', total: 10, emas: 5, perak: 3, perunggu: 2 },
        { nama: 'Kec. Baleendah', total: 6, emas: 2, perak: 2, perunggu: 2 },
        { nama: 'Kec. Cicalengka', total: 7, emas: 3, perak: 2, perunggu: 2 },
        { nama: 'Kec. Ciparay', total: 8, emas: 3, perak: 3, perunggu: 2 },
        { nama: 'Kec. Majalaya', total: 5, emas: 2, perak: 1, perunggu: 2 },
        { nama: 'Kec. Katapang', total: 4, emas: 1, perak: 1, perunggu: 2 },
        { nama: 'Kec. Cangkuang', total: 6, emas: 2, perak: 2, perunggu: 2 },
        { nama: 'Kec. Pameungpeuk', total: 7, emas: 2, perak: 3, perunggu: 2 },
        { nama: 'Kec. Banjaran', total: 8, emas: 3, perak: 3, perunggu: 2 },
        { nama: 'Kec. Arjasari', total: 5, emas: 2, perak: 1, perunggu: 2 },
        { nama: 'Kec. Cimaung', total: 4, emas: 1, perak: 1, perunggu: 2 },
        { nama: 'Kec. Pacet', total: 6, emas: 2, perak: 2, perunggu: 2 },
        { nama: 'Kec. Ibun', total: 7, emas: 3, perak: 2, perunggu: 2 }
    ];
    const rowsPerPage = 10;
    let currentPage = 1;
    let filteredKecamatan = [...kecamatanData];
    function renderKecamatanTable(page = 1) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = filteredKecamatan.slice(start, end);
        let html = '';
        pageData.forEach(function(item, idx) {
            html += `<tr>
                <td class="px-6 py-4 whitespace-nowrap text-black">${start + idx + 1}</td>
                <td class="px-6 py-4 whitespace-nowrap font-semibold text-blue-700 underline cursor-pointer kecamatan-nama" data-kecamatan="${item.nama}">${item.nama}</td>
                <td class="px-6 py-4 whitespace-nowrap text-black">${item.total}</td>
                <td class="px-6 py-4 whitespace-nowrap text-black">${item.emas}</td>
                <td class="px-6 py-4 whitespace-nowrap text-black">${item.perak}</td>
                <td class="px-6 py-4 whitespace-nowrap text-black">${item.perunggu}</td>
            </tr>`;
        });
        $('#kecamatan-tbody').html(html);
        // Attach click event for kecamatan name
        $('.kecamatan-nama').off('click').on('click', function() {
            const nama = $(this).data('kecamatan');
            const atlet = atletDetailData[nama] || [];
            let atletHtml = '';
            if (atlet.length === 0) {
                atletHtml = '<tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data atlet untuk kecamatan ini.</td></tr>';
            } else {
                atlet.forEach(function(a, idx) {
                    atletHtml += `<tr>
                        <td class=\"px-4 py-4 whitespace-nowrap text-black\">${idx+1}</td>
                        <td class=\"px-4 py-4 whitespace-nowrap font-semibold text-black\">${a.nama}</td>
                        <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.sekolah}</td>
                        <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.total}</td>
                        <td class=\"px-4 py-4 whitespace-nowrap text-black\">${a.jenis}</td>
                    </tr>`;
                });
            }
            $('#modal-atlet-title').text('Daftar Atlet - ' + nama);
            $('#modal-atlet-tbody').html(atletHtml);
            $('#modal-atlet').removeClass('hidden');
        });
    }
    function renderPagination() {
        const totalPages = Math.ceil(filteredKecamatan.length / rowsPerPage);
        let html = '';
        for (let i = 1; i <= totalPages; i++) {
            html += `<button class="px-4 py-2 mx-1 rounded-lg border ${i === currentPage ? 'bg-orange-500 text-white' : 'bg-white text-gray-700 hover:bg-orange-100'}" onclick="goToPage(${i})">${i}</button>`;
        }
        $('#pagination-wrapper').html(html);
    }
    function goToPage(page) {
        currentPage = page;
        renderKecamatanTable(page);
        renderPagination();
    }
    function renderKecamatanDropdown() {
        const kecamatanSet = new Set(kecamatanData.map(item => item.nama));
        let html = '<option value="">Semua Kecamatan</option>';
        kecamatanSet.forEach(function(nama) {
            html += `<option value="${nama}">${nama}</option>`;
        });
        $('#filter-kecamatan').html(html);
    }
    $('#filter-kecamatan').on('change', function() {
        const val = $(this).val();
        if (val) {
            filteredKecamatan = kecamatanData.filter(item => item.nama === val);
        } else {
            filteredKecamatan = [...kecamatanData];
        }
        currentPage = 1;
        renderKecamatanTable(currentPage);
        renderPagination();
    });
    $(document).ready(function() {
        renderKecamatanDropdown();
        renderKecamatanTable(1);
        renderPagination();
        renderMedaliSummary();
    });
    $('#close-modal-atlet').on('click', function() {
        $('#modal-atlet').addClass('hidden');
    });
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            $('#modal-atlet').addClass('hidden');
        }
    });
    function renderModalAtletTable(list) {
        let html = '';
        if (list.length === 0) {
            html = '<tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data atlet untuk filter ini.</td></tr>';
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
        $('#modal-atlet-tbody').html(html);
    }
    let modalAtletList = [];
    // Attach click event for kecamatan name (replace previous logic)
    $('.kecamatan-nama').off('click').on('click', function() {
        const nama = $(this).data('kecamatan');
        const atlet = atletDetailData[nama] || [];
        modalAtletList = atlet;
        renderModalAtletTable(atlet);
        $('#modal-atlet-title').text('Daftar Atlet - ' + nama);
        $('#modal-atlet').removeClass('hidden');
        // Reset filter
        $('#filter-nama-atlet').val('');
        $('#filter-sekolah-atlet').val('');
    });
    // Filter logic for modal
    $('#filter-nama-atlet, #filter-sekolah-atlet').on('input', function() {
        let namaVal = $('#filter-nama-atlet').val().toLowerCase();
        let sekolahVal = $('#filter-sekolah-atlet').val().toLowerCase();
        let filtered = modalAtletList.filter(function(a) {
            let matchNama = !namaVal || a.nama.toLowerCase().includes(namaVal);
            let matchSekolah = !sekolahVal || a.sekolah.toLowerCase().includes(sekolahVal);
            return matchNama && matchSekolah;
        });
        renderModalAtletTable(filtered);
    });

    // JS Section: Tambahkan perhitungan dan tampilan ringkasan medali
    function renderMedaliSummary() {
        let totalEmas = 0, totalPerak = 0, totalPerunggu = 0;
        kecamatanData.forEach(function(item) {
            totalEmas += item.emas;
            totalPerak += item.perak;
            totalPerunggu += item.perunggu;
        });
        const totalMedali = totalEmas + totalPerak + totalPerunggu;
        const persen = (val) => totalMedali ? ((val/totalMedali)*100).toFixed(1) : '0.0';
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
    }
});
</script>
@endsection
