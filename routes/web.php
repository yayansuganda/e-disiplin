<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@index')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:1']], function(){
    Route::get('admin', 'AdminController@index');
    Route::get('chart_filter/admin/{id}', 'AdminController@show_data_chart');



    Route::get('/nama_pangkat_golongan_terakhir/ajax/{id}', 'T_usulan_kenaikan_pangkatController@pangkat_terakhir');
});

Route::group(['middleware' => ['auth','checkRole:2']], function(){

    Route::resource('/pegawai', 'T_pegawaiController');

    Route::get('/table/pegawai', 'T_pegawaiController@data_pegawai')->name('table.pegawai');

    Route::get('skpd', 'Dashboard_opdController@index');
    Route::get('/table/skpd', 'Dashboard_opdController@duk_skpd')->name('table.duk_pegawai_skpd');

});

Route::group(['middleware' => ['auth','checkRole:3']], function(){
        Route::get('bidang', 'Dashboard_bkdController@index');

});


Route::group(['middleware' => ['auth','checkRole:4']], function () {
    Route::get('dashboard_pegawai', 'Dashboard_pegawaiController@index');

});

Route::get('pegawai_detail/{id}', 'T_pegawaiController@data_pegawai_asn');



//NOMOR USULAN LAYANAN
Route::resource('/nomor_usulan', 'T_nomor_usulController')->only(['index', 'store', 'edit', 'destroy']);
Route::get('daftar_pegawai/{nama}/{id}', 'T_nomor_usulController@show');
Route::get('nomor_usulan/{name}', 'T_nomor_usulController@index');
Route::get('nomor_usulan/{name}/create', 'T_nomor_usulController@create');
Route::post('nomor_usulan/update/{id}', 'T_nomor_usulController@update')->name('nomor_usulan.update');
Route::get('/table/{id}', 'T_nomor_usulController@data_usulan_pegawai')->name('data.usulan');








Route::get('/nama_pangkat_golongan_terakhir/ajax/{id}', 'T_usulan_kenaikan_pangkatController@pangkat_terakhir');
Route::get('berkas_tms', 'T_usulan_kenaikan_pangkatController@index_tms');
Route::get('berkas_btl', 'T_usulan_kenaikan_pangkatController@index_btl');

//ROUTE PEGAWAI
Route::resource('/pegawai', 'T_pegawaiController');
Route::get('/profile_show/profile/{id}', 'T_pegawaiController@show_profil')->name('table.profil_show');
Route::get('/table/pegawai', 'T_pegawaiController@data_pegawai')->name('table.pegawai');
Route::get('/download_surat_nikah/{id}', 'T_pegawaiController@download_surat_nikah');
Route::get('/download_ktp/{id}', 'T_pegawaiController@download_ktp');
Route::get('/download_bpjs/{id}', 'T_pegawaiController@download_bpjs');
Route::get('/download_npwp/{id}', 'T_pegawaiController@download_npwp');


//ROUTE GOLONGAN
Route::resource('/golongan', 'T_golongan_pegawaiController');
Route::get('/create_golongan/{id}', 'T_golongan_pegawaiController@create_golongan')->name('create_data.golongan');
Route::post('golongan/update/{id}', 'T_golongan_pegawaiController@update')->name('update_data.golongan');
Route::get('/table/golongan/{id}', 'T_golongan_pegawaiController@data_golongan_pegawai')->name('table.golongan');
Route::get('/m_jenis_pangkat/ajax/{id}', 'T_golongan_pegawaiController@m_jenis_pangkat');
Route::get('/download_file_sk_pangkat_golongan/{id}', 'T_golongan_pegawaiController@download_file_sk_pangkat_golongan');

//ROUTE PENDIDIKAN
Route::resource('/pendidikan', 'T_pendidikan_pegawaiController');
Route::post('pendidikan/update/{id}', 'T_pendidikan_pegawaiController@update')->name('update_data.pendidikan');
Route::get('/create_pendidikan/{id}', 'T_pendidikan_pegawaiController@create_pendidikan')->name('create_data.pendidikan');
Route::get('/table/pendidikan/{id}', 'T_pendidikan_pegawaiController@data_pendidikan_pegawai')->name('table.pendidikan');
Route::get('/download_file_ijazah/{id}', 'T_pendidikan_pegawaiController@download_file_ijazah');

//ROUTE KURSUS
Route::resource('/kursus', 'T_kursus_pegawaiController');
Route::post('kursus/update/{id}', 'T_kursus_pegawaiController@update')->name('update_data.kursus');
Route::get('/create_kursus/{id}', 'T_kursus_pegawaiController@create_kursus')->name('create_data.kursus');
Route::get('/table/kursus/{id}', 'T_kursus_pegawaiController@data_kursus_pegawai')->name('table.kursus');

