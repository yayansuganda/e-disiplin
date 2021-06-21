<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAnakPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_anak_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_anak');
            $table->string('nip', 17);
            $table->text('nama_anak');
            $table->text('jenis_kelamin_anak');
            $table->text('tempat_lahir_anak');
            $table->text('tanggal_lahir_anak');
            $table->text('status_anak');
            $table->text('pekerjaan');
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
        Schema::dropIfExists('t_anak_pegawais');
    }
}
