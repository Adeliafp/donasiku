<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    public function up(): void
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul');
            $table->enum('jenis_donasi', ['uang', 'barang', 'waktu']);
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
}
