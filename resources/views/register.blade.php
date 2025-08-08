<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Register</title>
  <script>
    function validateForm() {
      const password = document.getElementById("password").value;
      const confirm = document.getElementById("confirm_password").value;

      if (password !== confirm) {
        alert("Password tidak sesuai!");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <div class="main">
    <div class="register-box">
      <h2>Register</h2>

      {{-- Pesan sukses setelah registrasi --}}
      @if (session('success'))
        <div class="success-message" style="color: green; text-align: center;">
          {{ session('success') }}
        </div>
      @endif

      {{-- Pesan error --}}
      @if ($errors->any())
        <div class="error-message" style="color: red;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
        @csrf

        <label for="name">Username</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required />

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />

        <label for="confirm_password">Tulis Ulang Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required />

        <button type="submit">Daftar</button>
        <small>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></small>
      </form>
    </div>
  </div>
</body>
</html>
