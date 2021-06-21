<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTDiklatPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_diklat_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_diklat');
            $table->string('nip', 17);
            $table->text('jenis_diklat');
            $table->text('tahun_diklat');
            $table->text('penyelenggara');
            $table->text('tanggal_mulai');
            $table->text('tanggal_selesai');
            $table->text('alamat_diklat');
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
        Schema::dropIfExists('t_diklat_pegawais');
    }
}
