<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_calonanggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nim')->unique;
            $table->string('nama_calonanggota');
            $table->string('jurusan');
            $table->string('email_calonanggota')->unique;
            $table->char('nomor_telp',13);
            $table->string('password');
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
        Schema::dropIfExists('data_calonanggota');
    }
}
