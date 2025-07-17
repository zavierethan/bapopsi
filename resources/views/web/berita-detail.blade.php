@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="pt-20 pb-4 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="../index.html" class="text-blue-600 hover:text-blue-800">Beranda</a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                </li>
                <li class="flex items-center">
                    <a href="berita.html" class="text-blue-600 hover:text-blue-800">Berita</a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                </li>
                <li class="text-gray-500">Detail Berita</li>
            </ol>
        </nav>
    </div>
</section>

<!-- News Detail Section -->
<section class="py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article id="news-detail">
            <!-- Content will be loaded dynamically -->
            <div class="text-center py-8">
                <div class="loading"></div>
                <p class="mt-4 text-gray-600">Memuat berita...</p>
            </div>
        </article>

        <!-- Share Section -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Berita</h3>
            <div class="flex space-x-4">
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f mr-2"></i>Facebook
                </a>
                <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">
                    <i class="fab fa-twitter mr-2"></i>Twitter
                </a>
                <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </a>
                <button onclick="copyToClipboard()"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-link mr-2"></i>Salin Link
                </button>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="berita.html" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>

<!-- Related News Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Related News Item 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">10 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Prestasi Membanggakan Tim Badminton Indonesia
                    </h3>
                    <a href="detail-berita.html?id=2" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Related News Item 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">8 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Kerjasama BAPOPSI dengan Kementerian Pendidikan
                    </h3>
                    <a href="detail-berita.html?id=3" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Related News Item 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=400"
                    alt="Berita Terkait 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-medium mb-2">5 Januari 2024</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Workshop Pelatih Olahraga Pelajar Se-Indonesia
                    </h3>
                    <a href="detail-berita.html?id=4" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
