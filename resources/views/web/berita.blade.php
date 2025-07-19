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

<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-4 justify-center">
            <button class="filter-btn bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors"
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
</section>

<!-- News Grid Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="newsGrid">
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button
                id="loadMoreBtn"
                class="load-more-btn bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>
@endsection


@section('script')
<script>
let currentFilter = 'latest'; // default filter
let start = 0; // pagination offset
const length = 9; // limit per fetch
let loading = false;

// Inisialisasi pertama
$(document).ready(function() {
    loadNews();

    // Handle filter tab click
    $('.filter-btn').on('click', function() {
        $('.filter-btn').removeClass('bg-blue-600 text-white').addClass('bg-gray-200 text-gray-700');
        $(this).removeClass('bg-gray-200 text-gray-700').addClass('bg-blue-600 text-white');

        currentFilter = $(this).data('filter');
        start = 0;
        loadNews(true);
    });

    // Handle load more
    $('#loadMoreBtn').on('click', function() {
        loadNews();
    });
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
            length: length
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
</script>
@endsection
