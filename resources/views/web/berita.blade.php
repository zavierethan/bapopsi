@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mt-5">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita</h1>
            <p class="text-xl text-blue-100">Informasi terkini seputar kegiatan olahraga pelajar Indonesia</p>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Cari berita..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex gap-2">
                <button id="search-btn"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
                <button id="reset-search"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Reset
                </button>
            </div>
        </div>
    </div>
</section>

<!-- News Grid Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Item 1 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/416978/pexels-photo-416978.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">12 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        BAPOPSI Luncurkan Program Pembinaan Atlet Muda Berbakat
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Program pembinaan khusus untuk mengembangkan potensi atlet muda Indonesia di berbagai cabang
                        olahraga prioritas. Program ini akan melibatkan pelatih bersertifikat internasional...
                    </p>
                    <a href="detail-berita.html?id=1"
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Prestasi Membanggakan Tim Badminton Indonesia di Kejuaraan Asia
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Tim badminton pelajar Indonesia berhasil meraih medali emas dalam kejuaraan tingkat Asia yang
                        berlangsung di Thailand. Prestasi ini membuktikan kualitas pembinaan BAPOPSI...
                    </p>
                    <a href="detail-berita.html?id=2"
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Kerjasama BAPOPSI dengan Kementerian Pendidikan untuk Olahraga Sekolah
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Penandatanganan MoU antara BAPOPSI dan Kemendikbud untuk meningkatkan kualitas olahraga di
                        sekolah-sekolah seluruh Indonesia. Kerjasama ini mencakup pelatihan guru...
                    </p>
                    <a href="detail-berita.html?id=3"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- News Item 4 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 4" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">5 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Workshop Pelatih Olahraga Pelajar Se-Indonesia
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        BAPOPSI menyelenggarakan workshop untuk meningkatkan kompetensi pelatih olahraga pelajar di
                        seluruh Indonesia. Workshop ini dihadiri oleh 500 pelatih dari berbagai daerah...
                    </p>
                    <a href="detail-berita.html?id=4"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- News Item 5 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/209977/pexels-photo-209977.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 5" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">3 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Fasilitas Olahraga Baru untuk Sekolah-Sekolah di Daerah Terpencil
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Program bantuan fasilitas olahraga untuk sekolah-sekolah di daerah terpencil sebagai upaya
                        pemerataan akses olahraga. Program ini akan menjangkau 100 sekolah di seluruh Indonesia...
                    </p>
                    <a href="detail-berita.html?id=5"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- News Item 6 -->
            <div class="news-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1263349/pexels-photo-1263349.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 6" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">1 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Rencana Strategis BAPOPSI 2024: Menuju Prestasi Olahraga Pelajar Dunia
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        BAPOPSI menetapkan target ambisius untuk membawa prestasi olahraga pelajar Indonesia ke tingkat
                        dunia pada tahun 2024. Rencana strategis ini mencakup berbagai program inovatif...
                    </p>
                    <a href="detail-berita.html?id=6"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Hidden items for load more functionality -->
            <div
                class="news-item hidden-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1040881/pexels-photo-1040881.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 7" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">28 Desember 2023</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Evaluasi Program BAPOPSI Tahun 2023
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Evaluasi komprehensif terhadap seluruh program BAPOPSI tahun 2023 menunjukkan peningkatan
                        signifikan dalam prestasi olahraga pelajar Indonesia...
                    </p>
                    <a href="detail-berita.html?id=7"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div
                class="news-item hidden-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1618200/pexels-photo-1618200.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 8" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">25 Desember 2023</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Perayaan Hari Olahraga Nasional 2023
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Perayaan Hari Olahraga Nasional 2023 diselenggarakan dengan meriah di seluruh Indonesia. BAPOPSI
                        mengkoordinasikan berbagai kegiatan olahraga pelajar...
                    </p>
                    <a href="detail-berita.html?id=8"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div
                class="news-item hidden-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1263348/pexels-photo-1263348.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita 9" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">22 Desember 2023</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Turnamen Futsal Pelajar Nasional 2023
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Turnamen Futsal Pelajar Nasional 2023 berhasil diselenggarakan dengan partisipasi dari 34
                        provinsi. Turnamen ini menjadi ajang pencarian bibit unggul futsal Indonesia...
                    </p>
                    <a href="detail-berita.html?id=9"
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button
                class="load-more-btn bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>
@endsection


@section('script')
<script>
let debounceTimer;
let currentType = 'latest';

$(document).ready(function() {
    loadArticles(currentType);

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

    $('#searchInput').on('keyup', function() {
        const searchQuery = $(this).val();
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            loadArticles(currentType, searchQuery);
        }, 500);
    });
});

function loadArticles(type = 'latest', search = '') {
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
</script>

@endsection
