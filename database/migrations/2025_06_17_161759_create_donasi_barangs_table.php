<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiBarangsTable extends Migration
{
    public function up()
    {
        Schema::create('donasi_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donasi_barangs');
    }
}
