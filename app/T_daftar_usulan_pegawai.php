<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_daftar_usulan_pegawai extends Model
{
    public $fillable = [
        'id_daftar_usulan_pegawai',
        'id_usulan_pegawai',
        'nip'

    ];

    protected $primaryKey = 'id_daftar_usulan_pegawai';
}
