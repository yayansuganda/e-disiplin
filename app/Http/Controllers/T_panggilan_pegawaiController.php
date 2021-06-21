<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_panggilan_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_panggilan_pegawaiController extends Controller
{
    public function index()
    {
        return view('t_views.t_panggilan_pegawai.panggilan_pegawai');
    }

    public function create_panggilan($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $m_ruang_golongan = DB::table("t_m_ruang_golongans")->pluck('nama_m_ruang_golongan', 'id_m_ruang_golongan');


        $model2 = T_pegawai::select('nip','nama_pegawai')->where('nip', $id)->firstOrFail();


        $model = new T_panggilan_pegawai();

        return view('t_views.t_panggilan_pegawai.form', compact('model','model2', 'pegawai', 'm_ruang_golongan'));
    }



    public function store(Request $request)
    {
        $model = T_panggilan_pegawai::create($request->all());
        return $model;
    }



    public function edit($id)
    {


        $model = T_panggilan_pegawai::where('id_panggilan', $id)->firstOrFail();

        $model2 = T_pegawai::select('nip','nama_pegawai')->where('nip', $model->nip_periksa)->firstOrFail();

        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        return view('t_views.t_panggilan_pegawai.form', compact('model','model2','pegawai'));

    }



    public function update(Request $request, $id)
    {
        $model = T_panggilan_pegawai::where('id_panggilan', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_panggilan_pegawai::destroy($id);
    }


    public function data_panggilan_pegawai(Request $request)
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
                    'model2' => "Data Panggilan Pegawai",
                    'url_show' => route('create_data.panggilan', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }



    public function data_panggilan_pemeriksaan(Request $request, $id)
    {
        $model =  T_panggilan_pegawai::where('t_panggilan_pegawais.nip_periksa','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                    return view('layouts._action2', [
                        'model' => $model,
                        'model2' => "Data Panggilan Pegawai",
                        'url_edit' => route('panggilan.edit', $model->id_panggilan),
                        'url_destroy' => route('panggilan.destroy', $model->id_panggilan)
                    ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

}
