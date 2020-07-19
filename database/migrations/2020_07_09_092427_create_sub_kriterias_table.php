<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->bigIncrements('id_subkriteria');
            $table->unsignedBigInteger('id_kriteria');
            $table->string('nama_subkriteria');
            $table->tinyInteger('target');
            $table->string('type');

            $table->timestamps();

             $table->foreign('id_kriteria')
             ->references('id_kriteria')
             ->on('kriterias')
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
        Schema::dropIfExists('sub_kriterias');
    }
}
