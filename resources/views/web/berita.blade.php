@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
    <!-- Search and Filter -->
    <div class="bg-white p-6 rounded-xl shadow-sm border mb-8">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1 relative">
                <!-- Search Icon (use Heroicons or inline SVG) -->
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
                <input type="text" placeholder="Cari berita atau artikel..."
                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>
            <div class="flex gap-2 overflow-x-auto">
                <button class="px-4 py-2 rounded-lg font-medium bg-blue-600 text-white">Semua</button>
                <button
                    class="px-4 py-2 rounded-lg font-medium bg-gray-100 text-gray-700 hover:bg-gray-200">Olahraga</button>
                <button
                    class="px-4 py-2 rounded-lg font-medium bg-gray-100 text-gray-700 hover:bg-gray-200">Event</button>
                <button
                    class="px-4 py-2 rounded-lg font-medium bg-gray-100 text-gray-700 hover:bg-gray-200">Pengumuman</button>
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
            class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:scale-105 cursor-pointer">
            <img src="https://via.placeholder.com/400x240" alt="Judul Artikel" class="w-full h-48 object-cover" />
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Olahraga</span>
                    <div class="flex items-center space-x-1 text-gray-500 text-xs">
                        <!-- Clock icon -->
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 6v6l4 2" />
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                        <span>3 menit</span>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Judul Artikel Menarik
                    Tentang Olahraga</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Ini adalah ringkasan singkat dari artikel tersebut,
                    memberikan gambaran umum kepada pembaca...</p>
                <div class="flex items-center justify-between text-xs text-gray-500">
                    <div class="flex items-center space-x-1">
                        <!-- User icon -->
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                        </svg>
                        <span>Admin</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1">
                            <!-- Calendar icon -->
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zM5 20V9h14v11H5z" />
                            </svg>
                            <span>18/06/2025</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <!-- Eye icon -->
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                            </svg>
                            <span>120</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat .grid-card for more articles -->
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

@endsection