//ROUTE DIKLAT
Route::resource('/diklat', 'T_diklat_pegawaiController');
Route::post('diklat/update/{id}', 'T_diklat_pegawaiController@update')->name('update_data.diklat');
Route::get('/create_diklat/{id}', 'T_diklat_pegawaiController@create_diklat')->name('create_data.diklat');
Route::get('/table/diklat/{id}', 'T_diklat_pegawaiController@data_diklat_pegawai')->name('table.diklat');
Route::get('/download_file_diklat/{id}', 'T_diklat_pegawaiController@download_file_diklat');

//ROUTE JABATAN
Route::resource('/jabatan', 'T_jabatan_pegawaiController');
Route::get('/create_jabatan/{id}', 'T_jabatan_pegawaiController@create_jabatan')->name('create_data.jabatan');
Route::post('jabatan/update/{id}', 'T_jabatan_pegawaiController@update')->name('update_data.jabatan');
Route::get('/table/jabatan/{id}', 'T_jabatan_pegawaiController@data_jabatan_pegawai')->name('table.jabatan');
Route::get('/m_jenis_jabatan/ajax/{id}', 'T_jabatan_pegawaiController@jenis_jabatan');
Route::get('/nama_skpd_bidang/ajax/{id}', 'T_jabatan_pegawaiController@nama_bidang_skpd');
Route::get('/nama_skpd/ajax/{id}', 'T_jabatan_pegawaiController@nama_skpd');
Route::get('/download_file_sk_jabatan/{id}', 'T_jabatan_pegawaiController@download_file_sk_jabatan');
Route::get('/download_file_sk_pelantikan_jabatan/{id}', 'T_jabatan_pegawaiController@download_file_sk_pelantikan_jabatan');
Route::get('/download_file_sumpah_jabatan/{id}', 'T_jabatan_pegawaiController@download_file_sumpah_jabatan');
Route::get('/nama_unor/ajax/{id}', 'T_jabatan_pegawaiController@nama_unor');


//ROUTE KELUARGA
Route::resource('/keluarga_kandung', 'T_keluarga_kandungController');
Route::get('/create_keluarga_kandung/{id}', 'T_keluarga_kandungController@create_keluarga_kandung')->name('create_data.keluarga_kandung');
Route::post('keluarga_kandung/update/{id}', 'T_keluarga_kandungController@update')->name('update_data.keluarga_kandung');
Route::get('/table/keluarga_kandung/{id}', 'T_keluarga_kandungController@data_keluarga_kandung_pegawai')->name('table.keluarga_kandung');

//ROUTE SUAMI/ISTRI
Route::resource('/suami_istri', 'T_suami_istriController');
Route::get('/create_suami_istri/{id}', 'T_suami_istriController@create_suami_istri')->name('create_data.suami_istri');
Route::post('suami_istri/update/{id}', 'T_suami_istriController@update')->name('update_data.suami_istri');
Route::get('/table/suami_istri/{id}', 'T_suami_istriController@data_suami_istri_pegawai')->name('table.suami_istri');

//ROUTE ANAK
Route::resource('/anak', 'T_anak_pegawaiController');
Route::get('/create_anak/{id}', 'T_anak_pegawaiController@create_anak')->name('create_data.anak');
Route::post('anak/update/{id}', 'T_anak_pegawaiController@update')->name('update_data.anak');
Route::get('/table/anak/{id}', 'T_anak_pegawaiController@data_anak_pegawai')->name('table.anak');

//ROUTE PENGHARGAAN
Route::resource('/penghargaan', 'T_penghargaan_pegawaiController');
Route::get('/create_penghargaan/{id}', 'T_penghargaan_pegawaiController@create_penghargaan')->name('create_data.penghargaan');
Route::post('penghargaan/update/{id}', 'T_penghargaan_pegawaiController@update')->name('update_data.penghargaan');
Route::get('/table/penghargaan/{id}', 'T_penghargaan_pegawaiController@data_penghargaan_pegawai')->name('table.penghargaan');
Route::get('/download_file_penghargaan/{id}', 'T_penghargaan_pegawaiController@download_file_penghargaan');

