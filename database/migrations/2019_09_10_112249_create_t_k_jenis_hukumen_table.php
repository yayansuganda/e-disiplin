<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKJenisHukumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_k_jenis_hukumen', function (Blueprint $table) {
            $table->bigIncrements('id_k_jenis_hd');
            $table->bigInteger('id_m_jenis_hd')->unsigned();
            $table->text('nama_k_jenis_hd');
            $table->timestamps();
            $table->foreign('id_m_jenis_hd')->references('id_m_jenis_hd')->on('t_m_jenis_hukumen')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_k_jenis_hukumen');
    }
}
