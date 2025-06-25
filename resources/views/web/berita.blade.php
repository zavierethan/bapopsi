@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<div class="bg-gradient-to-br from-blue-50 via-green-50 to-orange-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
        <!-- Page Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Berita Olahraga</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Informasi terbaru seputar kegiatan dan prestasi olahraga
                pelajar</p>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white p-6 rounded-xl shadow-lg border mb-8">
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="flex-1 relative">
                    <!-- Search Icon (use Heroicons or inline SVG) -->
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                    <input type="text" placeholder="Cari berita atau artikel..."
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-black" />
                </div>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12" id="articles-wrapper">

        </div>

        <!-- Empty State -->
        <div class="text-center py-12 hidden">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Tidak ada artikel ditemukan</h3>
            <p class="text-gray-500">Coba ubah kata kunci pencarian atau kategori</p>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
$(document).ready(function () {
    $.ajax({
        url: '/api/posts/news', // pastikan URL endpoint sesuai
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let articles = response.data;
            let html = '';

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
});
</script>
@endsection
