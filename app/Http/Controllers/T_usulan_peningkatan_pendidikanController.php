<?php

namespace App\Http\Controllers;

use App\T_nomor_usul;
use App\T_pegawai;
use App\T_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class T_usulan_peningkatan_pendidikanController extends Controller
{
    public function data_usulan_peningkatan_pendidikan($id)
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
                    'model2' => "Daftar Usulan Peningkatan Pendidikan",
                    'url_edit' => route('usulan_peningkatan_pendidikan.edit', $model->id_usulan_pegawai),
                    'url_destroy' => route('usulan_peningkatan_pendidikan.destroy', $model->id_usulan_pegawai)
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

        $tingkat_pendidikan = DB::table("t_m_tingkat_pendidikans")->get();

        $model = new T_nomor_usul();
        $model2 = T_nomor_usul::where('nomor_usulan', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_peningkatan_pendidikan.form', compact('tingkat_pendidikan','model', 'pegawai','model2'));
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

        $tingkat_pendidikan = DB::table("t_m_tingkat_pendidikans")->get();

        $model = T_usulan_pegawai::join('t_usulans','t_usulans.id_usulan','=','t_usulan_pegawais.id_usulan')
                ->where('id_usulan_pegawai', $id)->firstOrFail();

        return view('t_views.t_usulan_pegawai.daftar_layanan_usulan.layanan_peningkatan_pendidikan.form', compact('tingkat_pendidikan','model', 'pegawai'));
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

}
