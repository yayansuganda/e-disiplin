<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_jabatan_pegawai;
use App\T_kgb_pegawai;
use App\T_nomor_usul;
use App\T_pegawai;
use App\T_prajabatan_cpns_pns;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class T_usulan_kgbController extends Controller
{

    public function create($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->pluck('t_pegawais.nama_pegawai', 't_pegawais.nip');

        $pangkat_golongan = DB::table("t_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');

        //$model = T_usulan_kenaikan_pangkat::where('id_layanan_kenaikan_pangkat', 6)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form', compact('model', 'pegawai','layanan_kp','pangkat_golongan','usulan_kp'));
    }


    public function store(Request $request)
    {

        $model = T_usulan_pegawai::create($request->all());
        return $model;
    }


    public function show($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();


        $model = new T_nomor_usul();
        $model2 = T_nomor_usul::where('nomor_usulan', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.form', compact('model', 'pegawai','model2'));
    }


    public function update_status($id)
    {
        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');
        $jenis_kp = DB::table("t_m_jenis_kps")->pluck('nama_m_jenis_kp', 'id_m_jenis_kp');
        $pangkat_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');

        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form3', compact('model','status_berkas','status_proses','jenis_kp','pangkat_golongan'));
    }


    public function edit($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.form', compact('model', 'pegawai'));
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


    public function data_usulan_kgb($id)
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
                    'model2' => "Daftar Usulan KGB",
                    'url_edit' => route('usulan_kgb.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_kgb.destroy', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    //UNTUK DAFTAR USULAN YANG TAMPIL DI BIDANG

    public function index_daftar_usulan_kgb()
    {
        $nama_skpd = T_usulan_pegawai::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulan_pegawais.id_m_skpd')
        ->groupBy('t_usulan_pegawais.id_m_skpd')
        ->pluck('t_m_skpds.nama_m_skpd', 't_m_skpds.id_m_skpd');

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.daftar_usulan_kgb', compact('nama_skpd'));
    }


    public function verifikasi_daftar_usulan($id)
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->join('t_pegawais','t_pegawais.nip','=','t_usulan_pegawais.nip')
                ->where('t_usulan_pegawais.id_usulan_pegawai', $id)->firstOrFail();

        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');


        $data_prajabatan = T_prajabatan_cpns_pns::where('nip', $model->nip)->firstOrFail();

        $sk_pangkat_golongan_terakhir = T_golongan_pegawai:: join(DB::raw('(select max(id_golongan_pegawai) as id_golongan_pegawai from t_golongan_pegawais group by nip)d'), function($join) {
                                            $join->on('t_golongan_pegawais.id_golongan_pegawai','=','d.id_golongan_pegawai')->groupBy('nip'); })
                                        ->where('t_golongan_pegawais.nip','=',$model->nip)
                                        ->first();

        $sk_jabatan_terakhir = T_jabatan_pegawai:: join(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by nip)d'), function($join) {
                                                $join->on('t_jabatan_pegawais.id_jabatan','=','d.id_jabatan')->groupBy('nip'); })
                                            ->where('t_jabatan_pegawais.nip','=',$model->nip)
                                            ->first();

        $sk_kgb_terakhir = T_kgb_pegawai:: join(DB::raw('(select max(id_kgb) as id_kgb from t_kgb_pegawais group by nip)d'), function($join) {
                                        $join->on('t_kgb_pegawais.id_kgb','=','d.id_kgb')->groupBy('nip'); })
                                    ->where('t_kgb_pegawais.nip','=',$model->nip)
                                    ->first();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.form_daftar_usulan_kgb', compact('status_berkas','status_proses','model', 'pegawai','data_prajabatan','sk_kgb_terakhir','sk_pangkat_golongan_terakhir','sk_jabatan_terakhir'));
    }


    public function show_file_preview(Request $request)
    {
        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_kgb.file_preview');
    }


    public function update_create_verifikasi_usulan_kgb(Request $request, $id)
    {
        if ($request->status_proses == "Selesai") {

            $path_sk_kgb = $request->file('path_sk_kgb');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'nama_golongan' => $request->nama_golongan,
                    'nama_pangkat' => $request->nama_pangkat,
                    'tmt_kgb' => $request->tmt_kgb,
                    'gaji_pokok' => $request->gaji_pokok,
                    'nomor_sk_kgb' => $request->nomor_sk_kgb,
                    'tanggal_sk_kgb' => $request->tanggal_sk_kgb,
                    'pejabat_penandatangan_kgb' => $request->pejabat_penandatangan_kgb
                ];

        if ($path_sk_kgb) {
            $nama_file_sk_kgb = 'KGB '.$request->tmt_kgb.'.'.$path_sk_kgb->getClientOriginalExtension();
            $file_sk_kgb = Storage::putFileAs('public/'.$paths, $path_sk_kgb, $nama_file_sk_kgb);
            $data['nama_file_sk_kgb'] = $nama_file_sk_kgb;
            $data['path_sk_kgb'] = $file_sk_kgb;
        }

        T_kgb_pegawai::create($data);

        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
        $model->update(['status_proses' => $request->status_proses,
                        'status_berkas' => $request->status_berkas,
                        'keterangan' => $request->keterangan]);

        } else {

        $model = T_usulan_pegawai::where('id_usulan_pegawai', $id)->firstOrFail();
        $model->update(['status_proses' => $request->status_proses,
                        'status_berkas' => $request->status_berkas,
                        'keterangan' => $request->keterangan]);
        }


    }



    public function daftar_usulan_kgb(Request $request, $id)
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
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Gaji Berkala')
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
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Gaji Berkala')
            ->get();
        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action5', [
                    'model2' => "Verifikasi Berkas Usulan KGB",
                    'url_edit' => route('data_usulan_kgb.verifikasi', $model->id_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

}
