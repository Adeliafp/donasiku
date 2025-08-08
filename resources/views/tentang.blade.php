<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - Donasiku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>
<body class="font-sans antialiased">

    <!-- Header/Navbar -->
    <header class="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo_donasiku_1.png') }}" alt="Logo Donasiku">
            </a>
        </div>

        <div class="navbar-center">
            <div class="search-box">
                <input type="text" placeholder="Cari yang ingin kamu tahu" />
            </div>
        </div>

        <nav class="main-nav">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/donasi') }}">Donasi</a>
            <a href="{{ url('/tentang') }}" class="active">Tentang Kami</a>

            @auth
                <a href="{{ route('profile.edit') }}">Profil Saya</a>
            @endauth

            @guest
                <a href="{{ route('login') }}">Login</a>
            @endguest
        </nav>
    </header>

    <!-- Konten Halaman Tentang -->
    <main class="container">
        <h2 class="section-title">Visi & Misi Donasiku</h2>

        <div class="tentang-content">
            <div class="tentang-text">
                <h4>Visi</h4>
                <p>
                    Membangun platform donasi digital yang dapat dipercaya, inklusif, dan mudah diakses oleh seluruh lapisan masyarakat Indonesia demi mewujudkan keadilan sosial dan pemberdayaan komunitas.
                </p>

                <h4>Misi</h4>
                <ul>
                    <li>Menjadi jembatan yang menghubungkan antara para donatur dan penerima manfaat secara cepat dan aman.</li>
                    <li>Memberikan transparansi dan akuntabilitas dalam setiap proses pengumpulan dan penyaluran donasi.</li>
                    <li>Mendukung aksi sosial dan kemanusiaan dalam berbagai bentuk seperti uang, barang, hingga keterlibatan waktu sukarela.</li>
                    <li>Mengedukasi masyarakat tentang pentingnya berbagi dan empati terhadap sesama.</li>
                    <li>Berinovasi dalam teknologi untuk mempermudah proses donasi dan pelaporan secara real-time.</li>
                </ul>
            </div>
        </div>

        <div class="logo-section">
            <div class="penjelasan-logo">
                <h3>Makna dan Filosofi Logo Donasiku</h3>

                <h4>Deskripsi Visual Logo</h4>
                <p>
                    Logo ini berbentuk hati yang terdiri dari dua warna utama: biru dan hijau. Di tengahnya terdapat gambar dua telapak tangan yang saling bersentuhan atau menggenggam secara simbolis, membentuk bagian dari garis tepi hati.
                </p>
                <ul>
                    <li><strong>Bagian kiri hati:</strong> Didominasi warna biru dengan garis putih berbentuk tangan mengarah ke kanan.</li>
                    <li><strong>Bagian kanan hati:</strong> Berwarna hijau dengan aksen putih tipis melengkung menyerupai siluet tangan lain yang menyambut dari arah kanan.</li>
                </ul>

                <h4>Makna dan Filosofi</h4>
                <ul>
                    <li><strong>Bentuk Hati:</strong>
                        <ul>
                            <li>Simbol universal dari cinta, kepedulian, dan kemanusiaan.</li>
                            <li>Menunjukkan bahwa aktivitas inti dari platform ini berkaitan dengan empati, bantuan, dan kebaikan hati.</li>
                        </ul>
                    </li>
                    <li><strong>Gambar Dua Tangan:</strong>
                        <ul>
                            <li>Tangan biru melambangkan <em>pemberi</em> (donatur) yang menawarkan bantuan.</li>
                            <li>Tangan hijau melambangkan <em>penerima</em> (pihak yang dibantu).</li>
                            <li>Menggambarkan hubungan yang saling menguatkan antara donatur dan penerima manfaat.</li>
                        </ul>
                    </li>
                    <li><strong>Warna Biru:</strong>
                        <ul>
                            <li>Mewakili kepercayaan, profesionalisme, dan ketenangan.</li>
                            <li>Mencerminkan bahwa platform ini dapat dipercaya sebagai perantara donasi.</li>
                        </ul>
                    </li>
                    <li><strong>Warna Hijau:</strong>
                        <ul>
                            <li>Melambangkan kehidupan, harapan, pertumbuhan, dan keberlanjutan.</li>
                            <li>Menunjukkan bahwa donasi yang diberikan bertujuan untuk masa depan yang lebih baik bagi penerima.</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="tentang-image">
                <img src="{{ asset('images/logo_donasiku_1.png') }}" alt="Logo Donasiku">
            </div>
        </div>
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
