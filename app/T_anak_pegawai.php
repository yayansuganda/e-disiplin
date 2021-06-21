<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_anak_pegawai extends Model
{
    public $fillable = [
        'nip',
        'nama_anak',
        'jenis_kelamin_anak',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'status_anak',
        'pekerjaan',

    ];

    protected $primaryKey = 'id_anak';
}
