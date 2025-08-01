@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-5">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Rekapitulasi {{$activeEvent->name}}</h1>
        <p class="text-xl text-blue-100">Total pencapaian medali dalam berbagai kompetisi nasional & daerah</p>
    </div>
</section>

<!-- Tabs -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="/" class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Rekap Prestasi
            </a>
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
                <div>
                    <label for="no" class="block text-sm font-medium text-gray-700 mb-1">Sub Rayon</label>
                    <select id="cabor" name="cabor"
                        class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
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
                <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Atlet</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cabor</th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">No. Pertandingan
                            </th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">L/P</th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Asal Sekolah
                            </th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Sub Rayon
                            </th>
                            <th class="px-6 py-3 font-medium text-xs text-gray-500 uppercase">Perolehan Medali</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Rows via jQuery -->
                    </tbody>
                </table>
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
    // loadMedalSummary();
    // loadKecamatanMedalTable();
    // loadMatchSchedules();
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
    let caborId = '';
    let noPertandinganId = '';
    let eventId = $("#eventId").val() | "";
    $.ajax({
        url: '/api/getKecamatanMedalSummary',
        method: 'GET',
        data: {
            cabor_id: caborId,
            no_pertandingan_id: noPertandinganId,
            event_id: eventId
        },
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
                        <td class="px-6 py-4 font-medium text-xs">
                            <a href="/prestasi/${item.id}" class="text-blue-700 hover:underline">
                                ${item.nama}
                            </a>
                        </td>
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
                    <td class="px-6 py-4 text-center text-xs font-bold text-yellow-600">${emas}</td>
                    <td class="px-6 py-4 text-center text-xs font-bold text-gray-600">${perak}</td>
                    <td class="px-6 py-4 text-center text-xs font-bold text-orange-600">${perunggu}</td>
                    <td class="px-6 py-4 text-center text-xs font-bold text-blue-600">${total}</td>
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
