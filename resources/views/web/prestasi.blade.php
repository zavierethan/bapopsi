@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<div class="bg-gradient-to-br from-orange-50 via-red-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-28">
        <!-- Page Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Prestasi Olahraga</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Pantau dan kelola prestasi atlet pelajar dengan data yang komprehensif dan terintegrasi</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-2xl shadow-lg border flex flex-col items-center text-white">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-4 shadow">
                    <i class="fas fa-trophy text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-white">123</div>
                <div class="text-base text-blue-100">Total Prestasi</div>
            </div>
            <div class="bg-gradient-to-br from-orange-500 to-red-500 p-6 rounded-2xl shadow-lg border flex flex-col items-center text-white">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-4 shadow">
                    <i class="fas fa-medal text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-white">45</div>
                <div class="text-base text-orange-100">Medali Emas</div>
            </div>
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl shadow-lg border flex flex-col items-center text-white">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-4 shadow">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-white">30</div>
                <div class="text-base text-blue-100">Medali Perak</div>
            </div>
            <div class="bg-gradient-to-br from-red-500 to-red-600 p-6 rounded-2xl shadow-lg border flex flex-col items-center text-white">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mb-4 shadow">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-white">20</div>
                <div class="text-base text-red-100">Medali Perunggu</div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-lg border mb-12">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Wilayah</label>
                    <select class="px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 w-full text-black bg-white">
                        <option>Semua Wilayah</option>
                        <option>Bantul</option>
                        <option>Sewon</option>
                        <option>Kasihan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Prestasi</label>
                    <select class="px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 w-full text-black bg-white">
                        <option>Semua Prestasi</option>
                        <option>Emas</option>
                        <option>Perak</option>
                        <option>Perunggu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-black mb-1">Cabang Olahraga</label>
                    <select class="px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 w-full text-black bg-white">
                        <option>Semua Cabang</option>
                        <option>Badminton</option>
                        <option>Basket</option>
                        <option>Voli</option>
                        <option>Sepak Bola</option>
                        <option>Atletik</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Grafik Section -->
        <div class="grid lg:grid-cols-12 gap-8 mb-12 mt-8">
            <!-- Custom Bar Chart (modern card) -->
            <div class="lg:col-span-7 col-span-12 bg-white rounded-3xl shadow-lg border p-8 flex flex-col">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 font-sans">Grafik Batang</h3>
                        <p class="text-sm text-gray-500 font-sans">Perbandingan medali per cabang</p>
                    </div>
                </div>
                <div id="barChartPrestasi" class="space-y-4 transition-all duration-500">
                    <!-- Bar chart content will be filled by JS -->
                </div>
            </div>
            <!-- Donut Chart (modern card) -->
            <div class="lg:col-span-5 col-span-12 bg-white rounded-3xl shadow-lg border p-8 flex flex-col items-center">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-chart-pie text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 font-sans">Grafik Lingkaran</h3>
                        <p class="text-sm text-gray-500 font-sans">Distribusi total medali</p>
                    </div>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full mb-8">
                    <canvas id="pieChartPrestasi" class="w-48 h-48 md:w-60 md-h-60 drop-shadow-lg"></canvas>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                        <span class="text-3xl font-bold text-gray-900 font-sans">151</span>
                        <span class="text-sm text-gray-500 font-sans">Total</span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 w-full">
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-xl p-4 flex flex-col items-center shadow-sm">
                        <span class="text-orange-500 text-2xl font-bold font-sans">45</span>
                        <span class="text-gray-700 font-semibold font-sans">Emas</span>
                        <span class="text-orange-500 text-xs font-bold font-sans">29.8%</span>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-4 flex flex-col items-center shadow-sm">
                        <span class="text-blue-600 text-2xl font-bold font-sans">46</span>
                        <span class="text-gray-700 font-semibold font-sans">Perak</span>
                        <span class="text-blue-600 text-xs font-bold font-sans">30.5%</span>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-4 flex flex-col items-center shadow-sm">
                        <span class="text-red-500 text-2xl font-bold font-sans">60</span>
                        <span class="text-gray-700 font-semibold font-sans">Perunggu</span>
                        <span class="text-red-500 text-xs font-bold font-sans">39.7%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Grafik Section -->

        <!-- Modern Table Section -->
        <div class="bg-white rounded-3xl shadow-lg border p-8 mt-8 mb-12">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Data Atlet</h3>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <label for="sportFilter" class="text-sm font-medium text-gray-700">Cabang Olahraga:</label>
                        <select id="sportFilter" class="w-full p-2 border rounded-xl text-black">
                            <option value="">Semua</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Basket">Basket</option>
                            <option value="Voli">Voli</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Renang">Renang</option>
                            <option value="Atletik">Atletik</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="schoolFilter" class="text-sm font-medium text-gray-700">Sekolah:</label>
                        <select id="schoolFilter" class="w-full p-2 border rounded-xl text-black">
                            <option value="">Semua</option>
                            <option value="SMA 1 Bantul">SMA 1 Bantul</option>
                            <option value="SMA 2 Sewon">SMA 2 Sewon</option>
                            <option value="SMA 3 Kasihan">SMA 3 Kasihan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-xl overflow-hidden" id="athleteTable">
                    <thead class="bg-gradient-to-r from-orange-500 to-blue-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nama Atlet</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Prestasi</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Sekolah</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Cabang Olahraga</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr class="hover:bg-gradient-to-r hover:from-orange-50 hover:to-blue-50 transition text-black" data-sport="Badminton" data-school="SMA 1 Bantul">
                            <td class="px-6 py-4 whitespace-nowrap text-black">1</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-black">Rizky Maulana</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Emas</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">SMA 1 Bantul</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Badminton</td>
                        </tr>
                        <tr class="bg-gray-50 hover:bg-gradient-to-r hover:from-orange-50 hover:to-blue-50 transition text-black" data-sport="Basket" data-school="SMA 2 Sewon">
                            <td class="px-6 py-4 whitespace-nowrap text-black">2</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-black">Dewi Lestari</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Perak</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">SMA 2 Sewon</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Basket</td>
                        </tr>
                        <tr class="hover:bg-gradient-to-r hover:from-orange-50 hover:to-blue-50 transition text-black" data-sport="Voli" data-school="SMA 3 Kasihan">
                            <td class="px-6 py-4 whitespace-nowrap text-black">3</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-black">Andi Saputra</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Perunggu</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">SMA 3 Kasihan</td>
                            <td class="px-6 py-4 whitespace-nowrap text-black">Voli</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection

