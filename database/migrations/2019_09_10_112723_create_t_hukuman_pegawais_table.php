<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTHukumanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_hukuman_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_hukuman_hd');
            $table->string('nip', 17);
            $table->bigInteger('id_m_jenis_hd')->unsigned();
            $table->bigInteger('id_k_jenis_hd')->unsigned();
            $table->bigInteger('id_m_jenis_pelanggaran_hd')->unsigned();
            $table->bigInteger('id_m_kewajiban_hd')->unsigned();
            $table->text('nomor_sk_hd');
            $table->text('tanggal_sk_hd');
            $table->text('tmt_hd');
            $table->text('masa_hd');
            $table->text('tanggal_akhir_hd');
            $table->bigInteger('id_m_jenis_pangkat')->unsigned();
            $table->bigInteger('id_m_ruang_golongan')->unsigned();
            $table->text('nomor_pp');
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_hd')->references('id_m_jenis_hd')->on('t_m_jenis_hukumen')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_k_jenis_hd')->references('id_k_jenis_hd')->on('t_k_jenis_hukumen')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_pelanggaran_hd')->references('id_m_jenis_pelanggaran_hd')->on('t_m_jenis_pelanggaran_hds')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_kewajiban_hd')->references('id_m_kewajiban_hd')->on('t_m_kewajibans')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_pangkat')->references('id_m_jenis_pangkat')->on('t_m_jenis_pangkats')->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('t_hukuman_pegawais');
    }
}
