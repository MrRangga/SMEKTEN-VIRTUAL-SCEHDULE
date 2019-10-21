<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sekolah', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('nama_sekolah');
            $table->string('jam_masuk');
            $table->string('jam_pulang');
            $table->string('jam_istirahat');
            $table->string('jam_khusus')->nullable();
            $table->string('daftar_hari');
            $table->integer('perjam');
            $table->integer('jumlah_jam');
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
        Schema::dropIfExists('data_sekolah');
    }
}
