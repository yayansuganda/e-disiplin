<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_nomor_usul extends Model
{
    protected $table = 't_usulans';
    public $fillable = [
        'id_usulan',
        'nomor_usulan',
        'tanggal_usulan',
        'satuan_kerja',
        'kategori_nomor_usulan'
    ];

    protected $primaryKey = 'id_usulan';
}
