<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_kehadiran_pegawai extends Model
{
    public $fillable = [
        'id_kehadiran_pegawai',
        'nip',
        'tahun',
        'bulan',
        'hari_aktif',
        'hadir',
        'i',
        'c',
        's',
        'dl',
        'dik_tb',
        'tl',
        'ttw',
        'tk'
    ];

    protected $primaryKey = 'id_kehadiran_pegawai';
}
