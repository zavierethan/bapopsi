@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<div class="bg-gradient-to-br from-green-50 via-blue-50 to-red-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
        <!-- Page Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Galeri Olahraga</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kumpulan foto dokumentasi kegiatan dan prestasi olahraga
                pelajar</p>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white p-6 rounded-xl shadow-lg border mb-8">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Search Input -->
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                    <input type="text" placeholder="Cari foto atau kegiatan..."
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-black" />
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12" id="galleries-wrapper">

        </div>

        <!-- Empty State -->
        <div class="text-center py-12 hidden">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Tidak ada foto ditemukan</h3>
            <p class="text-gray-500">Coba ubah kata kunci pencarian atau kategori</p>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
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
