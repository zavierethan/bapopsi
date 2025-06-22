@extends('layouts.app')

@section('content')
<!-- ✅ Hero Banner -->
<section class="relative bg-gradient-to-br from-orange-500 via-red-500 to-blue-700 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
        <div class="absolute bottom-10 right-20 w-24 h-24 bg-white opacity-5 rounded-full"></div>
        <div class="absolute top-1/2 right-10 w-16 h-16 bg-white opacity-5 rounded-full"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-10">
                <div class="space-y-6">
                    <h1 class="text-6xl lg:text-7xl font-extrabold leading-tight text-white drop-shadow-lg">
                        BAPOPSI
                    </h1>
                    <h2 class="text-3xl lg:text-4xl font-semibold text-blue-100 mb-2 drop-shadow">
                        Badan Penyelenggara Olahraga Pelajar
                    </h2>
                    <p class="text-2xl text-blue-100 leading-relaxed max-w-2xl drop-shadow">
                        Platform digital terpadu untuk mengelola kompetisi olahraga pelajar, memantau prestasi atlet, dan membangun ekosistem olahraga yang lebih baik.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/login"
                        class="group px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center space-x-2 text-lg">
                        <span>Masuk ke Sistem</span>
                        <div
                            class="w-5 h-5 bg-white bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition-colors">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </a>
                    <a href="/register"
                        class="px-8 py-4 border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:text-blue-700 transition-all duration-300 transform hover:scale-105 flex items-center justify-center text-lg">
                        Daftar Pengelola
                    </a>
                </div>
                <div class="pt-4">
                    <a href="https://www.instagram.com/bapopsi_kab.bandung/" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-40 rounded-full text-white font-medium transition text-lg">
                        <i class="fab fa-instagram text-pink-500 text-2xl"></i>
                        <span class="text-base">@bapopsi_kab.bandung</span>
                    </a>
                </div>
            </div>
            <div class="lg:justify-self-end flex justify-center lg:justify-end mt-12 lg:mt-0">
                <div class="relative">
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm p-12 rounded-3xl border border-white border-opacity-20 shadow-2xl flex flex-col gap-8 min-w-[340px] max-w-xs">
                        <div class="grid grid-cols-2 gap-8 text-center">
                            <div class="space-y-2">
                                <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl flex items-center justify-center mx-auto text-3xl">🏅</div>
                                <div class="text-4xl font-extrabold text-white">240</div>
                                <div class="text-lg text-blue-100">Total Medali</div>
                            </div>
                            <div class="space-y-2">
                                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto text-3xl">👥</div>
                                <div class="text-4xl font-extrabold text-white">1,850</div>
                                <div class="text-lg text-blue-100">Atlet Terdaftar</div>
                            </div>
                            <div class="space-y-2">
                                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto text-3xl">🎯</div>
                                <div class="text-4xl font-extrabold text-white">24</div>
                                <div class="text-lg text-blue-100">Cabang Olahraga</div>
                            </div>
                            <div class="space-y-2">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mx-auto text-3xl">🏫</div>
                                <div class="text-4xl font-extrabold text-white">130</div>
                                <div class="text-lg text-blue-100">Sekolah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Prestasi Section -->
