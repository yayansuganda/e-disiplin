<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPendidikanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pendidikan_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_pendidikan_pegawai');
            $table->string('nip', 17);
            $table->bigInteger('id_m_tingkat_pendidikan')->unsigned();
            $table->string('tahun_lulus');
            $table->string('nomor_ijazah');
            $table->string('nama_sekolah');
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('id_m_tingkat_pendidikan')->references('id_m_tingkat_pendidikan')->on('t_m_tingkat_pendidikans')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pendidikan_pegawais');
    }
}
