<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pak_pegawai extends Model
{
    public $fillable = [
        'id_pak',
        'nip',
        'nomor_sk_pak',
        'tanggal_sk_pak',
        'bulan_mulai_penilaian',
        'bulan_selesai_penilaian',
        'tahun_mulai_penilaian',
        'tahun_selesai_penilaian',
        'kredit_utama_baru',
        'kredit_penunjang_baru',
        'total_kredit_baru',
        'id_jabatan',
        'nama_file_pak',
        'path_pak'
    ];

    protected $primaryKey = 'id_pak';
}
