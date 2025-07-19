@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-5">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Rekapitulasi O2SN XIII 2025</h1>
        <p class="text-xl text-blue-100">Total pencapaian medali dalam berbagai kompetisi nasional & daerah</p>
    </div>
</section>

<!-- Tabs -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Tab Buttons -->
        <div class="flex border-b mb-8">
            <button class="tab-btn px-6 py-3 font-semibold border-b-2 text-blue-600 border-blue-600 font-bold"
                data-tab="summary">Summary</button>
            <button class="tab-btn px-6 py-3 font-semibold text-gray-600 hover:text-blue-600 font-bold"
                data-tab="jadwal">Jadwal Pertandingan</button>
        </div>

        <!-- Summary Tab -->
        <div id="tab-summary" class="tab-content">
            <!-- Medal Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 text-white p-6 rounded-xl text-center">
                    <i class="fas fa-medal text-4xl mb-4"></i>
                    <div class="text-3xl font-bold mb-1" id="emas">0</div>
                    <div class="text-yellow-100">Medali Emas</div>
                </div>
                <div class="bg-gradient-to-br from-gray-400 to-gray-600 text-white p-6 rounded-xl text-center">
                    <i class="fas fa-medal text-4xl mb-4"></i>
                    <div class="text-3xl font-bold mb-1" id="perak">0</div>
                    <div class="text-gray-100">Medali Perak</div>
                </div>
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 text-white p-6 rounded-xl text-center">
                    <i class="fas fa-medal text-4xl mb-4"></i>
                    <div class="text-3xl font-bold mb-1" id="perunggu">0</div>
                    <div class="text-orange-100">Medali Perunggu</div>
                </div>
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white p-6 rounded-xl text-center">
                    <i class="fas fa-trophy text-4xl mb-4"></i>
                    <div class="text-3xl font-bold mb-1" id="total-medal">0</div>
                    <div class="text-blue-100">Total Medali</div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Cabang Olahraga Dropdown -->
                    <div>
                        <label for="cabor" class="block text-sm font-medium text-gray-700 mb-1">Cabang Olahraga</label>
                        <select id="cabor" name="cabor"
                            class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Renang">Renang</option>
                            <option value="Atletik">Atletik</option>
                            <option value="Bola Basket">Bola Basket</option>
                            <option value="Bola Voli">Bola Voli</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Tenis Meja">Tenis Meja</option>
                        </select>
                    </div>

                    <!-- No Pertandingan Input -->
                    <div>
                        <label for="no" class="block text-sm font-medium text-gray-700 mb-1">No. Pertandingan</label>
                        <select id="cabor" name="cabor"
                            class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Renang">Renang</option>
                            <option value="Atletik">Atletik</option>
                            <option value="Bola Basket">Bola Basket</option>
                            <option value="Bola Voli">Bola Voli</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Tenis Meja">Tenis Meja</option>
                        </select>
                    </div>
                </div>

                <!-- Filter Button -->
                <div>
                    <button type="button" id="filter-btn"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 text-sm shadow">
                        Filter
                    </button>
                </div>
            </div>

            <!-- Tabel Medali -->
            <div class="bg-white shadow rounded-lg p-5 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali Per Kecamatan</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kecamatan
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"><i
                                        class="fas fa-medal text-yellow-500"></i> Emas</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"><i
                                        class="fas fa-medal text-gray-400"></i> Perak</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"><i
                                        class="fas fa-medal text-orange-500"></i> Perunggu</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody id="medalTableBody" class="bg-white divide-y divide-gray-200">
                            <!-- Rows via jQuery -->
                        </tbody>
                        <tfoot id="medalTableFooter" class="bg-gray-100"></tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Jadwal Tab (kosong sementara) -->
        <div id="tab-jadwal" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Cabang Olahraga Dropdown -->
                    <div>
                        <label for="cabor" class="block text-sm font-medium text-gray-700 mb-1">Cabang Olahraga</label>
                        <select id="cabor" name="cabor"
                            class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Renang">Renang</option>
                            <option value="Atletik">Atletik</option>
                            <option value="Bola Basket">Bola Basket</option>
                            <option value="Bola Voli">Bola Voli</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Tenis Meja">Tenis Meja</option>
                        </select>
                    </div>

                    <!-- No Pertandingan Input -->
                    <div>
                        <label for="no" class="block text-sm font-medium text-gray-700 mb-1">No. Pertandingan</label>
                        <select id="cabor" name="cabor"
                            class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Renang">Renang</option>
                            <option value="Atletik">Atletik</option>
                            <option value="Bola Basket">Bola Basket</option>
                            <option value="Bola Voli">Bola Voli</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Tenis Meja">Tenis Meja</option>
                        </select>
                    </div>
                </div>

                <!-- Filter Button -->
                <div>
                    <button type="button" id="filter-btn"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 text-sm shadow">
                        Filter
                    </button>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-5 shadow overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h3 class="text-lg font-semibold text-gray-900">Jadwal Pertandingan</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                                <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Tempat</th>
                                <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Cabor</th>
                                <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Nomor
                                    Pertandingan</th>
                                <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Kategori
                                </th>
                                <th class="px-6 py-3 font-medium text-xs text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleTableBody" class="bg-white divide-y divide-gray-200">
                            <!-- Rows via jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
