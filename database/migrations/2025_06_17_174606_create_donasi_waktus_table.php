<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('donasi_waktus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donasi_waktus');
    }
};