//ROUTE DP3
Route::resource('/dp3', 'T_dp3_pegawaiController');
Route::get('/create_dp3/{id}', 'T_dp3_pegawaiController@create_dp3')->name('create_data.dp3');
Route::post('dp3/update/{id}', 'T_dp3_pegawaiController@update')->name('update_data.dp3');
Route::get('/table/dp3/{id}', 'T_dp3_pegawaiController@data_dp3_pegawai')->name('table.dp3');
Route::get('/dp3_nama_jabatan_pp/ajax/{id}', 'T_dp3_pegawaiController@jabatan_pegawai_pp');
Route::get('/dp3_nama_jabatan_atasan_pp/ajax/{id}', 'T_dp3_pegawaiController@jabatan_pegawai_atasan_pp');


//ROUTE PAK
Route::resource('/pak', 'T_pak_pegawaiController');
Route::get('/create_pak/{id}', 'T_pak_pegawaiController@create_pak')->name('create_data.pak');
Route::post('pak/update/{id}', 'T_pak_pegawaiController@update')->name('update_data.pak');
Route::get('/table/pak/{id}', 'T_pak_pegawaiController@data_pak_pegawai')->name('table.pak');
Route::get('/download_file_pak/{id}', 'T_pak_pegawaiController@download_file_pak');
Route::get('/pak/ajax/{id}', 'T_pak_pegawaiController@jabatan_pegawai');



//ROUTE HUKUMAN
Route::resource('/hukuman', 'T_hukuman_pegawaiController');
Route::get('/table/hukuman/{id}', 'T_hukuman_pegawaiController@data_hukuman_pegawai')->name('table.hukuman');
Route::get('/k_jenis_hd/ajax/{id}', 'T_hukuman_pegawaiController@k_jenis_hukuman');
Route::get('/kewajiban_hd/ajax/{id}', 'T_hukuman_pegawaiController@kewajiban_hd');
Route::get('/ruang_golongan/ajax/{id}', 'T_hukuman_pegawaiController@ruang_golongan');
Route::get('/jenis_pangkat/ajax/{id}', 'T_hukuman_pegawaiController@jenis_pangkat');
Route::get('/create_hd/{id}', 'T_hukuman_pegawaiController@create_h_disiplin')->name('create_data.hukuman');
Route::get('/kategori_kewajiban/ajax/{id}', 'T_hukuman_pegawaiController@kategori_pelanggaran');


//ROUTE PRAJABATAN CPNS/PNS
Route::resource('/prajabatan_cpns_pns', 'T_prajabatan_cpns_pnsController');
Route::post('/prajabatan_cpns_pns/update/{id}', 'T_prajabatan_cpns_pnsController@update')->name('update_data.prajabatan_cpns_pns');
Route::get('/table/prajabatan_cpns_pns/{id}', 'T_prajabatan_cpns_pnsController@data_prajabatan_cpns_pns')->name('table.datas_prajabatan_cpns_pns');
Route::get('/download_file_sk_cpns/{id}', 'T_prajabatan_cpns_pnsController@download_file_sk_cpns');
Route::get('/download_file_sk_pns/{id}', 'T_prajabatan_cpns_pnsController@download_file_sk_pns');
Route::get('/download_file_karsu_karis/{id}', 'T_prajabatan_cpns_pnsController@download_file_karsu_karis');
Route::get('/download_file_karpeg/{id}', 'T_prajabatan_cpns_pnsController@download_file_karpeg');
Route::get('/download_file_sttpl/{id}', 'T_prajabatan_cpns_pnsController@download_file_sttpl');
Route::get('/download_file_taspen/{id}', 'T_prajabatan_cpns_pnsController@download_file_taspen');


//ROUTE DAFTAR USULAN
Route::resource('/daftar_usulan_pegawai', 'T_daftar_usulan_pegawaiController');
Route::get('/table/daftar_usulan_pegawai', 'T_daftar_usulan_pegawaiController@data_daftar_usulan_pegawai')->name('table.daftar_data_usulan_pegawai');

//ROUTE USULAN LAYANAN KENAIKAN PANGKAT
Route::resource('/usulan_layanan_kenaikan_pangkat', 'T_usulan_kenaikan_pangkatController');
Route::get('/table/usulan_layanan_kenaikan_pangkat/{id}/', 'T_usulan_kenaikan_pangkatController@data_daftar_usulan_pegawai')->name('table.daftar_usulan_pegawai');
Route::get('/table/usulan/pegawai_tms', 'T_usulan_kenaikan_pangkatController@daftar_usulan_tms')->name('table.daftar_pegawai_tms');
Route::get('/table/usulan/pegawai_btl/', 'T_usulan_kenaikan_pangkatController@daftar_usulan_btl')->name('table.daftar_pegawai_btl');
Route::resource('/layanan_usulan_kp', 'T_usulan_kenaikan_pangkatController');

