<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_prajabatan_cpns_pns extends Model
{
    public $fillable = [
        'id_t_prajabatan_cpns_pns',
        'nip',
        'id_m_status_kepegawaian',
        'tmt_cpns',
        'nomor_sk_cpns',
        'tanggal_sk_cpns',
        'path_sk_cpns',
        'nama_file_sk_cpns',
        'tmt_pns',
        'nomor_sk_pns',
        'tanggal_sk_pns',
        'path_sk_pns',
        'nama_file_sk_pns',
        'karis_karsu',
        'path_karsu_karis',
        'nama_file_karis_karsu',
        'karpeg',
        'path_karpeg',
        'nama_file_karpeg',
        'nomor_sttpl',
        'tanggal_sttpl',
        'path_sttpl',
        'nama_file_sttpl',
        'taspen',
        'path_taspen',
        'nama_file_taspen'
    ];

    protected $primaryKey = 'id_t_prajabatan_cpns_pns';
}
