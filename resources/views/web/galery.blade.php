@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mt-5">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri</h1>
            <p class="text-xl text-blue-100">Dokumentasi kegiatan dan prestasi olahraga pelajar Indonesia</p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 justify-center">
            <button class="filter-btn bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                data-filter="all">
                Semua
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="turnamen">
                Turnamen
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="pelatihan">
                Pelatihan
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="prestasi">
                Prestasi
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="kegiatan">
                Kegiatan
            </button>
        </div>
    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Gallery Item 1 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="turnamen">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Turnamen Basket Nasional 2024"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Turnamen Basket Nasional 2024</h3>
                    <p class="text-sm text-gray-600">Jakarta Convention Center</p>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="prestasi">
                <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Penyerahan Medali Emas"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Penyerahan Medali Emas</h3>
                    <p class="text-sm text-gray-600">Kejuaraan Asia 2024</p>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="turnamen">
                <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Kompetisi Badminton"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Kompetisi Badminton</h3>
                    <p class="text-sm text-gray-600">Istora Senayan</p>
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="pelatihan">
                <img src="https://images.pexels.com/photos/416978/pexels-photo-416978.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Pelatihan Pelatih"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Pelatihan Pelatih</h3>
                    <p class="text-sm text-gray-600">Workshop Nasional</p>
                </div>
            </div>

            <!-- Gallery Item 5 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="kegiatan">
                <img src="https://images.pexels.com/photos/209977/pexels-photo-209977.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Pembukaan Event"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Pembukaan Event</h3>
                    <p class="text-sm text-gray-600">Festival Olahraga Pelajar</p>
                </div>
            </div>

            <!-- Gallery Item 6 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="turnamen">
                <img src="https://images.pexels.com/photos/1263349/pexels-photo-1263349.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Pertandingan Sepak Bola"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Pertandingan Sepak Bola</h3>
                    <p class="text-sm text-gray-600">Stadion Gelora Bung Karno</p>
                </div>
            </div>

            <!-- Gallery Item 7 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="prestasi">
                <img src="https://images.pexels.com/photos/1040881/pexels-photo-1040881.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Tim Juara Nasional"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Tim Juara Nasional</h3>
                    <p class="text-sm text-gray-600">Voli Putri Indonesia</p>
                </div>
            </div>

            <!-- Gallery Item 8 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="pelatihan">
                <img src="https://images.pexels.com/photos/1618200/pexels-photo-1618200.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Latihan Renang"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Latihan Renang</h3>
                    <p class="text-sm text-gray-600">Aquatic Center</p>
                </div>
            </div>

            <!-- Gallery Item 9 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="kegiatan">
                <img src="https://images.pexels.com/photos/1263348/pexels-photo-1263348.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Seminar Olahraga"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Seminar Olahraga</h3>
                    <p class="text-sm text-gray-600">Pengembangan Atlet Muda</p>
                </div>
            </div>

            <!-- Gallery Item 10 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="turnamen">
                <img src="https://images.pexels.com/photos/1263347/pexels-photo-1263347.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Atletik Championship"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Atletik Championship</h3>
                    <p class="text-sm text-gray-600">Stadion Madya Senayan</p>
                </div>
            </div>

            <!-- Gallery Item 11 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="prestasi">
                <img src="https://images.pexels.com/photos/1263346/pexels-photo-1263346.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Atlet Berprestasi"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Atlet Berprestasi</h3>
                    <p class="text-sm text-gray-600">Peraih Medali Internasional</p>
                </div>
            </div>

            <!-- Gallery Item 12 -->
            <div class="gallery-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="kegiatan">
                <img src="https://images.pexels.com/photos/1263345/pexels-photo-1263345.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Kunjungan Sekolah"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Kunjungan Sekolah</h3>
                    <p class="text-sm text-gray-600">Program Sosialisasi</p>
                </div>
            </div>

            <!-- Hidden items for load more -->
            <div class="gallery-item hidden-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="pelatihan">
                <img src="https://images.pexels.com/photos/1552103/pexels-photo-1552103.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Pelatihan Teknik"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Pelatihan Teknik</h3>
                    <p class="text-sm text-gray-600">Fundamental Training</p>
                </div>
            </div>

            <div class="gallery-item hidden-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="turnamen">
                <img src="https://images.pexels.com/photos/1263344/pexels-photo-1263344.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Final Championship"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Final Championship</h3>
                    <p class="text-sm text-gray-600">Pertandingan Puncak</p>
                </div>
            </div>

            <div class="gallery-item hidden-item cursor-pointer overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                data-category="kegiatan">
                <img src="https://images.pexels.com/photos/1263343/pexels-photo-1263343.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Upacara Pembukaan"
                    class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                <div class="p-4 bg-white">
                    <h3 class="font-semibold text-gray-900 mb-1">Upacara Pembukaan</h3>
                    <p class="text-sm text-gray-600">Ceremony Opening</p>
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
$('.gallery-item img').click(function() {
    const src = $(this).attr('src');
    const alt = $(this).attr('alt');
    const title = $(this).siblings('.bg-white').find('h3').text();
    const description = $(this).siblings('.bg-white').find('p').text();

    $('#lightbox-img').attr('src', src).attr('alt', alt);
    $('#lightbox-title').text(title);
    $('#lightbox-description').text(description);
    $('#lightbox').fadeIn(300);
});

$(document).ready(function() {
    $.ajax({
        url: '/api/posts/galeries', // pastikan URL endpoint sesuai
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let articles = response.data;
            let html = '';

            $.each(articles, function(index, article) {
                let contentText = $('<div>').html(article.content).text().substring(0, 100);

                html += `
                    <div class="group bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <div class="relative overflow-hidden">
                            <img src="/storage/${article.image_url}" alt="${article.title}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" />
                            <div class="absolute top-3 right-3">
                                <span
                                    class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-medium">${article.category}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 text-sm leading-tight">Judul Kegiatan Menarik</h3>
                            <p class="text-gray-600 text-xs mb-3 line-clamp-2">${article.description}</p>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <div class="flex items-center space-x-1">
                                    <!-- Calendar icon -->
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM5 20V9h14v11H5z" />
                                    </svg>
                                    <span>${new Date(article.created_at).toLocaleDateString('id-ID')}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <!-- MapPin icon -->
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                                    </svg>
                                    <span class="truncate max-w-20">Bandung</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            $('#galleries-wrapper').html(html);
        },
        error: function(xhr, status, error) {
            $('#galleries-wrapper').html(
                '<div class="text-red-500">Gagal memuat data artikel.</div>');
        }
    });
});
</script>
@endsection
