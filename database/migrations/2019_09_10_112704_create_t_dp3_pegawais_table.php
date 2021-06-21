<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTDp3PegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_dp3_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_dp3');
            $table->string('nip', 17);
            $table->text('tahun_penilaian');
            $table->integer('kesetiaan');
            $table->integer('prestasi_kerja');
            $table->integer('tanggung_jawab');
            $table->integer('ketaatan');
            $table->integer('kejujuran');
            $table->integer('kerjasama');
            $table->integer('prakarsa');
            $table->integer('kepemimpinan');
            $table->string('nip_pp', 17);
            $table->bigInteger('id_jabatan_pp')->unsigned();
            $table->bigInteger('id_m_jenis_pangkat_pp')->unsigned();
            $table->bigInteger('id_m_ruang_golongan_pp')->unsigned();
            $table->string('unit_kerja_pp');
            $table->string('nip_atasan_pp', 17);
            $table->bigInteger('id_jabatan_atasan_pp')->unsigned();
            $table->bigInteger('id_m_jenis_pangkat_atasan_pp')->unsigned();
            $table->bigInteger('id_m_ruang_golongan_atasan_pp')->unsigned();
            $table->string('unit_kerja_atasan_pp');
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            //untuk pejabat_penilai
            $table->foreign('nip_pp')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_jabatan_pp')->references('id_jabatan')->on('t_jabatan_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_pangkat_pp')->references('id_m_jenis_pangkat')->on('t_m_jenis_pangkats')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_ruang_golongan_pp')->references('id_m_ruang_golongan')->on('t_m_ruang_golongans')->onDelete('no action')->onUpdate('cascade');
            //untuk atasan penilai
            $table->foreign('nip_atasan_pp')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_jabatan_atasan_pp')->references('id_jabatan')->on('t_jabatan_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_jenis_pangkat_atasan_pp')->references('id_m_jenis_pangkat')->on('t_m_jenis_pangkats')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_ruang_golongan_atasan_pp')->references('id_m_ruang_golongan')->on('t_m_ruang_golongans')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_dp3_pegawais');
    }
}