// News data
const newsData = {
    1: {
        title: "BAPOPSI Luncurkan Program Pembinaan Atlet Muda Berbakat",
        date: "12 Januari 2024",
        author: "Tim Redaksi BAPOPSI",
        image: "https://images.pexels.com/photos/416978/pexels-photo-416978.jpeg?auto=compress&cs=tinysrgb&w=800",
        content: `
                    <p>Jakarta - Badan Pembina Olahraga Pelajar Seluruh Indonesia (BAPOPSI) resmi meluncurkan program pembinaan atlet muda berbakat yang bertujuan untuk mengidentifikasi dan mengembangkan potensi atlet pelajar di seluruh Indonesia.</p>

                    <h2>Program Komprehensif untuk Masa Depan Olahraga Indonesia</h2>

                    <p>Program ini merupakan bagian dari strategi jangka panjang BAPOPSI untuk mempersiapkan generasi atlet masa depan yang mampu bersaing di tingkat internasional. Dengan melibatkan pelatih bersertifikat internasional dan menggunakan metode pelatihan modern, program ini diharapkan dapat menghasilkan atlet-atlet berkualitas tinggi.</p>

                    <blockquote>
                        "Kami berkomitmen untuk memberikan yang terbaik bagi pengembangan olahraga pelajar Indonesia. Program ini adalah investasi jangka panjang untuk masa depan olahraga nasional," ujar Ketua BAPOPSI, Dr. Ahmad Sutrisno.
                    </blockquote>

                    <h3>Tahapan Program</h3>

                    <p>Program pembinaan ini akan dilaksanakan dalam beberapa tahapan:</p>

                    <ol>
                        <li><strong>Seleksi Awal:</strong> Identifikasi bakat melalui tes fisik dan teknik dasar</li>
                        <li><strong>Pembinaan Intensif:</strong> Pelatihan rutin dengan pelatih bersertifikat</li>
                        <li><strong>Kompetisi Bertingkat:</strong> Partisipasi dalam berbagai turnamen</li>
                        <li><strong>Evaluasi Berkala:</strong> Penilaian perkembangan setiap 3 bulan</li>
                    </ol>

                    <h3>Cabang Olahraga Prioritas</h3>

                    <p>Program ini akan fokus pada cabang olahraga yang memiliki potensi besar untuk meraih prestasi internasional, antara lain:</p>

                    <ul>
                        <li>Badminton</li>
                        <li>Renang</li>
                        <li>Atletik</li>
                        <li>Sepak Bola</li>
                        <li>Bola Basket</li>
                        <li>Bola Voli</li>
                    </ul>

                    <p>Dengan dukungan fasilitas modern dan tenaga pelatih yang kompeten, BAPOPSI optimis program ini akan memberikan kontribusi signifikan bagi perkembangan olahraga pelajar Indonesia di masa mendatang.</p>

                    <p>Program pembinaan atlet muda berbakat ini akan dimulai pada bulan Februari 2024 dan akan berlangsung selama 2 tahun dengan evaluasi berkala setiap semester.</p>
                `
    },
    2: {
        title: "Prestasi Membanggakan Tim Badminton Indonesia di Kejuaraan Asia",
        date: "10 Januari 2024",
        author: "Correspondent BAPOPSI",
        image: "https://images.pexels.com/photos/1103829/pexels-photo-1103829.jpeg?auto=compress&cs=tinysrgb&w=800",
        content: `
                    <p>Bangkok, Thailand - Tim badminton pelajar Indonesia berhasil menorehkan prestasi membanggakan dalam Kejuaraan Badminton Pelajar Asia 2024 yang berlangsung di Bangkok, Thailand. Tim Indonesia berhasil meraih 3 medali emas, 2 medali perak, dan 1 medali perunggu.</p>

                    <h2>Dominasi Indonesia di Berbagai Kategori</h2>

                    <p>Prestasi gemilang ini dicapai melalui kerja keras dan dedikasi tinggi para atlet muda Indonesia yang telah menjalani pembinaan intensif di bawah naungan BAPOPSI. Medali emas diraih dari kategori tunggal putra, ganda putri, dan beregu campuran.</p>

                    <h3>Perolehan Medali Detail</h3>

                    <p>Berikut adalah rincian perolehan medali tim Indonesia:</p>

                    <ul>
                        <li><strong>Emas Tunggal Putra:</strong> Rizki Pratama (SMA Negeri 1 Jakarta)</li>
                        <li><strong>Emas Ganda Putri:</strong> Sari Dewi/Maya Sari (SMA Negeri 3 Surabaya)</li>
                        <li><strong>Emas Beregu Campuran:</strong> Tim Indonesia</li>
                        <li><strong>Perak Tunggal Putri:</strong> Indira Putri (SMA Negeri 5 Bandung)</li>
                        <li><strong>Perak Ganda Putra:</strong> Andi Wijaya/Budi Santoso (SMA Negeri 2 Medan)</li>
                        <li><strong>Perunggu Ganda Campuran:</strong> Doni Setiawan/Lisa Maharani (SMA Negeri 1 Yogyakarta)</li>
                    </ul>

                    <blockquote>
                        "Prestasi ini adalah hasil dari kerja keras dan dedikasi para atlet serta dukungan penuh dari BAPOPSI. Kami bangga dengan pencapaian anak-anak Indonesia," kata Pelatih Kepala Tim Badminton Indonesia, Bambang Suprianto.
                    </blockquote>

                    <h3>Persiapan Matang Menuju Sukses</h3>

                    <p>Kesuksesan tim Indonesia tidak lepas dari persiapan matang yang telah dilakukan selama 6 bulan terakhir. Tim telah menjalani pemusatan latihan intensif di Pelatnas Cipayung dengan didampingi pelatih berpengalaman.</p>

                    <p>Program persiapan meliputi:</p>

                    <ol>
                        <li>Latihan teknik dan taktik harian</li>
                        <li>Kondisi fisik dan mental</li>
                        <li>Uji coba dengan tim senior</li>
                        <li>Simulasi pertandingan internasional</li>
                    </ol>

                    <p>Prestasi ini diharapkan dapat menjadi motivasi bagi atlet-atlet muda Indonesia lainnya untuk terus berlatih dan berprestasi di tingkat internasional. BAPOPSI akan terus memberikan dukungan penuh untuk pengembangan badminton pelajar Indonesia.</p>
                `
    },
    3: {
        title: "Kerjasama BAPOPSI dengan Kementerian Pendidikan untuk Olahraga Sekolah",
        date: "8 Januari 2024",
        author: "Humas BAPOPSI",
        image: "https://images.pexels.com/photos/863988/pexels-photo-863988.jpeg?auto=compress&cs=tinysrgb&w=800",
        content: `
                    <p>Jakarta - BAPOPSI resmi menandatangani Memorandum of Understanding (MoU) dengan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbudristek) untuk meningkatkan kualitas pendidikan olahraga di sekolah-sekolah seluruh Indonesia.</p>

                    <h2>Kolaborasi Strategis untuk Pendidikan Olahraga</h2>

                    <p>Penandatanganan MoU ini merupakan langkah strategis untuk mengintegrasikan program pembinaan olahraga pelajar dengan kurikulum pendidikan nasional. Kerjasama ini akan mencakup berbagai aspek mulai dari pelatihan guru olahraga hingga penyediaan fasilitas olahraga di sekolah.</p>

                    <blockquote>
                        "Kerjasama ini akan memperkuat fondasi olahraga pelajar Indonesia dan memastikan setiap anak mendapat akses pendidikan olahraga yang berkualitas," ujar Menteri Pendidikan, Prof. Dr. Nadiem Makarim.
                    </blockquote>

                    <h3>Program Kerjasama</h3>

                    <p>Beberapa program yang akan dilaksanakan dalam kerjasama ini meliputi:</p>

                    <ul>
                        <li><strong>Pelatihan Guru Olahraga:</strong> Sertifikasi dan peningkatan kompetensi guru olahraga</li>
                        <li><strong>Pengembangan Kurikulum:</strong> Integrasi program BAPOPSI dalam kurikulum sekolah</li>
                        <li><strong>Penyediaan Fasilitas:</strong> Bantuan sarana dan prasarana olahraga</li>
                        <li><strong>Kompetisi Sekolah:</strong> Penyelenggaraan turnamen antar sekolah</li>
                        <li><strong>Identifikasi Bakat:</strong> Program pencarian bibit atlet di sekolah</li>
                    </ul>

                    <h3>Target dan Sasaran</h3>

                    <p>Kerjasama ini menargetkan:</p>

                    <ol>
                        <li>Pelatihan 10.000 guru olahraga dalam 2 tahun</li>
                        <li>Pembangunan fasilitas olahraga di 1.000 sekolah</li>
                        <li>Penyelenggaraan kompetisi di 34 provinsi</li>
                        <li>Identifikasi 5.000 bibit atlet potensial</li>
                    </ol>

                    <h3>Implementasi Bertahap</h3>

                    <p>Program kerjasama akan diimplementasikan secara bertahap dimulai dari provinsi-provinsi prioritas. Tahap pertama akan fokus pada Jawa, Sumatera, dan Sulawesi, kemudian diperluas ke seluruh Indonesia.</p>

                    <p>Setiap sekolah yang terpilih akan mendapat pendampingan khusus dari tim BAPOPSI dan Kemendikbudristek untuk memastikan program berjalan sesuai target dan memberikan dampak positif bagi pengembangan olahraga pelajar.</p>

                    <p>Kerjasama ini diharapkan dapat menjadi model pengembangan olahraga pelajar yang dapat diadopsi oleh negara-negara lain di Asia Tenggara.</p>
                `
    }
};

