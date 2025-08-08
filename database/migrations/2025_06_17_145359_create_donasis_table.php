<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->text('deskripsi');
    $table->string('foto')->nullable();
    $table->enum('jenis_donasi', ['uang', 'barang', 'waktu']);
    $table->decimal('target', 15, 2);
    $table->decimal('terkumpul', 15, 2)->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasis');
    }
};
