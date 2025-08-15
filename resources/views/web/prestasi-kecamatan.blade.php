@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-5">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Rekapitulasi {{$activeEvent->name}}</h1>
        <p class="text-xl text-blue-100">Total pencapaian medali dalam berbagai kompetisi nasional & daerah</p>
        <input type="hidden" value="{{$kecamatan->id}}" id="kecamatanId" />
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
                    <select name="cabor" id="caborId"
                        class="w-full md:w-60 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua</option>
                        @foreach($cabangOlahraga as $cabor)
                        <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                        @endforeach
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
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">L/P</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cabor</th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">No. Pertandingan
                            </th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">Asal Sekolah
                            </th>
                            <th class="px-6 py-3 font-medium text-xs text-gray-500 uppercase">Perolehan Medali (Juara)</th>
                        </tr>
                    </thead>
                    <tbody id="medalTableBody" class="bg-white divide-y divide-gray-200">
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
    let kecamatan = $('#kecamatanId').val(); // get from hidden input or select on page load
    let cabangOlahraga = $('#caborId').val();

    loadKecamatanMedalTable(kecamatan, cabangOlahraga);

    $('#caborId').on('change', function() {
        cabangOlahraga = $(this).val();
        kecamatan = $('#kecamatanId').val();
        loadKecamatanMedalTable(kecamatan, cabangOlahraga);
    });
});

function medalName(code) {
    switch (code) {
        case 1: return 'Emas (1)';
        case 2: return 'Perak (2)';
        case 3: return 'Perunggu (3)';
        default: return '-';
    }
}

function escapeHtml(text) {
    return $('<div>').text(text || '-').html();
}

function loadKecamatanMedalTable(kecamatanId = '', cabangOlahragaId = '') {
    $.ajax({
        url: '/api/getAtletByKecamatan',
        method: 'GET',
        data: {
            kecamatan_id: kecamatanId,
            cabang_olahraga_id: cabangOlahragaId
        },
        success: function(data) {
            if (!Array.isArray(data) || data.length === 0) {
                $('#medalTableBody').html(
                    '<tr><td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data.</td></tr>'
                );
                return;
            }

            let rows = '';
            $.each(data, function(_, item) {
                rows += `
                    <tr>
                        <td class="px-6 py-4 font-medium text-xs">
                            ${escapeHtml(item.nama_lengkap)}
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.jenis_kelamin)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.cabang_olahraga)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.no_pertandingan)}</td>
                        <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.asal_sekolah)}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-center">
                            ${medalName(item.perolehan_medali)}
                        </td>
                    </tr>
                `;
            });

            $('#medalTableBody').html(rows);
        },
        error: function() {
            $('#medalTableBody').html(
                '<tr><td colspan="6" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
            );
        }
    });
}
</script>
@endsection
