<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_kecamatans', function (Blueprint $table) {
            $table->bigIncrements('id_kecamatan');
            $table->bigInteger('id_kabupaten')->unsigned();
            $table->text('nama_kecamatan');
            $table->timestamps();
            $table->foreign('id_kabupaten')->references('id_kabupaten')->on('t_m_kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_kecamatans');
    }
}
