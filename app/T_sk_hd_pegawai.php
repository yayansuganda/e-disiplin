<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_sk_hd_pegawai extends Model
{
    public $fillable = [
        'id_sk',
        'nama_keputusan',
        'nomor',
        'laporan_dari_tanggal',
        'laporan_sampai_tanggal',
        'nip_pelanggar',
        'tanggal_pelanggaran',
        'pasal_hd',
        'angka_hd',
        'huruf_hd',
        'mengingat_1',
        'mengingat_2',
        'tanggal_di_hukum'
    ];

    protected $primaryKey = 'id_sk';
}
