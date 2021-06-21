<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKeluargaKandungPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_keluarga_kandung_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_keluarga_kandung');
            $table->string('nip', 17);
            $table->text('nama_keluarga');
            $table->text('hubungan_keluarga');
            $table->text('tempat_lahir');
            $table->text('tanggal_lahir');
            $table->text('status_hidup');
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_keluarga_kandung_pegawais');
    }
}
