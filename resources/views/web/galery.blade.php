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
                data-filter="2">
                Semua
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="1">
                Turnamen
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="2">
                Pelatihan
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="3">
                Prestasi
            </button>
            <button
                class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
                data-filter="4">
                Kegiatan
            </button>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="galeriesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->

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

let currentFilter = 2; // default filter
let start = 0; // pagination offset
const length = 9; // limit per fetch
let loading = false;

$(document).ready(function() {
    loadGaleries();

    // Handle filter tab click
    $('.filter-btn').on('click', function() {
        $('.filter-btn').removeClass('bg-blue-600 text-white').addClass('bg-gray-200 text-gray-700');
        $(this).removeClass('bg-gray-200 text-gray-700').addClass('bg-blue-600 text-white');

        currentFilter = $(this).data('filter');
        start = 0;
        loadGaleries(true);
    });

    // Handle load more
    $('#loadMoreBtn').on('click', function() {
        loadGaleries();
    });
});

function renderGaleries(galeriesArray) {
    galeriesArray.forEach(galeries => {
        const html = `
                <div class="gallery-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="turnamen">
                    <img src="/storage/${galeries.image_url}"
                        alt="Turnamen Basket Nasional 2024"
                        class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                    <div class="p-6 bg-white">
                        <div class="text-sm text-blue-600 font-medium mb-2">${formatDate(galeries.created_at)}</div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">${galeries.title}</h3>
                    </div>
                </div>
            `;
        $('#galeriesGrid').append(html);
    });
}

function loadGaleries(reset = false) {
    if (loading) return;
    loading = true;
    $('#loadMoreBtn').prop('disabled', true).text('Memuat...');

    $.ajax({
        url: `/api/posts/galeries`,
        method: 'GET',
        data: {
            type: currentFilter,
            start: start,
            length: length
        },
        success: function(response) {
            if (reset) {
                $('#galeriesGrid').empty();
            }

            renderGaleries(response.data);

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

function formatDate(dateStr) {
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    return new Date(dateStr).toLocaleDateString('id-ID', options);
}
</script>
@endsection
