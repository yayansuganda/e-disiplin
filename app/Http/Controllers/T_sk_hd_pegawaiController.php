<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use App\T_sk_hd_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_sk_hd_pegawaiController extends Controller
{
    public function index()
    {
        return view('t_views.t_sk_hd.sk_hd');
    }

    public function create_sk_hd($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $m_ruang_golongan = DB::table("t_m_ruang_golongans")->pluck('nama_m_ruang_golongan', 'id_m_ruang_golongan');


        $model2 = T_pegawai::select('nip','nama_pegawai')->where('nip', $id)->firstOrFail();


        $model = new T_sk_hd_pegawai();

        return view('t_views.t_sk_hd.form', compact('model','model2', 'pegawai', 'm_ruang_golongan'));
    }



    public function store(Request $request)
    {
        $model = T_sk_hd_pegawai::create($request->all());
        return $model;
    }



    public function edit($id)
    {


        $model = T_sk_hd_pegawai::where('id_sk_hd', $id)->firstOrFail();

        $model2 = T_pegawai::select('nip','nama_pegawai')->where('nip', $model->nip_pelanggar)->firstOrFail();

        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        return view('t_views.t_sk_hd.form', compact('model','model2','pegawai'));

    }



    public function update(Request $request, $id)
    {
        $model = T_sk_hd_pegawai::where('id_sk', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_sk_hd_pegawai::destroy($id);
    }


    public function data_pegawai_sk_hd(Request $request)
    {
        if (auth()->user()->id_role == 1 ) {
            $model = T_pegawai::leftjoin('t_m_agamas','t_m_agamas.id_m_agama','=','t_pegawais.id_m_agama')
                ->leftjoin('t_m_pernikahans','t_m_pernikahans.id_m_pernikahan','=','t_pegawais.id_m_pernikahan')
                ->get();
        } else {

            $model = T_pegawai::select('*')
                ->leftjoin('t_m_agamas','t_m_agamas.id_m_agama','=','t_pegawais.id_m_agama')
                ->leftjoin('t_m_pernikahans','t_m_pernikahans.id_m_pernikahan','=','t_pegawais.id_m_pernikahan')
                ->join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                ->leftjoin(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                    $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                ->where('t_jabatan_pegawais.nama_m_skpd','=',auth()->user()->skpd->nama_m_skpd)
                ->orderBy('t_pegawais.nama_pegawai', 'desc')
                ->get();

        }

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action3', [
                    'model' => $model,
                    'model2' => "Data SK Hukuman Disiplin",
                    'url_show' => route('create_data.sk_hd', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }



    public function data_sk_hd_pegawai(Request $request, $id)
    {
        $model =  T_sk_hd_pegawai::where('nip_pelanggar','=',$id)->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                    return view('layouts._action2', [
                        'model' => $model,
                        'model2' => "Data SK Hukuman Disiplin",
                        'url_edit' => route('sk_hd.edit', $model->id_sk),
                        'url_destroy' => route('sk_hd.destroy', $model->id_sk)
                    ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
