<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTJabatanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_jabatan_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_jabatan');
            $table->string('nip', 17);
            $table->bigInteger('id_m_jenis_jabatan')->unsigned();
            $table->string('instansi_kerja');
            $table->text('unit_organisasi');
            $table->text('tmt_jabatan');
            $table->text('tanggal_sk');
            $table->text('nomor_sk');
            $table->bigInteger('id_m_eselon')->unsigned();
            $table->text('tmt_pelantikan');
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_jabatan')->references('id_m_jenis_jabatan')->on('t_m_jenis_jabatans')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_eselon')->references('id_m_eselon')->on('t_m_eselons')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_jabatan_pegawais');
    }
}
