<?php

namespace App\Http\Controllers;

use App\T_m_k_jenis_hukuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_m_k_jenis_hukumanController extends Controller
{
    public function index()
    {
        return view('t_master.t_m_k_jenis_hd.m_k_jenis_hd');
    }


    public function create()
    {
        $jenis_hd = DB::table("t_m_jenis_hukumen")->pluck('nama_m_jenis_hd', 'id_m_jenis_hd');

        $model = new T_m_k_jenis_hukuman();

        return view('t_master.t_m_k_jenis_hd.form', compact('model','jenis_hd'));
    }



    public function store(Request $request)
    {
        $model = T_m_k_jenis_hukuman::create($request->all());
        return $model;
    }



    public function edit($id)
    {
        $jenis_hd = DB::table("t_m_jenis_hukumen")->pluck('nama_m_jenis_hd', 'id_m_jenis_hd');


        $model = T_m_k_jenis_hukuman::where('id_k_jenis_hd', $id)->firstOrFail();

        return view('t_master.t_m_k_jenis_hd.form', compact('model','jenis_hd'));
    }



    public function update(Request $request, $id)
    {
        $model = T_m_k_jenis_hukuman::where('id_k_jenis_hd', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_m_k_jenis_hukuman::destroy($id);
    }

    public function data_m_k_jenis_hd(Request $request)
    {
        $model =  T_m_k_jenis_hukuman::join('t_m_jenis_hukumen','t_m_jenis_hukumen.id_m_jenis_hd','=','t_k_jenis_hukumen.id_m_jenis_hd')->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Jenis Hukuman Disiplin",
                    'url_edit' => route('m_k_jenis_hd.edit', $model->id_k_jenis_hd),
                    'url_destroy' => route('m_k_jenis_hd.destroy', $model->id_k_jenis_hd)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
