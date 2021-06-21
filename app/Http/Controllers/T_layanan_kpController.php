<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_usulan_kenaikan_pangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class T_layanan_kpController extends Controller
{

    public function index()
    {
        $nama_skpd = T_usulan_kenaikan_pangkat::join('t_m_skpds','t_m_skpds.id_m_skpd','=','t_usulan_kenaikan_pangkats.id_m_skpd')
        ->groupBy('t_usulan_kenaikan_pangkats.id_m_skpd')
        ->pluck('t_m_skpds.nama_m_skpd', 't_m_skpds.id_m_skpd');

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.usulan_kp', compact('nama_skpd'));

    }



    public function edit($id)
    {
        $status_berkas = DB::table("t_m_status_berkas")->pluck('nama_m_status_berkas', 'id_m_status_berkas');
        $status_proses = DB::table("t_m_status_proses")->pluck('nama_m_status_proses', 'id_m_status_proses');
        $jenis_kp = DB::table("t_m_jenis_kps")->pluck('nama_m_jenis_kp', 'id_m_jenis_kp');
        $pangkat_golongan = DB::table("t_m_pangkat_golongans")->pluck('nama_golongan', 'id_m_pangkat_golongan');

        $model = T_usulan_kenaikan_pangkat::where('id_layanan_kenaikan_pangkat', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_usulan_kp.form3', compact('model','status_berkas','status_proses','jenis_kp','pangkat_golongan'));


    }


    public function update(Request $request, $id)
    {
        if ($request->status_proses == "Selesai") {

        $path_sk_kenaikan_pangkat = $request->file('path_sk_kenaikan_pangkat');

        $paths = $request->nip;

        $data = [
                    'nip' => $paths,
                    'id_m_pangkat_golongan' => $request->id_m_pangkat_golongan,
                    'nomor_sk' => $request->nomor_sk,
                    'tanggal_sk' => $request->tanggal_sk,
                    'tmt_golongan' => $request->tmt_golongan,
                    'nomor_bkn' => $request->nomor_bkn,
                    'tanggal_bkn' => $request->tanggal_bkn
                ];

        if ($path_sk_kenaikan_pangkat) {
            $nama_file_sk_kenaikan_pangkat = 'SK PANGKAT_GOLONGAN_'.$request->tmt_golongan.'.'.$path_sk_kenaikan_pangkat->getClientOriginalExtension();
            $file_kenaikan_pangkat = Storage::putFileAs('public/'.$paths, $path_sk_kenaikan_pangkat, $nama_file_sk_kenaikan_pangkat);
            $data['nama_file_sk_kenaikan_pangkat'] = $nama_file_sk_kenaikan_pangkat;
            $data['path_sk_kenaikan_pangkat'] = $file_kenaikan_pangkat;
        }

            $model2 = T_usulan_kenaikan_pangkat::where('id_layanan_kenaikan_pangkat', $id)->firstOrFail();
            $model2->update($request->all());

            $model = T_golongan_pegawai::create($data);
            return $model;

        } else {
            $model = T_usulan_kenaikan_pangkat::where('id_layanan_kenaikan_pangkat', $id)->firstOrFail();
            $model->update($request->all());
        }


    }


    public function destroy($id_keluarga_kandung)
    {
        T_keluarga_kandung_pegawai::destroy($id_keluarga_kandung);
    }


    public function daftar_kp_opd($id)
    {
        $model =  T_usulan_kenaikan_pangkat::select('*')
            ->join('t_usulans', 't_usulans.id_usulan', '=', 't_usulan_kenaikan_pangkats.id_usulan')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_usulan_kenaikan_pangkats.nip')
            ->join('t_m_layanan_kenaikan_pangkats', 't_m_layanan_kenaikan_pangkats.id_m_layanan_kenaikan_pangkat', '=', 't_usulan_kenaikan_pangkats.id_m_layanan_kenaikan_pangkat')
            ->join('t_m_pangkat_golongans', 't_m_pangkat_golongans.id_m_pangkat_golongan', '=', 't_usulan_kenaikan_pangkats.id_m_pangkat_golongan')
            ->where('t_usulan_kenaikan_pangkats.id_m_skpd','=',$id)
            ->where('t_usulan_kenaikan_pangkats.status_berkas','<>','Memenuhi Syarat (MS)')
            ->where('t_usulans.kategori_nomor_usulan','=','Usulan Kenaikan Pangkat')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action5', [
                    'model2' => "Verifikasi Berkas Usulan Kenaikan Pangkat",
                    'url_edit' => route('layanan_kenaikan_pangkat_opd.edit', $model->id_layanan_kenaikan_pangkat)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }






}
