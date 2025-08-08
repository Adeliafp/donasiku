<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <title>Login</title>
</head>
<body>
  <div class="main">
    <div class="login-box">
      <h2>Login</h2>

      {{-- Pesan sukses setelah registrasi --}}
      @if (session('success'))
        <div class="success-message" style="color: green; text-align:center;">
          {{ session('success') }}
        </div>
      @endif

      {{-- Error validasi form --}}
      @if ($errors->any())
        <div class="error-message" style="color: red;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Pesan error login atau belum terdaftar --}}
      @if (session('error'))
        <div class="error-message" style="color: red; text-align:center;">
          {{ session('error') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required />

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />

        <button type="submit">Login</button>
        <small>Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a></small>
      </form>
    </div>
  </div>
</body>
</html>
