<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPenghargaanPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_penghargaan_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_penghargaan');
            $table->string('nip', 17);
            $table->text('nama_penghargaan');
            $table->text('tanggal_perolehan');
            $table->text('nomor');
            $table->text('negera_instansi_pemberi');
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
        Schema::dropIfExists('t_penghargaan_pegawais');
    }
}
