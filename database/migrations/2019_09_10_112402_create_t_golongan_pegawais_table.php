<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTGolonganPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_golongan_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_golongan_pegawai');
            $table->string('nip', 17);
            $table->bigInteger('id_m_golongan')->unsigned();
            $table->bigInteger('id_m_jenis_pangkat')->unsigned();
            $table->text('nomor_sk');
            $table->text('tanggal_sk');
            $table->text('tmt_golongan');
            $table->text('nomor_bkn');
            $table->text('tanggal_bkn');
            $table->bigInteger('id_m_jenis_kp')->unsigned();
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_kp')->references('id_m_jenis_kp')->on('t_m_jenis_kps')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_golongan_pegawais');
    }
}
