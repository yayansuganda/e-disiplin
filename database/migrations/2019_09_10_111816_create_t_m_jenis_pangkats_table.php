<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMJenisPangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_jenis_pangkats', function (Blueprint $table) {
            $table->bigIncrements('id_m_jenis_pangkat');
            $table->bigInteger('id_m_ruang_golongan')->unsigned();
            $table->text('nama_m_jenis_pangkat');
            $table->timestamps();
            $table->foreign('id_m_ruang_golongan')->references('id_m_ruang_golongan')->on('t_m_ruang_golongans')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_jenis_pangkats');
    }
}
