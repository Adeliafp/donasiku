<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donasi_barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donasi_barang_id')->constrained('donasi_barangs')->onDelete('cascade');
            $table->string('nama_pengirim');
            $table->string('nomor_telepon_pengirim');
            $table->text('alamat_pengirim');
            $table->text('deskripsi');
            $table->string('foto_barang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donasi_barang_masuks');
    }
};
