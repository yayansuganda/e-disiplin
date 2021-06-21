<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMKewajibansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_kewajibans', function (Blueprint $table) {
            $table->bigIncrements('id_m_kewajiban_hd');
            $table->bigInteger('id_m_jenis_pelanggaran_hd')->unsigned();
            $table->text('nama_m_kewajiban_hd');
            $table->timestamps();
            $table->foreign('id_m_jenis_pelanggaran_hd')->references('id_m_jenis_pelanggaran_hd')->on('t_m_jenis_pelanggaran_hds')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_kewajibans');
    }
}
