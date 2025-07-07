@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-orange-50 min-h-screen py-32">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
        <div class="flex items-center justify-between mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Agenda</h1>
        </div>
        <div class="space-y-6" id="agenda-wrapper">
            <!-- Agenda akan diisi oleh JS -->
        </div>
        <div id="agenda-empty" class="text-center py-12 hidden">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">Tidak ada agenda ditemukan</h3>
            <p class="text-gray-500">Belum ada agenda yang dijadwalkan.</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    loadArticles();
});

function loadArticles() {
    $.ajax({
        url: '/api/posts/agendas',
        method: 'GET',
        success: function(response) {
            const agendaList = response.data || response; // jika response pakai format data: [...]
            let html = '';

            if (agendaList.length === 0) {
                $('#agenda-empty').removeClass('hidden');
            } else {
                $('#agenda-empty').addClass('hidden');
                agendaList.forEach(function(item) {
                    const date = item.agenda_date;
                    const [day, month, year] = date.split('/');

                    html += `
                        <div class="bg-white rounded-2xl shadow-lg border p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4 hover:shadow-xl transition-all">
                            <div class="flex items-center gap-6">
                                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-orange-500 to-blue-500 text-white rounded-xl px-4 py-2 min-w-[80px]">
                                    <div class="text-2xl font-bold">${day}</div>
                                    <div class="text-xs uppercase tracking-wider">${month}/${year}</div>
                                </div>
                                <div>
                                    <div class="text-lg font-bold text-gray-900 mb-1">${item.title}</div>
                                    <div class="text-sm text-gray-500 mb-1"><i class="fas fa-map-marker-alt mr-1"></i>${item.location ?? '-'}</div>
                                    <div class="text-sm text-gray-700">${item.description ?? ''}</div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#agenda-wrapper').html(html);
            }
        },
        error: function(err) {
            console.error('Gagal mengambil data agenda:', err);
            $('#agenda-empty').removeClass('hidden').find('h3').text('Gagal mengambil data agenda');
        }
    });
}
</script>
@endsection
