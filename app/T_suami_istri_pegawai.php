<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_suami_istri_pegawai extends Model
{
    public $fillable = [
        'id_suami_istri',
        'nip',
        'nama_suami_istri',
        'status_pns',
        'tanggal_menikah',
        'nomor_kartu_su_is'
    ];

    protected $primaryKey = 'id_suami_istri';
}
