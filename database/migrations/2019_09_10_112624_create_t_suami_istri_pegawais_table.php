<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTSuamiIstriPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_suami_istri_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_suami_istri');
            $table->string('nip', 17);
            $table->text('nama_suami_istri');
            $table->text('status_pns');
            $table->text('tanggal_menikah');
            $table->text('nomor_kartu_su_is');
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
        Schema::dropIfExists('t_suami_istri_pegawais');
    }
}
