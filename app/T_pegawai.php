<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pegawai extends Model
{
    public $fillable = [
        'nip',
        'nip_lama',
        'nama_pegawai',
        'gelar_depan',
        'gelar_belakang',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_m_agama',
        'id_m_pernikahan',
        'nomor_ktp',
        'nomor_hp',
        'email_pegawai',
        'alamat',
        'nomor_npwp',
        'nomor_bpjs',
        'path_surat_nikah',
        'nama_file_surat_nikah',
        'path_ktp',
        'nama_file_ktp',
        'path_bpjs',
        'nama_file_bpjs',
        'path_npwp',
        'nama_file_npwp'
    ];

    protected $primaryKey = 'nip';

    public function user()
    {
        return $this->hasOne(User::class,'nip','id');
    }
}