<section class="py-20 bg-gradient-to-br from-orange-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Statistik Prestasi</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pantau perkembangan prestasi olahraga pelajar dengan visualisasi data yang komprehensif
            </p>
        </div>

        <!-- Filters -->
        <div class="bg-white p-8 rounded-2xl shadow-lg border mb-12">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-black mb-3">Wilayah</label>
                    <select class="w-full p-3 border rounded-xl text-black">
                        <option>Pilih Wilayah</option>
                        <option>Bandung</option>
                        <option>Sumedang</option>
                        <option>Cimahi</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-black mb-3">Jenis Medali</label>
                    <select class="w-full p-3 border rounded-xl text-black">
                        <option>Pilih Medali</option>
                        <option>Emas</option>
                        <option>Perak</option>
                        <option>Perunggu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-black mb-3">Cabang Olahraga</label>
                    <select class="w-full p-3 border rounded-xl text-black">
                        <option>Pilih Cabang</option>
                        <option>Sepak Bola</option>
                        <option>Badminton</option>
                        <option>Renang</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Grafik Section -->
        <div class="grid lg:grid-cols-12 gap-8 mb-12 mt-8">
            <!-- Custom Bar Chart (bigger) -->
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
                <div id="barChartCustomHome" class="flex-grow">
                    <!-- Bar chart content will diisi oleh JS -->
                </div>
            </div>
            <!-- Donut Chart (smaller) -->
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
                <div class="relative flex flex-col items-center justify-center w-full">
                    <canvas id="pieChart" class="w-48 h-48 md:w-60 md:h-60"></canvas>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                        <span class="text-4xl font-extrabold text-gray-900 font-sans">151</span>
                        <span class="text-base text-gray-500 font-sans">Total</span>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-8 w-full">
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-xl p-4 flex flex-col items-center shadow">
                        <span class="text-orange-500 text-2xl font-bold font-sans">45</span>
                        <span class="text-gray-700 font-semibold font-sans">Emas</span>
                        <span class="text-orange-500 text-base font-bold font-sans">29.8%</span>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-4 flex flex-col items-center shadow">
                        <span class="text-blue-600 text-2xl font-bold font-sans">46</span>
                        <span class="text-gray-700 font-semibold font-sans">Perak</span>
                        <span class="text-blue-600 text-base font-bold font-sans">30.5%</span>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-4 flex flex-col items-center shadow">
                        <span class="text-red-500 text-2xl font-bold font-sans">60</span>
                        <span class="text-gray-700 font-semibold font-sans">Perunggu</span>
                        <span class="text-red-500 text-base font-bold font-sans">39.7%</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Grafik Section -->
        <!-- Modern Table Section -->
        <div class="bg-white rounded-3xl shadow-lg border p-8 mt-8">
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
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-500 via-red-500 to-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold mb-10 text-white">Berita</h2>
        <div class="flex space-x-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-blue-300 scrollbar-track-blue-100">
            <!-- News Card 1 -->
            <div class="min-w-[320px] max-w-xs bg-white rounded-2xl shadow-lg border hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer flex-shrink-0">
                <img src='https://via.placeholder.com/400x240' alt='Berita 1' class='w-full h-40 object-cover rounded-t-2xl'>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Olahraga</span>
                        <span class="text-xs text-gray-400">18/06/2025</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Judul Artikel Menarik Tentang Olahraga</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">Ini adalah ringkasan singkat dari artikel tersebut, memberikan gambaran umum kepada pembaca...</p>
                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                        <span>Admin</span>
                        <span>•</span>
                        <span>120x dibaca</span>
                    </div>
                </div>
            </div>
            <!-- News Card 2 -->
            <div class="min-w-[320px] max-w-xs bg-white rounded-2xl shadow-lg border hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer flex-shrink-0">
                <img src='https://via.placeholder.com/400x240' alt='Berita 2' class='w-full h-40 object-cover rounded-t-2xl'>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Event</span>
                        <span class="text-xs text-gray-400">15/06/2025</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Event Olahraga Pelajar Terbesar</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">Event olahraga pelajar tingkat kabupaten yang diikuti ratusan atlet...</p>
                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                        <span>Admin</span>
                        <span>•</span>
                        <span>98x dibaca</span>
                    </div>
                </div>
            </div>
            <!-- News Card 3 -->
            <div class="min-w-[320px] max-w-xs bg-white rounded-2xl shadow-lg border hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer flex-shrink-0">
                <img src='https://via.placeholder.com/400x240' alt='Berita 3' class='w-full h-40 object-cover rounded-t-2xl'>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">Pengumuman</span>
                        <span class="text-xs text-gray-400">10/06/2025</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">Pengumuman Penting untuk Atlet</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">Pengumuman penting terkait jadwal pertandingan dan administrasi...</p>
                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                        <span>Admin</span>
                        <span>•</span>
                        <span>75x dibaca</span>
                    </div>
                </div>
            </div>
            <!-- News Card 4 -->
            <div class="min-w-[320px] max-w-xs bg-white rounded-2xl shadow-lg border hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer flex-shrink-0">
                <img src='https://via.placeholder.com/400x240' alt='Berita 4' class='w-full h-40 object-cover rounded-t-2xl'>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded-full text-xs font-medium">Berita</span>
                        <span class="text-xs text-gray-400">05/06/2025</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">BAPOPSI Raih Penghargaan Nasional</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">BAPOPSI Kabupaten Bandung meraih penghargaan nasional atas inovasi digital...</p>
                    <div class="flex items-center space-x-2 text-xs text-gray-500">
                        <span>Admin</span>
                        <span>•</span>
                        <span>60x dibaca</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Data for bar chart
