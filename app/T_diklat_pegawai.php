<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_diklat_pegawai extends Model
{
    public $fillable = [
        'nip',
        'jenis_diklat',
        'nama_diklat',
        'tanggal_mulai',
        'tanggal_selesai',
        'penyelenggara',
        'alamat_diklat',
        'path_diklat',
        'nama_file_diklat'
    ];

    protected $primaryKey = 'id_diklat';
}
