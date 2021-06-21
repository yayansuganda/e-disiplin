<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMJenisPelanggaranHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_m_jenis_pelanggaran_hds', function (Blueprint $table) {
            $table->bigIncrements('id_m_jenis_pelanggaran_hd');
            $table->text('nama_m_jenis_pelanggaran_hd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_m_jenis_pelanggaran_hds');
    }
}