const barDataHome = [
    { cabang: 'Badminton', emas: 12, perak: 8, perunggu: 15 },
    { cabang: 'Basket', emas: 6, perak: 9, perunggu: 12 },
    { cabang: 'Voli', emas: 8, perak: 11, perunggu: 7 },
    { cabang: 'Sepak Bola', emas: 4, perak: 6, perunggu: 8 },
    { cabang: 'Atletik', emas: 15, perak: 12, perunggu: 18 },
];
const maxBarHome = Math.max(...barDataHome.flatMap(d => [d.emas, d.perak, d.perunggu]));
function renderBarChartHome() {
    const container = document.getElementById('barChartCustomHome');
    if (!container) return;
    container.innerHTML = '';
    barDataHome.forEach(d => {
        container.innerHTML += `
            <div class="mb-2">
                <div class="font-bold text-lg text-gray-900 mb-1">${d.cabang}</div>
                <div class="flex items-center mb-1">
                    <span class="w-16 text-sm text-gray-700 font-semibold">Emas</span>
                    <div class="flex-1 mx-2 bg-gray-100 rounded-full h-4 relative">
                        <div class="bg-yellow-400 h-4 rounded-full transition-all duration-500" style="width:${Math.round((d.emas/maxBarHome)*100)}%"></div>
                    </div>
                    <span class="w-8 text-right text-lg font-bold text-gray-900">${d.emas}</span>
                </div>
                <div class="flex items-center mb-1">
                    <span class="w-16 text-sm text-gray-700 font-semibold">Perak</span>
                    <div class="flex-1 mx-2 bg-gray-100 rounded-full h-4 relative">
                        <div class="bg-gray-400 h-4 rounded-full transition-all duration-500" style="width:${Math.round((d.perak/maxBarHome)*100)}%"></div>
                    </div>
                    <span class="w-8 text-right text-lg font-bold text-gray-900">${d.perak}</span>
                </div>
                <div class="flex items-center">
                    <span class="w-16 text-sm text-gray-700 font-semibold">Perunggu</span>
                    <div class="flex-1 mx-2 bg-gray-100 rounded-full h-4 relative">
                        <div class="bg-orange-400 h-4 rounded-full transition-all duration-500" style="width:${Math.round((d.perunggu/maxBarHome)*100)}%"></div>
                    </div>
                    <span class="w-8 text-right text-lg font-bold text-gray-900">${d.perunggu}</span>
                </div>
            </div>
        `;
    });
}
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', renderBarChartHome);
} else {
    renderBarChartHome();
}
// Donut chart
new Chart(document.getElementById("pieChart"), {
    type: "doughnut",
    data: {
        labels: ["Emas", "Perak", "Perunggu"],
        datasets: [{
            label: "Distribusi Medali",
            backgroundColor: ["#FFD600", "#B0B0B0", "#FF9800"],
            borderColor: '#fff',
            borderWidth: 2,
            data: [45, 46, 60],
            cutout: '75%', // lebih tebal
        }]
    },
    options: {
        cutout: '70%',
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: { enabled: true }
        }
    }
});
</script>
@endsection