$(document).ready(function() {
    // Tab switcher
    $('.tab-btn').on('click', function() {
        $('.tab-btn').removeClass('text-blue-600 border-blue-600 border-b-2').addClass('text-gray-600');
        $(this).addClass('text-blue-600 border-blue-600 border-b-2');

        const target = $(this).data('tab');
        $('.tab-content').addClass('hidden');
        $('#tab-' + target).removeClass('hidden');
    });

    // Load summary data
    loadMedalSummary();
    loadKecamatanMedalTable();
    loadMatchSchedules();
});

// Fetch summary counts
function loadMedalSummary() {
    $.ajax({
        url: '/api/getTotalMedalSummary',
        method: 'GET',
        success: function(data) {
            $('#emas').text(data.emas);
            $('#perak').text(data.perak);
            $('#perunggu').text(data.perunggu);
            $('#total-medal').text(data.emas + data.perak + data.perunggu);
        }
    });
}

// Fetch table data
function loadKecamatanMedalTable() {
    $.ajax({
        url: '/api/getKecamatanMedalSummary',
        method: 'GET',
        success: function(data) {
            let emas = 0,
                perak = 0,
                perunggu = 0,
                total = 0;
            let rows = '';

            $.each(data, function(i, item) {
                emas += item.emas;
                perak += item.perak;
                perunggu += item.perunggu;
                total += item.total;

                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">${item.nama}</td>
                        <td class="px-6 py-4 text-center text-xs text-yellow-600 font-semibold">${item.emas}</td>
                        <td class="px-6 py-4 text-center text-xs text-gray-600 font-semibold">${item.perak}</td>
                        <td class="px-6 py-4 text-center text-xs text-orange-600 font-semibold">${item.perunggu}</td>
                        <td class="px-6 py-4 text-center text-xs text-blue-600 font-bold">${item.total}</td>
                    </tr>
                `;
            });

            $('#medalTableBody').html(rows);
            $('#medalTableFooter').html(`
                <tr>
                    <td class="px-6 py-4 font-medium text-xs">TOTAL</td>
                    <td class="px-6 py-4 text-center font-bold text-yellow-600">${emas}</td>
                    <td class="px-6 py-4 text-center font-bold text-gray-600">${perak}</td>
                    <td class="px-6 py-4 text-center font-bold text-orange-600">${perunggu}</td>
                    <td class="px-6 py-4 text-center font-bold text-blue-600">${total}</td>
                </tr>
            `);
        },
        error: function() {
            $('#medalTableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
                );
        }
    });
}

function loadMatchSchedules() {
    $.ajax({
        url: '/api/jadwal-pertandingan',
        method: 'GET',
        success: function(response) {
            let rows = '';
            console.log(response.data)
            $.each(response.data, function(index, item) {
                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">${item.date}</td>
                        <td class="px-6 py-4 font-medium text-xs">${item.waktu}</td>
                        <td class="px-6 py-4 font-medium text-xs">${item.tempat}</td>
                        <td class="px-6 py-4 font-medium text-xs">${item.cabor}</td>
                        <td class="px-6 py-4 font-medium text-xs">${item.nomor_pertandingan}</td>
                        <td class="px-6 py-4 font-medium text-xs">${item.kategori}</td>
                        <td class="px-6 py-4 font-medium text-xs text-center">${item.status_pertandingan}</td>
                    </tr>
                `;
            });

            $('#scheduleTableBody').html(rows);
        },
        error: function() {
            $('#scheduleTableBody').html(
                '<tr><td colspan="5" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
                );
        }
    });
}
</script>
@endsection
