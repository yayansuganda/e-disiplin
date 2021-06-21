<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_jabatan_pegawai;
use App\T_kgb_pegawai;
use App\T_nomor_usul;
use App\T_pegawai;
use App\T_pensiun_pegawai;
use App\T_prajabatan_cpns_pns;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_usulan_pensiunController extends Controller
{
    public function data_usulan_pensiun($id)
    {
        $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->where('t_usulans.nomor_usulan','=',$id)
            ->where('t_usulan_pegawais.status_berkas','=','Usulan')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Daftar Usulan Pensiun",
                    'url_edit' => route('usulan_pensiun.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_pensiun.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function show($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();


        $model = new T_nomor_usul();
        $model2 = T_nomor_usul::where('nomor_usulan', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_pensiun.form', compact('model', 'pegawai','model2'));
    }


    public function store(Request $request)
    {

        $model = T_usulan_pegawai::create($request->all());
        return $model;
    }

    public function edit($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_pensiun.form', compact('model', 'pegawai'));
    }


    public function update(Request $request, $id)
    {
        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();

        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_usulan_pegawai::destroy($id);
    }




     //UNTUK DAFTAR USULAN YANG TAMPIL DI BIDANG
     public function index_daftar_usulan_pensiun()
     {
         $nama_skpd = T_usulan_pegawai::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulan_pegawais.id_m_skpd')
         ->groupBy('t_usulan_pegawais.id_m_skpd')
         ->pluck('t_m_skpds.nama_m_skpd', 't_m_skpds.id_m_skpd');

         return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_pensiun.daftar_usulan_pensiun', compact('nama_skpd'));
     }


    public function daftar_usulan_pensiun($id)
    {
        if ($id == 0) {
            $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_skpds', 't_m_skpds.id_m_skpd', '=', 't_usulan_pegawais.id_m_skpd')
            ->where(function ($query) {
                    $query->where('t_usulan_pegawais.status_berkas','=','Memenuhi Syarat (MS)')
                          ->orWhere('t_usulan_pegawais.status_berkas','=','Usulan')
                          ->orWhere('t_usulan_pegawais.status_berkas','=','');
                 })
            ->Where('t_usulan_pegawais.status_proses','<>','Selesai')
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Pensiun')
            ->get();
        } else {

            $model =  T_usulan_pegawai::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_pegawais.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_pegawais.nip')
            ->join('t_m_skpds', 't_m_skpds.id_m_skpd', '=', 't_usulan_pegawais.id_m_skpd')
            ->where('t_usulan_pegawais.id_m_skpd','=',$id)
            ->where(function ($query) {
                $query->where('t_usulan_pegawais.status_berkas','=','Memenuhi Syarat (MS)')
                      ->orWhere('t_usulan_pegawais.status_berkas','=','Usulan')
                      ->orWhere('t_usulan_pegawais.status_berkas','=','');
             })
            ->Where('t_usulan_pegawais.status_proses','<>','Selesai')
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Pensiun')
            ->get();
        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action5', [
                    'model2' => "Verifikasi Berkas Usulan Pensiun",
                    'url_edit' => route('data_usulan_pensiun.verifikasi', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function verifikasi_daftar_usulan($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->join('t_pegawais','t_pegawais.nip','=','t_usulan_pegawais.nip')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');

        $nama_subbidang = DB::table("t_m_skpd_subbidangs")->pluck('nama_m_skpd_subbidang', 'id_m_skpd_subbidang');


        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');


        $data_prajabatan = T_prajabatan_cpns_pns::where('nip', $model->nip)->firstOrFail();

        $data_pegawai = T_pegawai::where('nip', $model->nip)->firstOrFail();

        $sk_pangkat_golongan_terakhir = T_golongan_pegawai:: join(DB::raw('(select max(id_golongan_pegawai) as id_golongan_pegawai from t_golongan_pegawais group by nip)d'), function($join) {
                                            $join->on('t_golongan_pegawais.id_golongan_pegawai','=','d.id_golongan_pegawai')->groupBy('nip'); })
                                        ->where('t_golongan_pegawais.nip','=',$model->nip)
                                        ->first();

        $sk_jabatan_terakhir = T_jabatan_pegawai::join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by nip)d'), function($join) {
                                    $join->on('t_jabatan_pegawais.id_jabatan','=','d.id_jabatan')->groupBy('nip'); })
                                ->join('t_m_jabatans','t_m_jabatans.id_m_jabatan','=','t_jabatan_pegawais.id_m_jabatan')
                                ->where('t_jabatan_pegawais.nip','=',$model->nip)
                                ->first();

        $sk_kgb_terakhir = T_kgb_pegawai:: join(DB::raw('(select max(id_kgb) as id_kgb from t_kgb_pegawais group by nip)d'), function($join) {
                                    $join->on('t_kgb_pegawais.id_kgb','=','d.id_kgb')->groupBy('nip'); })
                                ->where('t_kgb_pegawais.nip','=',$model->nip)
                                ->first();


        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_pensiun.form_daftar_usulan_pensiun', compact('nama_subbidang','status_berkas','status_proses','model', 'pegawai','data_prajabatan','jenis_jabatan','sk_pangkat_golongan_terakhir','sk_jabatan_terakhir','sk_kgb_terakhir','data_pegawai'));
    }


    public function update_create_verifikasi(Request $request, $id)
    {
        if ($request->status_proses == "Selesai") {

            $this->validate($request, [
                'nip' => 'required|string|max:255',
                'jenis_pensiun' => 'required',
            ]);

            $path_sk_pensiun = $request->file('path_sk_pensiun');
            $paths = $request->nip;

            $data = [
                        'nip' => $paths,
                        'jenis_pensiun' => $request->jenis_pensiun,
                        'nama_pangkat' => $request->nama_pangkat,
                        'nama_golongan' => $request->nama_golongan,
                        'nama_jabatan' => $request->nama_jabatan,
                        'tanggal_pensiun' => $request->tanggal_pensiun
                    ];


            if ($path_sk_pensiun) {
                $nama_file_sk_pensiun = 'SK PENSIUN '.$request->tanggal_pensiun.'.'.$path_sk_pensiun->getClientOriginalExtension();
                $sk_pensiun = Storage::putFileAs('public/'.$paths, $path_sk_pensiun, $nama_file_sk_pensiun);
                $data['nama_file_sk_pensiun'] = $nama_file_sk_pensiun;
                $data['path_sk_pensiun'] = $sk_pensiun;
            }

            T_pensiun_pegawai::create($data);

            $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
            $model->update($request->all());


        } else {

            $data2 = [
                'status_proses' => $request->status_proses,
                'status_berkas' => $request->status_berkas,
                'keterangan' => $request->keterangan
            ];

            $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
            $model->update($data2);
        }


    }



}
