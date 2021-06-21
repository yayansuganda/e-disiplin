<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_dp3_pegawai extends Model
{
    public $fillable = [
        'id_dp3',
        'nip',
        'tahun_penilaian',
        'kesetiaan',
        'prestasi_kerja',
        'tanggung_jawab',
        'ketaatan',
        'kejujuran',
        'kerjasama',
        'prakarsa',
        'kepemimpinan',
        'nip_pp',
        'nama_jabatan_pp',
        'nama_golongan_pp',
        'nama_pangkat_pp',
        'instansi_kerja_pp',
        'nip_atasan_pp',
        'nama_jabatan_atasan_pp',
        'nama_golongan_atasan_pp',
        'nama_pangkat_atasan_pp',
        'instansi_kerja_atasan_pp',
        'path_dp3',
        'nama_file_dp3'
    ];

    protected $primaryKey = 'id_dp3';
}
