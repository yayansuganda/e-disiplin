<?php

namespace App\Http\Controllers;

use App\T_m_skpd;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class T_m_skpdController extends Controller
{
    public function index()
    {
        return view('t_master.t_m_skpd.m_skpd');
    }


    public function create()
    {
        $model = new T_m_skpd();

        return view('t_master.t_m_skpd.form', compact('model'));
    }



    public function store(Request $request)
    {
        $model = T_m_skpd::create($request->all());
        return $model;
    }



    public function edit($id)
    {

        $model = T_m_skpd::where('id_m_skpd', $id)->firstOrFail();

        return view('t_master.t_m_skpd.form', compact('model'));
    }



    public function update(Request $request, $id)
    {
        $model = T_m_skpd::where('id_m_skpd', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_m_skpd::destroy($id);
    }

    public function data_m_skpd(Request $request)
    {
        $model =  T_m_skpd::all();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Master Unit Kerja",
                    'url_edit' => route('m_skpd.edit', $model->id_m_skpd),
                    'url_destroy' => route('m_skpd.destroy', $model->id_m_skpd)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
