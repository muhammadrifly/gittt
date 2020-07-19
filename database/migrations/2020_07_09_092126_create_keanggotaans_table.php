<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeanggotaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('dept_keanggotaan', function (Blueprint $table) {
            $table->bigIncrements('id_anggota');
            $table->string('nama_anggota');
            $table->string('NRA_anggota');
            $table->string('email_anggota')->unique;
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
        Schema::dropIfExists('dept_keanggotaan');
    }
}
