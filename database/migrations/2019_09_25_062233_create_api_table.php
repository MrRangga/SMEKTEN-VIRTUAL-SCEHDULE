<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jam_awal')->nullable();
            $table->integer('jam_ahkir')->nullable();
            $table->string('nama_hari')->nullable();
            $table->string('nama_ruang')->nullable();
            $table->string('nama_guru')->nullable();
            $table->string('nama_rombel')->nullable();
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
        Schema::dropIfExists('api');
    }
}