//ROUTE USULAN KGB
Route::resource('/usulan_kgb', 'T_usulan_kgbController');
Route::post('usulan_kgb/update/{id}', 'T_usulan_kgbController@update')->name('update_data.usulan_kgb');
Route::get('/table/usulan_kgb/{id}/', 'T_usulan_kgbController@data_usulan_kgb')->name('table.usulan_kgb');
//ROUTE USULAN KGB BIDANG
Route::get('/daftar_usulan_kgb', 'T_usulan_kgbController@index_daftar_usulan_kgb');
Route::get('/table/daftar_usulan_kgb/{id}/', 'T_usulan_kgbController@daftar_usulan_kgb');
Route::get('/verifikasi_daftar_usulan_kgb/{id}', 'T_usulan_kgbController@verifikasi_daftar_usulan')->name('data_usulan_kgb.verifikasi');
Route::post('usulan_kgb/update_create_verifikasi_usulan_kgb/{id}', 'T_usulan_kgbController@update_create_verifikasi_usulan_kgb')->name('update_create.data_verifikasi_usulan_kgb');
Route::get('/preview_file_pegawai/{nama}/{id}', 'T_usulan_kgbController@show_file_preview');


//ROUTE USULAN JAFUNG
Route::resource('/usulan_jafung', 'T_usulan_jafungController');
Route::post('usulan_jafung/update/{id}', 'T_usulan_jafungController@update')->name('update_data.usulan_jafung');
Route::get('/table/usulan_jafung/{id}/', 'T_usulan_jafungController@data_usulan_jafung')->name('table.usulan_jafung');
//ROUTE USULAN JAFUNG BIDANG
Route::get('/daftar_usulan_jafung', 'T_usulan_jafungController@index_daftar_usulan_jafung');
Route::get('/table/daftar_usulan_jafung/{id}/', 'T_usulan_jafungController@daftar_usulan_jafung');
Route::get('/verifikasi_daftar_usulan_jafung/{id}', 'T_usulan_jafungController@verifikasi_daftar_usulan')->name('data_usulan_jafung.verifikasi');
Route::post('usulan_jafung/update_create_verifikasi/{id}', 'T_usulan_jafungController@update_create_verifikasi')->name('update_create.data_verifikasi');


//ROUTE USULAN PENSIUN
Route::resource('/usulan_pensiun', 'T_usulan_pensiunController');
Route::post('usulan_pensiun/update/{id}', 'T_usulan_pensiunController@update')->name('update_data.usulan_pensiun');
Route::get('/table/usulan_pensiun/{id}/', 'T_usulan_pensiunController@data_usulan_pensiun')->name('table.usulan_pensiun');
//ROUTE USULAN PENSIUN BIDANG
Route::get('/daftar_usulan_pensiun', 'T_usulan_pensiunController@index_daftar_usulan_pensiun');
Route::get('/table/daftar_usulan_pensiun/{id}/', 'T_usulan_pensiunController@daftar_usulan_pensiun');
Route::get('/verifikasi_daftar_usulan_mutasi/{id}', 'T_usulan_pensiunController@verifikasi_daftar_usulan')->name('data_usulan_pensiun.verifikasi');
Route::post('usulan_pensiun/update_create_verifikasi/{id}', 'T_usulan_pensiunController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_pensiun');

//ROUTE USULAN MUTASI
Route::resource('/usulan_mutasi', 'T_usulan_mutasiController');
Route::post('usulan_mutasi/update/{id}', 'T_usulan_mutasiController@update')->name('update_data.usulan_mutasi');
Route::get('/table/usulan_mutasi/{id}/', 'T_usulan_mutasiController@data_usulan_mutasi')->name('table.usulan_mutasi');
//ROUTE USULAN MUTASI BIDANG
Route::get('/daftar_usulan_mutasi', 'T_usulan_mutasiController@index_daftar_usulan_mutasi');
Route::get('/table/daftar_usulan_mutasi/{id}/', 'T_usulan_mutasiController@daftar_usulan_mutasi');
Route::get('/verifikasi_daftar_usulan_mutasi/{id}', 'T_usulan_mutasiController@verifikasi_daftar_usulan')->name('data_usulan_mutasi.verifikasi');
Route::post('usulan_mutasi/update_create_verifikasi/{id}', 'T_usulan_mutasiController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_mutasi');


