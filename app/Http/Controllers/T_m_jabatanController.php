<?php

namespace App\Http\Controllers;

use App\T_m_jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class T_m_jabatanController extends Controller
{

    public function index()
    {
        return view('t_master.t_m_jabatan.m_jabatan');
    }


    public function create()
    {
        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');

        $model = new T_m_jabatan();

        return view('t_master.t_m_jabatan.form', compact('model', 'jenis_jabatan'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'id_m_jenis_jabatan' => 'required',
            'nama_m_jabatan' => 'required|string|max:255'

        ]);

        $model = T_m_jabatan::create($request->all());
        return $model;
    }



    public function edit($id)
    {
        $jenis_jabatan = DB::table("t_m_jenis_jabatans")->pluck('nama_m_jenis_jabatan', 'id_m_jenis_jabatan');

        $model = T_m_jabatan::where('id_m_jabatan', $id)->firstOrFail();

        return view('t_master.t_m_jabatan.form', compact('model', 'jenis_jabatan'));
    }



    public function update(Request $request, $id)
    {
        $model = T_m_jabatan::where('id_m_jabatan', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_m_jabatan::destroy($id);
    }

    public function data_m_jabatan(Request $request)
    {
        $model =  T_m_jabatan::select('*')
            ->join('t_m_jenis_jabatans', 't_m_jenis_jabatans.id_m_jenis_jabatan', '=', 't_m_jabatans.id_m_jenis_jabatan')            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data M Jabatan",
                    'url_edit' => route('m_jabatan.edit', $model->id_m_jabatan),
                    'url_destroy' => route('m_jabatan.destroy', $model->id_m_jabatan)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
