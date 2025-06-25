@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<div class="bg-gradient-to-br from-blue-50 via-green-50 to-orange-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
        <!-- Page Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Berita Olahraga</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Informasi terbaru seputar kegiatan dan prestasi olahraga pelajar</p>
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
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Judul Artikel" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-medium">Olahraga</span>
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
            </a>

            <!-- Article 2 -->
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Persiapan Kejuaraan" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-3 py-1 rounded-full text-xs font-medium">Prestasi</span>
                            <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <span>4 menit</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Persiapan Tim untuk Kejuaraan Provinsi 2025</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Tim atlet Kabupaten Bandung memulai persiapan intensif untuk menghadapi kejuaraan provinsi yang akan diselenggarakan...</p>
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
                                    <span>15/06/2025</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                                    </svg>
                                    <span>856</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Article 3 -->
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Jadwal Kompetisi" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium">Event</span>
                            <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <span>2 menit</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Jadwal Kompetisi Olahraga Pelajar 2025</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Berikut adalah jadwal lengkap kompetisi olahraga pelajar yang akan diselenggarakan sepanjang tahun 2025...</p>
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
                                    <span>12/06/2025</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                                    </svg>
                                    <span>1,203</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Article 4 -->
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Program Pelatihan" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-medium">Pelatihan</span>
                            <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <span>6 menit</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Program Pelatihan Atlet Muda Berprestasi</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">BAPOPSI meluncurkan program pelatihan khusus untuk atlet muda yang berpotensi tinggi...</p>
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
                                    <span>10/06/2025</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                                    </svg>
                                    <span>967</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Article 5 -->
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Fasilitas Olahraga" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-3 py-1 rounded-full text-xs font-medium">Fasilitas</span>
                            <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <span>5 menit</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Pembangunan Fasilitas Olahraga Modern</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Pemerintah Kabupaten Bandung meresmikan pembangunan fasilitas olahraga modern untuk mendukung...</p>
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
                                    <span>08/06/2025</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                                    </svg>
                                    <span>1,456</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Article 6 -->
            <a href="/berita-detail" class="block">
                <div class="bg-white rounded-xl shadow-lg border overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <img src="https://via.placeholder.com/400x240" alt="Sukses Atlet" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-medium">Sukses</span>
                            <div class="flex items-center space-x-1 text-gray-500 text-xs">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6v6l4 2" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                                <span>7 menit</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Kisah Sukses Atlet Pelajar di Tingkat Nasional</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">Mengulas perjalanan inspiratif atlet pelajar yang berhasil meraih prestasi di tingkat nasional...</p>
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
                                    <span>05/06/2025</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 8.11 1 12c1.73 3.89 6 7.5 11 7.5s9.27-3.61 11-7.5c-1.73-3.89-6-7.5-11-7.5zm0 12a4.5 4.5 0 110-9 4.5 4.5 0 010 9zm0-7.5a3 3 0 100 6 3 3 0 000-6z" />
                                    </svg>
                                    <span>2,134</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
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