//ROUTE USULAN DIKLAT
Route::resource('/usulan_diklat', 'T_usulan_diklatController');
Route::post('usulan_diklat/update/{id}', 'T_usulan_diklatController@update')->name('update_data.usulan_diklat');
Route::get('/table/usulan_diklat/{id}/', 'T_usulan_diklatController@data_usulan_diklat')->name('table.usulan_diklat');
//ROUTE USULAN DIKLAT BIDANG
Route::get('/daftar_usulan_diklat', 'T_usulan_diklatController@index_daftar_usulan_diklat');
Route::get('/table/daftar_usulan_diklat/{id}/', 'T_usulan_diklatController@daftar_usulan_diklat');
Route::get('/verifikasi_daftar_usulan_diklat/{id}', 'T_usulan_diklatController@verifikasi_daftar_usulan')->name('data_usulan_diklat.verifikasi');
Route::post('usulan_diklat/update_create_verifikasi/{id}', 'T_usulan_diklatController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_diklat');


//ROUTE USULAN UJIAN DINAS
Route::resource('/usulan_ujian_dinas', 'T_usulan_ujian_dinasController');
Route::post('usulan_ujian_dinas/update/{id}', 'T_usulan_ujian_dinasController@update')->name('update_data.usulan_ujian_dinas');
Route::get('/table/usulan_ujian_dinas/{id}/', 'T_usulan_ujian_dinasController@data_usulan_ujian_dinas')->name('table.usulan_ujian_dinas');
//ROUTE USULAN UJIAN DINAS BIDANG
Route::get('/daftar_usulan_ujian_dinas', 'T_usulan_ujian_dinasController@index_daftar_usulan_ujian_dinas');
Route::get('/table/daftar_usulan_ujian_dinas/{id}/', 'T_usulan_ujian_dinasController@daftar_usulan_ujian_dinas');
Route::get('/verifikasi_daftar_usulan_ujian_dinas/{id}', 'T_usulan_ujian_dinasController@verifikasi_daftar_usulan')->name('data_usulan_ujian_dinas.verifikasi');
Route::post('usulan_ujian_dinas/update_create_verifikasi/{id}', 'T_usulan_ujian_dinasController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_ujian_dinas');


//ROUTE USULAN PENINGKATAN PENDIDIKAN
Route::resource('/usulan_peningkatan_pendidikan', 'T_usulan_peningkatan_pendidikanController');
Route::post('usulan_peningkatan_pendidikan/update/{id}', 'T_usulan_peningkatan_pendidikanController@update')->name('update_data.usulan_peningkatan_pendidikan');
Route::get('/table/usulan_peningkatan_pendidikan/{id}/', 'T_usulan_peningkatan_pendidikanController@data_usulan_peningkatan_pendidikan')->name('table.usulan_peningkatan_pendidikan');


//ROUTE USULAN CUTI
Route::resource('/usulan_cuti', 'T_usulan_cutiController');
Route::post('usulan_cuti/update/{id}', 'T_usulan_cutiController@update')->name('update_data.usulan_cuti');
Route::get('/table/usulan_cuti/{id}/', 'T_usulan_cutiController@data_usulan_cuti')->name('table.usulan_cuti');
//ROUTE USULAN CUTI BIDANG
Route::get('/daftar_usulan_cuti', 'T_usulan_cutiController@index_daftar_usulan_cuti');
Route::get('/table/daftar_usulan_cuti/{id}/', 'T_usulan_cutiController@daftar_usulan_cuti');
Route::get('/verifikasi_daftar_usulan_cuti/{id}', 'T_usulan_cutiController@verifikasi_daftar_usulan')->name('data_usulan_cuti.verifikasi');
Route::post('usulan_cuti/update_create_verifikasi/{id}', 'T_usulan_cutiController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_cuti');


//ROUTE USULAN KARIS KARSU
Route::resource('/usulan_karis_karsu', 'T_usulan_karis_karsuController');
Route::post('usulan_karis_karsu/update/{id}', 'T_usulan_karis_karsuController@update')->name('update_data.usulan_karis_karsu');
Route::get('/table/usulan_karis_karsu/{id}/', 'T_usulan_karis_karsuController@data_usulan_karis_karsu')->name('table.usulan_karis_karsu');
//ROUTE USULAN KARIS KARSU BIDANG
Route::get('/daftar_usulan_karis_karsu', 'T_usulan_karis_karsuController@index_daftar_usulan_karis_karsu');
Route::get('/table/daftar_usulan_karis_karsu/{id}/', 'T_usulan_karis_karsuController@daftar_usulan_karis_karsu');
Route::get('/verifikasi_daftar_usulan_karis_karsu/{id}', 'T_usulan_karis_karsuController@verifikasi_daftar_usulan')->name('data_usulan_karis_karsu.verifikasi');
Route::post('usulan_karis_karsu/update_create_verifikasi/{id}', 'T_usulan_karis_karsuController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_karis_karsu');


