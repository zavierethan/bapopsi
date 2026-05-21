@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-5">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Detail Prestasi Atlet</h1>
        <p class="text-xl text-blue-100">Rincian perolehan medali untuk setiap atlet</p>
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
        <div class="bg-white shadow rounded-lg p-5 shadow overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Atlet</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Atlet</th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">L/P</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Asal Sekolah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cabor</th>
                            <th class="px-6 py-3 text-left font-medium text-xs text-gray-500 uppercase">No. Pertandingan</th>
                            <th class="px-6 py-3 font-medium text-xs text-gray-500 uppercase">Perolehan Medali</th>
                        </tr>
                    </thead>
                    <tbody id="atletTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Rows via jQuery -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-4">
                <div class="flex flex-1 justify-between sm:hidden">
                    <button id="prevBtn-mobile" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Sebelumnya</button>
                    <button id="nextBtn-mobile" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Selanjutnya</button>
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span id="startRecord" class="font-medium">0</span> ke <span id="endRecord" class="font-medium">0</span> dari <span id="totalRecords" class="font-medium">0</span> hasil
                        </p>
                    </div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <button id="prevBtn" class="relative inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                            <span class="sr-only">Sebelumnya</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="pageNumbers" class="flex -space-x-px">
                            <!-- Page numbers will be generated here -->
                        </div>
                        <button id="nextBtn" class="relative inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                            <span class="sr-only">Selanjutnya</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
const ITEMS_PER_PAGE = 10;
let allData = [];
let currentPage = 1;

$(document).ready(function() {
    loadAtletData();

    // Pagination events
    $('#prevBtn').on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderPage();
        }
    });

    $('#nextBtn').on('click', function() {
        const totalPages = Math.ceil(allData.length / ITEMS_PER_PAGE);
        if (currentPage < totalPages) {
            currentPage++;
            renderPage();
        }
    });

    $('#prevBtn-mobile').on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderPage();
        }
    });

    $('#nextBtn-mobile').on('click', function() {
        const totalPages = Math.ceil(allData.length / ITEMS_PER_PAGE);
        if (currentPage < totalPages) {
            currentPage++;
            renderPage();
        }
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

function renderPage() {
    const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
    const endIndex = startIndex + ITEMS_PER_PAGE;
    const pageData = allData.slice(startIndex, endIndex);

    let rows = '';
    $.each(pageData, function(index, item) {
        const rowNumber = startIndex + index + 1;
        rows += `
            <tr>
                <td class="px-6 py-4 font-medium text-xs text-gray-900">
                    ${rowNumber}
                </td>
                <td class="px-6 py-4 font-medium text-xs">
                    ${escapeHtml(item.nama_lengkap)}
                </td>
                <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.jenis_kelamin)}</td>
                <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.asal_sekolah)}</td>
                <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.cabang_olahraga)}</td>
                <td class="px-6 py-4 text-xs font-semibold">${escapeHtml(item.no_pertandingan)}</td>
                <td class="px-6 py-4 text-xs font-semibold text-center">
                    ${medalName(item.perolehan_medali)}
                </td>
            </tr>
        `;
    });

    $('#atletTableBody').html(rows);

    // Update pagination info
    const totalPages = Math.ceil(allData.length / ITEMS_PER_PAGE);
    $('#startRecord').text(allData.length > 0 ? startIndex + 1 : 0);
    $('#endRecord').text(Math.min(endIndex, allData.length));
    $('#totalRecords').text(allData.length);

    // Update prev/next button states
    $('#prevBtn').toggleClass('opacity-50 cursor-not-allowed', currentPage === 1).prop('disabled', currentPage === 1);
    $('#nextBtn').toggleClass('opacity-50 cursor-not-allowed', currentPage === totalPages).prop('disabled', currentPage === totalPages);
    $('#prevBtn-mobile').toggleClass('opacity-50 cursor-not-allowed', currentPage === 1).prop('disabled', currentPage === 1);
    $('#nextBtn-mobile').toggleClass('opacity-50 cursor-not-allowed', currentPage === totalPages).prop('disabled', currentPage === totalPages);

    // Render page numbers
    renderPageNumbers(totalPages);
}

function renderPageNumbers(totalPages) {
    const pageNumbersContainer = $('#pageNumbers');
    pageNumbersContainer.empty();

    const maxPagesToShow = 5;
    let startPage = Math.max(1, currentPage - Math.floor(maxPagesToShow / 2));
    let endPage = Math.min(totalPages, startPage + maxPagesToShow - 1);

    if (endPage - startPage + 1 < maxPagesToShow) {
        startPage = Math.max(1, endPage - maxPagesToShow + 1);
    }

    for (let i = startPage; i <= endPage; i++) {
        const isActive = i === currentPage;
        const pageBtn = $(`
            <button class="relative inline-flex items-center border border-gray-300 px-4 py-2 text-sm font-medium ${isActive ? 'z-10 border-blue-500 bg-blue-50 text-blue-600' : 'bg-white text-gray-500 hover:bg-gray-50'}" data-page="${i}">
                ${i}
            </button>
        `);

        pageBtn.on('click', function() {
            currentPage = i;
            renderPage();
        });

        pageNumbersContainer.append(pageBtn);
    }
}

function loadAtletData() {
    $.ajax({
        url: '/api/getAllAtlet',
        method: 'GET',
        success: function(data) {
            if (!Array.isArray(data) || data.length === 0) {
                allData = [];
                $('#atletTableBody').html(
                    '<tr><td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data.</td></tr>'
                );
                $('#pageNumbers').empty();
                $('#startRecord').text('0');
                $('#endRecord').text('0');
                $('#totalRecords').text('0');
                return;
            }

            allData = data;
            currentPage = 1;
            renderPage();
        },
        error: function() {
            allData = [];
            $('#atletTableBody').html(
                '<tr><td colspan="6" class="text-center text-red-500 py-4">Gagal memuat data.</td></tr>'
            );
        }
    });
}
</script>
@endsection
