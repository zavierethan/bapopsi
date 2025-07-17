@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<div class="bg-gradient-to-br from-blue-50 via-green-50 to-orange-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="/berita" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold transition-colors group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Berita
            </a>
        </div>

        <!-- Article Header -->
        <article class="bg-white rounded-xl shadow-lg border overflow-hidden">
            <!-- Article Image -->
            <div class="relative">
                <img src="/storage/{{$post->thumbnail_url}}" alt="Judul Artikel" class="w-full h-64 md:h-80 object-cover" />
                <div class="absolute top-4 left-4">
                    <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-medium">{{$post->category}}</span>
                </div>
            </div>

            <!-- Article Content -->
            <div class="p-6 md:p-8">
                <!-- Article Meta -->
                <div class="flex flex-wrap items-center justify-between mb-6 text-sm text-gray-500">
                    <div class="flex items-center space-x-4 mb-2 md:mb-0">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                            </svg>
                            <span>Admin BAPOPSI</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM5 20V9h14v11H5z" />
                            </svg>
                            <span>18 Juni 2025</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                            </svg>
                            <span>1,247 views</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 6v6l4 2" />
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                            </svg>
                            <span>5 menit baca</span>
                        </div>
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {{$post->title}}
                </h1>

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed" style="text-align: justify;">
                    {!!$post->content!!}
                </div>

                <!-- Article Tags -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Tag:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors cursor-pointer">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Bagikan Artikel:</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                            Twitter
                        </a>
                        <a href="#" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>
                        <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Artikel Terkait</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="articles-wrapper">
            </div>
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
                    <a href="/berita/${article.slug}" class="block">
                        <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                            <img src="/storage/${article.thumbnail_url}" alt="${article.title}" class="w-full h-48 object-cover" />
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-medium">${article.category}</span>
                                    <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 6v6l4 2" />
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                        </svg>
                                        <span>6 menit</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">${article.title}</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">${contentText}...</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span>${new Date(article.published_at).toLocaleDateString('id-ID')}</span>
                                    <span>967 views</span>
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