//ROUTE USULAN KARPEG
Route::resource('/usulan_karpeg', 'T_usulan_karpegController');
Route::post('usulan_karpeg/update/{id}', 'T_usulan_karpegController@update')->name('update_data.usulan_karpeg');
Route::get('/table/usulan_karpeg/{id}/', 'T_usulan_karpegController@data_usulan_karpeg')->name('table.usulan_karpeg');
//ROUTE USULAN KARPEG BIDANG
Route::get('/daftar_usulan_karpeg', 'T_usulan_karpegController@index_daftar_usulan_karpeg');
Route::get('/table/daftar_usulan_karpeg/{id}/', 'T_usulan_karpegController@daftar_usulan_karpeg');
Route::get('/verifikasi_daftar_usulan_karpeg/{id}', 'T_usulan_karpegController@verifikasi_daftar_usulan')->name('data_usulan_karpeg.verifikasi');
Route::post('usulan_karpeg/update_create_verifikasi/{id}', 'T_usulan_karpegController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_karpeg');


//ROUTE USULAN TASPEN
Route::resource('/usulan_taspen', 'T_usulan_taspenController');
Route::post('usulan_taspen/update/{id}', 'T_usulan_taspenController@update')->name('update_data.usulan_taspen');
Route::get('/table/usulan_taspen/{id}/', 'T_usulan_taspenController@data_usulan_taspen')->name('table.usulan_taspen');
//ROUTE USULAN TASPEN BIDANG
Route::get('/daftar_usulan_taspen', 'T_usulan_taspenController@index_daftar_usulan_taspen');
Route::get('/table/daftar_usulan_taspen/{id}/', 'T_usulan_taspenController@daftar_usulan_taspen');
Route::get('/verifikasi_daftar_usulan_taspen/{id}', 'T_usulan_taspenController@verifikasi_daftar_usulan')->name('data_usulan_taspen.verifikasi');
Route::post('usulan_taspen/update_create_verifikasi/{id}', 'T_usulan_taspenController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_taspen');


//ROUTE USULAN UJIAN PI
Route::resource('/usulan_ujian_pi', 'T_usulan_ujian_piController');
Route::post('usulan_ujian_pi/update/{id}', 'T_usulan_ujian_piController@update')->name('update_data.usulan_ujian_pi');
Route::get('/table/usulan_ujian_pi/{id}/', 'T_usulan_ujian_piController@data_usulan_ujian_pi')->name('table.usulan_ujian_pi');
//ROUTE USULAN UJIAN PI BIDANG
Route::get('/daftar_usulan_ujian_pi', 'T_usulan_ujian_piController@index_daftar_usulan_ujian_pi');
Route::get('/table/daftar_usulan_ujian_pi/{id}/', 'T_usulan_ujian_piController@daftar_usulan_ujian_pi');
Route::get('/verifikasi_daftar_usulan_ujian_pi/{id}', 'T_usulan_ujian_piController@verifikasi_daftar_usulan')->name('data_usulan_ujian_pi.verifikasi');
Route::post('usulan_ujian_pi/update_create_verifikasi/{id}', 'T_usulan_ujian_piController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_ujian_pi');


//ROUTE USULAN PERBAIKAN DATA
Route::resource('/usulan_perbaikan_data', 'T_usulan_perbaikan_dataController');
Route::post('usulan_perbaikan_data/update/{id}', 'T_usulan_perbaikan_dataController@update')->name('update_data.usulan_perbaikan_data');
Route::get('/table/usulan_perbaikan_data/{id}/', 'T_usulan_perbaikan_dataController@data_usulan_perbaikan_data')->name('table.usulan_perbaikan_data');
//ROUTE USULAN PERBAIKAN DATA
Route::get('/daftar_usulan_perbaikan_data', 'T_usulan_perbaikan_dataController@index_daftar_usulan_perbaikan_data');
Route::get('/table/daftar_usulan_perbaikan_data/{id}/', 'T_usulan_perbaikan_dataController@daftar_usulan_perbaikan_data');
Route::get('/verifikasi_daftar_usulan_perbaikan_data/{id}', 'T_usulan_perbaikan_dataController@verifikasi_daftar_usulan')->name('data_usulan_perbaikan_data.verifikasi');
Route::post('usulan_perbaikan_data/update_create_verifikasi/{id}', 'T_usulan_perbaikan_dataController@update_create_verifikasi')->name('update_create.data_verifikasi_usulan_perbaikan_data');














