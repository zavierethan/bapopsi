@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-28">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <!-- Trophy icon -->
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">123</div>
                    <div class="text-sm text-gray-600">Total Prestasi</div>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                        <!-- Medal icon -->
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">45</div>
                    <div class="text-sm text-gray-600">Medali Emas</div>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <!-- Medal icon -->
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">30</div>
                    <div class="text-sm text-gray-600">Medali Perak</div>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                        <!-- Medal icon -->
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900">20</div>
                    <div class="text-sm text-gray-600">Medali Perunggu</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border mb-8">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"
                    fill="currentColor" viewBox="0 0 24 24">
                    <!-- Search icon -->
                </svg>
                <input type="text" placeholder="Cari prestasi, atlet, atau sekolah..."
                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <select
                    class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua Wilayah</option>
                    <option>Bantul</option>
                    <option>Sewon</option>
                    <option>Kasihan</option>
                </select>
                <select
                    class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua Cabang</option>
                    <option>Badminton</option>
                    <option>Basket</option>
                    <option>Voli</option>
                    <option>Sepak Bola</option>
                    <option>Atletik</option>
                </select>
                <select
                    class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua Medali</option>
                    <option>Emas</option>
                    <option>Perak</option>
                    <option>Perunggu</option>
                </select>
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Achievement Card -->
        <div
            class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:scale-105">
            <div class="relative">
                <img src="achievement-image.jpg" alt="Achievement Title" class="w-full h-48 object-cover" />
                <div
                    class="absolute top-4 right-4 w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <!-- Medal icon -->
                    </svg>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Juara 1 Kejuaraan Daerah</h3>
                <div class="space-y-2 mb-4">
                    <div class="flex items-center space-x-2 text-gray-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <!-- Users icon -->
                        </svg>
                        <span class="text-sm font-medium">Ahmad Fauzan</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <!-- Map icon -->
                        </svg>
                        <span class="text-sm">SMA Negeri 1 Bantul</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <!-- Calendar icon -->
                        </svg>
                        <span class="text-sm">18 Juni 2025</span>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">Atletik</span>
                        <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Bantul</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Kejuaraan Daerah DIY 2025</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
