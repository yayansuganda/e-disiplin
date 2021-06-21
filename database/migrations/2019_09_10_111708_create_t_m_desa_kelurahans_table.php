<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMDesaKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_desa_kelurahans', function (Blueprint $table) {
            $table->bigIncrements('id_desa_kelurahan');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->text('nama_desa_kelurahan');
            $table->timestamps();
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('t_m_kecamatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_desa_kelurahans');
    }
}