//ROUTE KEHADIRAN
Route::resource('/kehadiran', 'T_kehadiran_PegawaiController');
Route::get('/table/kehadiran_pegawai/{id}', 'T_kehadiran_PegawaiController@data_kehadiran_pegawai')->name('table.kehadiran');


//ROUTE MUTASI
Route::resource('/mutasi', 'T_mutasiController');
Route::post('mutasi/update/{id}', 'T_mutasiController@update')->name('update_data.mutasi');
Route::get('/create_mutasi/{id}', 'T_mutasiController@create_mutasi')->name('create_data.mutasi');
Route::get('/table/mutasi/{id}', 'T_mutasiController@data_mutasi_pegawai')->name('table.mutasi');
Route::get('/download_file_sk_mutasi/{id}', 'T_mutasiController@download_file_sk_mutasi');

//ROUTE CUTI
Route::resource('/cuti', 'T_cuti_pegawaiController');
Route::post('mutasi/cuti/{id}', 'T_cuti_pegawaiController@update')->name('update_data.cuti');
Route::get('/create_cuti/{id}', 'T_cuti_pegawaiController@create_cuti')->name('create_data.cuti');
Route::get('/table/cuti/{id}', 'T_cuti_pegawaiController@data_cuti_pegawai')->name('table.cuti');
Route::get('/download_file_sk_cuti/{id}', 'T_cuti_pegawaiController@download_file_sk_cuti');

//ROUTE KGB
Route::resource('/kgb', 'T_kgb_pegawaiController');
Route::post('mutasi/kgb/{id}', 'T_kgb_pegawaiController@update')->name('update_data.kgb');
Route::get('/create_kgb/{id}', 'T_kgb_pegawaiController@create_kgb')->name('create_data.kgb');
Route::get('/table/kgb/{id}', 'T_kgb_pegawaiController@data_kgb_pegawai')->name('table.kgb');
Route::get('/download_file_sk_kgb/{id}', 'T_kgb_pegawaiController@download_file_sk_kgb');

//ROUTE TUGAS BELAJAR
Route::resource('/tugas_belajar', 'T_tugas_belajar_pegawaiController');
Route::post('mutasi/tugas_belajar/{id}', 'T_tugas_belajar_pegawaiController@update')->name('update_data.tugas_belajar');
Route::get('/create_tugas_belajar/{id}', 'T_tugas_belajar_pegawaiController@create_tugas_belajar')->name('create_data.tugas_belajar');
Route::get('/table/tugas_belajar/{id}', 'T_tugas_belajar_pegawaiController@data_tugas_belajar_pegawai')->name('table.tugas_belajar');
Route::get('/download_file_sk_tugas_belajar/{id}', 'T_tugas_belajar_pegawaiController@download');



Route::resource('/layanan_kenaikan_pangkat_opd', 'T_layanan_kpController');
Route::get('/table/layanan_kenaikan_pangkat_opd/{id}', 'T_layanan_kpController@daftar_kp_opd')->name('table.daftar_pegawai_kp_opd');


Route::get('daftar_nominatif_print/{id}', 'LaporanController@generate_daftar_nominatif')->name('nominatif_kp.print');
Route::get('daftar_duk_print', 'LaporanController@generate_duk')->name('duk.print');


//ROUTE USER
Route::resource('/user', 'UserController');
Route::get('/user/ubahpassword/{id}/', 'UserController@edit_passwords')->name('user.edit_password');
Route::put('/ubah_password_user/{id}/', 'UserController@update_passwords')->name('user.ubah_password');
Route::get('/table/user/app', 'UserController@data_user')->name('table.user');



//ROUTE MASTER JABATAN
Route::resource('m_jabatan', 'T_m_jabatanController');
Route::post('m_jabatan/update/{id}', 'T_m_jabatanController@update')->name('update_data.m_jabatan');
Route::get('/table/data/m_jabatan', 'T_m_jabatanController@data_m_jabatan')->name('table.m_jabatan');

//ROUTE MASTER UNIT KERJA
Route::resource('m_skpd', 'T_m_skpdController');
Route::post('m_skpd/update/{id}', 'T_m_skpdController@update')->name('update_data.m_skpd');
Route::get('/table/data/m_skpd', 'T_m_skpdController@data_m_skpd')->name('table.m_skpd');

