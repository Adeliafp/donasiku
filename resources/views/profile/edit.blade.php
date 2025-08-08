<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Saya - Donasiku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body class="font-sans antialiased">

    <!-- Navbar -->
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
            <a href="{{ url('/tentang') }}">Tentang Kami</a>
            <a href="{{ route('profile.edit') }}" class="active">Profil Saya</a>
        </nav>
    </header>

    <!-- Konten Profil -->
    <div class="profile-container">
        <h2>Profil Saya</h2>

        {{-- Flash Message --}}
        @if (session('status') == 'profile-updated')
            <div class="alert-success">Profil berhasil diperbarui!</div>
        @elseif (session('status') == 'password-updated')
            <div class="alert-success">Password berhasil diganti!</div>
        @endif

        <div class="accordion-section">

            <!-- Ubah Email & Nama -->
            <details>
                <summary>✏️ Ubah Email & Nama</summary>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <label>Nama:</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button type="submit">Simpan Perubahan</button>
                </form>
            </details>

            <!-- Ganti Password -->
            <details>
                <summary>🔐 Ganti Password</summary>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <label>Password Lama:</label>
                    <input type="password" name="current_password" required>
                    @error('current_password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Password Baru:</label>
                    <input type="password" name="new_password" required>
                    @error('new_password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label>Konfirmasi Password Baru:</label>
                    <input type="password" name="new_password_confirmation" required>

                    <button type="submit">Ganti Password</button>
                </form>
            </details>

            <!-- Logout -->
            <details>
                <summary>🚪 Logout</summary>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Keluar dari Akun</button>
                </form>
            </details>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
