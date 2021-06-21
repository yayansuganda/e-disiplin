<?php

namespace App\Http\Controllers;

use App\T_m_jenis_pelanggaran_hd;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class T_m_pelanggaran_hdController extends Controller
{
    public function index()
    {
        return view('t_master.t_m_pelanggaran_hd.m_pelanggaran_hd');
    }


    public function create()
    {

        $model = new T_m_jenis_pelanggaran_hd();

        return view('t_master.t_m_pelanggaran_hd.form', compact('model'));
    }



    public function store(Request $request)
    {
        $model = T_m_jenis_pelanggaran_hd::create($request->all());
        return $model;
    }



    public function edit($id)
    {

        $model = T_m_jenis_pelanggaran_hd::where('id_m_jenis_pelanggaran_hd', $id)->firstOrFail();

        return view('t_master.t_m_pelanggaran_hd.form', compact('model'));
    }



    public function update(Request $request, $id)
    {
        $model = T_m_jenis_pelanggaran_hd::where('id_m_jenis_pelanggaran_hd', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_m_jenis_pelanggaran_hd::destroy($id);
    }

    public function data_pelanggaran_hd(Request $request)
    {
        $model =  T_m_jenis_pelanggaran_hd::all();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Pelanggaran Hukuman Disiplin",
                    'url_edit' => route('pelanggaran_hd.edit', $model->id_m_jenis_pelanggaran_hd),
                    'url_destroy' => route('pelanggaran_hd.destroy', $model->id_m_jenis_pelanggaran_hd)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