//ROUTE MASTER UNOR
Route::resource('m_unor', 'T_m_unorController');
Route::post('store_bidang','T_m_unorController@store_bidang')->name('unor_bidang.store_bidang');
Route::post('store_subbidang/bidang','T_m_unorController@store_subbidang')->name('unor_subbidang.store_subbidang');
Route::get('/create_unor_bidang/{id}', 'T_m_unorController@create_bidang')->name('create_data.unor_bidang');
Route::get('/create_unor_subbidang/{id}', 'T_m_unorController@create_subbidang')->name('create_data.unor_subbidang');
Route::get('edit_bidang/{id}', 'T_m_unorController@edit_bidang')->name('edit_data.unor_bidang');
Route::post('update_bidang/update/{id}', 'T_m_unorController@update_bidang')->name('update_data.bidang');
Route::get('edit_subbidang/{id}', 'T_m_unorController@edit_subbidang')->name('edit_data.unor_subbidang');
Route::post('update_subbidang/update/{id}', 'T_m_unorController@update_subbidang')->name('update_data.subbidang');
Route::delete('hapus_subbidang/hapus/{id}', 'T_m_unorController@hapus_subbidang')->name('subbidang.hapus');


//ROUTE MASTER JENIS HD
Route::resource('/m_k_jenis_hd', 'T_m_k_jenis_hukumanController');
Route::get('/table/m_k_jenis_hd/data', 'T_m_k_jenis_hukumanController@data_m_k_jenis_hd')->name('table.m_k_jenis_hd');
Route::post('m_k_jenis_hd/update/{id}', 'T_m_k_jenis_hukumanController@update')->name('update_data.m_k_jenis_hd');

//ROUTE MASTER JENIS PELANGGARAN
Route::resource('/pelanggaran_hd', 'T_m_pelanggaran_hdController');
Route::get('/table/pelanggaran_hd/data', 'T_m_pelanggaran_hdController@data_pelanggaran_hd')->name('table.m_pelanggaran_hd');
Route::post('pelanggaran_hd/update/{id}', 'T_m_pelanggaran_hdController@update')->name('update_data.m_pelanggaran_hd');


//FORM IMPORT
Route::get('/import_data', 'LaporanController@form_import')->name('import_data.kehadiran');
Route::post('import', 'LaporanController@import')->name('import');


Route::get('/pegawai_hd', 'T_pegawaiController@index_hd');
Route::get('/table/pegawai2/data', 'T_pegawaiController@data_pegawai2')->name('table.pegawai2');



//ROUTE PANGGILAN
Route::resource('panggilan', 'T_panggilan_pegawaiController');
Route::post('panggilan/update/{id}', 'T_panggilan_pegawaiController@update')->name('update_data.panggilan');
Route::get('/table/panggilan/data', 'T_panggilan_pegawaiController@data_panggilan_pegawai')->name('table.panggilan_pegawai');
Route::get('/create_panggilan/{id}', 'T_panggilan_pegawaiController@create_panggilan')->name('create_data.panggilan');
Route::get('/table/panggilan_pemeriksaan/{id}', 'T_panggilan_pegawaiController@data_panggilan_pemeriksaan')->name('table.panggilan_pemeriksaan');


//ROUTE SK HUKUMAN DISIPLIN
Route::resource('sk_hd', 'T_sk_hd_pegawaiController');
Route::post('sk_hd/update/{id}', 'T_sk_hd_pegawaiController@update')->name('update_data.sk_hd');
Route::get('/table/sk_hd/data', 'T_sk_hd_pegawaiController@data_pegawai_sk_hd')->name('table.sk_hd');
Route::get('/create_sk_hd/{id}', 'T_sk_hd_pegawaiController@create_sk_hd')->name('create_data.sk_hd');
Route::get('/table/sk_hd/{id}', 'T_sk_hd_pegawaiController@data_sk_hd_pegawai')->name('table.sk_hd_pegawai');

Route::get('/detail_kehadiran/{id}/{id2}', 'T_kehadiran_PegawaiController@show');
Route::get('/table/detail_kehadiran/{id}/{id2}', 'T_kehadiran_PegawaiController@data_kehadiran_pegawai_show');
Route::get('/table/tk_pegawai/data_tk/', 'T_kehadiran_PegawaiController@data_tk_pegawai')->name('table.tk');
Route::get('/table_tk_panggilan/panggilan_pegawai/tk_panggilan/', 'T_kehadiran_PegawaiController@data_tk_panggilan')->name('table.tk_panggilan');

Route::get('/download/file/{id}/{id2}', 'T_kehadiran_PegawaiController@laporanExcel')->name('download.file');
