<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pegawais', function (Blueprint $table) {
            $table->string('nip', 17)->primary();
            $table->text('nama_pegawai');
            $table->text('tempat_lahir');
            $table->text('tanggal_lahir');
            $table->text('status_pernikahan');
            $table->text('agama');
            $table->text('email');
            $table->text('jenis_kelamin');
            $table->text('jenis_dokument');
            $table->text('nomor_dokument');
            $table->text('alamat');
            $table->text('nomor_hp');
            $table->text('nomor_telephone');
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
        Schema::dropIfExists('t_pegawais');
    }
}