// Get news ID from URL parameter
function getNewsId() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id') || '1';
}

// Load news detail
function loadNewsDetail() {
    const newsId = getNewsId();
    const news = newsData[newsId];

    if (news) {
        const newsDetailHtml = `
                    <div class="mb-6">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">${news.title}</h1>
                        <div class="flex flex-wrap items-center text-sm text-gray-600 mb-6">
                            <span class="mr-4">
                                <i class="fas fa-calendar mr-1"></i>
                                ${news.date}
                            </span>
                            <span class="mr-4">
                                <i class="fas fa-user mr-1"></i>
                                ${news.author}
                            </span>
                            <span>
                                <i class="fas fa-eye mr-1"></i>
                                ${Math.floor(Math.random() * 1000) + 500} views
                            </span>
                        </div>
                    </div>

                    <div class="mb-8">
                        <img src="${news.image}" alt="${news.title}" class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
                    </div>

                    <div class="news-content prose prose-lg max-w-none">
                        ${news.content}
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-wrap gap-2">
                            <span class="text-sm text-gray-600">Tags:</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">BAPOPSI</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Olahraga Pelajar</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Pembinaan Atlet</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Indonesia</span>
                        </div>
                    </div>
                `;

        $('#news-detail').html(newsDetailHtml);

        // Update page title
        document.title = `${news.title} - BAPOPSI`;
    } else {
        $('#news-detail').html(`
                    <div class="text-center py-16">
                        <i class="fas fa-exclamation-triangle text-6xl text-gray-400 mb-4"></i>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Berita Tidak Ditemukan</h2>
                        <p class="text-gray-600 mb-6">Maaf, berita yang Anda cari tidak dapat ditemukan.</p>
                        <a href="berita.html" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Kembali ke Daftar Berita
                        </a>
                    </div>
                `);
    }
}

// Copy to clipboard function
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        alert('Link berhasil disalin!');
    });
}

// Load news detail when page loads
$(document).ready(function() {
    loadNewsDetail();
});
</script>
@endsection
