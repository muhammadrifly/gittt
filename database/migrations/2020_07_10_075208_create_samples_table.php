<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('anggota_id');
            $table->unsignedBigInteger('id_subkriteria');
            $table->unsignedBigInteger('values');
            $table->timestamps();

            $table->foreign('anggota_id')
            ->references('id')
            ->on('data_calonanggota')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreign('id_subkriteria')
            ->references('id_subkriteria')
            ->on('sub_kriterias')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
