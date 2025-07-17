@extends('layouts.app')

@section('content')
<!-- Hero Section with Sporty Background -->
<section class="pt-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mt-5">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Rekapitulasi Prestasi 2024</h1>
            <p class="text-xl text-blue-100">Total pencapaian medali dalam berbagai kompetisi internasional dan nasional</p>
        </div>
    </div>
</section>
<section class="py-16 bg-gray-50 mt-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div
                class="medal-card bg-gradient-to-br from-yellow-400 to-yellow-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="45">0</div>
                <div class="text-yellow-100">Medali Emas</div>
            </div>
            <div class="medal-card bg-gradient-to-br from-gray-400 to-gray-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="38">0</div>
                <div class="text-gray-100">Medali Perak</div>
            </div>
            <div
                class="medal-card bg-gradient-to-br from-orange-400 to-orange-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-medal text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="52">0</div>
                <div class="text-orange-100">Medali Perunggu</div>
            </div>
            <div class="medal-card bg-gradient-to-br from-blue-400 to-blue-600 text-white p-6 rounded-xl text-center">
                <i class="fas fa-trophy text-4xl mb-4"></i>
                <div class="counter text-3xl font-bold mb-2" data-target="135">0</div>
                <div class="text-blue-100">Total Medali</div>
            </div>
        </div>

        <!-- Medal Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Perolehan Medali per Cabang Olahraga</h3>
            </div>
            <div class="table-responsive">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cabang Olahraga</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-yellow-500"></i> Emas
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-gray-400"></i> Perak
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-medal text-orange-500"></i> Perunggu
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-shuttlecock text-green-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Badminton</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">12
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">6
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">26</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-swimmer text-blue-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Renang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">10
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">12
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">30</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-running text-red-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Atletik</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">10
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">7
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">9
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">26</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-basketball-ball text-orange-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Bola Basket</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">4
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">7
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">16</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-volleyball-ball text-purple-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Bola Voli</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">4
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">8
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">17</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-futbol text-green-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Sepak Bola</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">3
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">10</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-table-tennis text-red-600 mr-3"></i>
                                    <span class="font-medium text-gray-900">Tenis Meja</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-yellow-600">3
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-gray-600">2
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold text-orange-600">5
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">10</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gray-100">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">TOTAL</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-yellow-600">45</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-600">38</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-orange-600">52</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-blue-600">135</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@endsection
