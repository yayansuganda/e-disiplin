<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_kabupatens', function (Blueprint $table) {
            $table->bigIncrements('id_kabupaten');
            $table->bigInteger('id_provinsi')->unsigned();;
            $table->string('nama_kabupaten');
            $table->timestamps();
            $table->foreign('id_provinsi')->references('id_provinsi')->on('t_m_provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_kabupatens');
    }
}
