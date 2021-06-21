<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKursusPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_kursus_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_kursus');
            $table->string('nip', 17);
            $table->text('nama_kursus');
            $table->text('alamat_kursus');
            $table->text('tanggal_mulai');
            $table->text('tanggal_selesai');
            $table->text('penyelenggara');
            $table->foreign('nip')->references('nip')->on('t_pegawais')->onDelete('no action')->onUpdate('cascade');





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
        Schema::dropIfExists('t_kursus_pegawais');
    }
}
