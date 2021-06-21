<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_kursus_pegawai extends Model
{
    public $fillable = [
        'id_kursus_pegawai',
        'nip',
        'nama_kursus',
        'alamat_kursus',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara'
    ];

    protected $primaryKey = 'id_kursus';
}
