@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-orange-50 min-h-screen py-32">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Info Kontak</h1>
        <div class="bg-white rounded-2xl shadow-lg border p-8 space-y-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Alamat</h2>
                <p class="text-gray-700">JL Raya Soreang Cipatik, Kopo, Kutawaringin, Komplek Sarana Olahraga Jalak Harupat, Bandung, 40911, Indonesia</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Telepon</h2>
                <p class="text-gray-700">022 5893 833</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Email</h2>
                <p class="text-gray-700">bapopsi@bandungkab.go.id</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Media Sosial</h2>
                <div class="flex space-x-6 mt-2">
                    <a href="https://www.instagram.com/bapopsi.kab.bandung/" target="_blank" class="flex items-center text-pink-600 hover:underline"><i class="fab fa-instagram mr-2"></i>Instagram</a>
                    <a href="https://www.youtube.com/@bapopsikabupatenbandung6105" target="_blank" class="flex items-center text-red-600 hover:underline"><i class="fab fa-youtube mr-2"></i>YouTube</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 