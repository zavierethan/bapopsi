@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="pt-20 pb-4 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm">
        </nav>
    </div>
</section>

<!-- News Detail Section -->
<section class="py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article id="news-detail">
            <div class="mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" style="text-align: justify;">{{$post->title}}</h1>
                <div class="flex flex-wrap items-center text-sm text-gray-600 mb-6">
                    <span class="mr-4">
                        <i class="fas fa-calendar mr-1"></i>
                        {{$post->published_at}}
                    </span>
                    <span class="mr-4">
                        <i class="fas fa-user mr-1"></i>
                        {{$post->author}}
                    </span>
                    <span>
                        <i class="fas fa-eye mr-1"></i>
                        230 views
                    </span>
                </div>
            </div>

            <div class="mb-8">
                <img src="/storage/{{$post->thumbnail_url}}" alt="{{$post->title}}"
                    class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
            </div>

            <div class="news-content prose prose-lg max-w-none">
                {!!$post->content!!}
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex flex-wrap gap-2">
                    <span class="text-sm text-gray-600">Tags:</span>
                    @foreach($tags as $tag)
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>
        </article>

        <!-- Share Section -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Berita</h3>
            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0">
                <button onclick="copyToClipboard()"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-link mr-2"></i>Salin Link
                </button>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="/berita" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>

<!-- Related News Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Related News Item 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">10 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Prestasi Membanggakan Tim Badminton Indonesia
                    </h3>
                    <a href="detail-berita.html?id=2" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Related News Item 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">8 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Kerjasama BAPOPSI dengan Kementerian Pendidikan
                    </h3>
                    <a href="detail-berita.html?id=3" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Related News Item 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">5 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Workshop Pelatih Olahraga Pelajar Se-Indonesia
                    </h3>
                    <a href="detail-berita.html?id=4" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
// Load news detail when page loads
$(document).ready(function() {

});
// Copy to clipboard function
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        alert('Link berhasil disalin!');
    });
}
</script>
@endsection
