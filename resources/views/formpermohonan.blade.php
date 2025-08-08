<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ajukan Permohonan Donasi</title>
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>

  <h2>Ajukan Permohonan Donasi</h2>

  @if(session('success'))
    <div class="alert">{{ session('success') }}</div>
  @endif

  <form action="{{ route('permohonan.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="nama">Nama Pengaju</label>
      <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
      @error('nama') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
      <label for="judul">Judul Permohonan</label>
      <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
      @error('judul') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
      <label for="jenis_donasi">Jenis Donasi</label>
      <select id="jenis_donasi" name="jenis_donasi">
        <option value="">-- Pilih Jenis Donasi --</option>
        <option value="uang" {{ old('jenis_donasi') == 'uang' ? 'selected' : '' }}>Donasi Uang</option>
        <option value="barang" {{ old('jenis_donasi') == 'barang' ? 'selected' : '' }}>Donasi Barang</option>
      </select>
      @error('jenis_donasi') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
      <label for="deskripsi">Deskripsi Permohonan</label>
      <textarea id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
      @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
      <label for="foto_bukti">Upload Bukti Foto</label>
      <input type="file" id="foto_bukti" name="foto_bukti" accept="image/*">
      @error('foto_bukti') <div class="error">{{ $message }}</div> @enderror
    </div>

    <button type="submit">Kirim Permohonan</button>
  </form>

</body>
</html>
