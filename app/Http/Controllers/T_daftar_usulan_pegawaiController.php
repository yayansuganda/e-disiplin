<?php

namespace App\Http\Controllers;

use App\T_daftar_usulan_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_daftar_usulan_pegawaiController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = T_pegawai::join('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
        ->where('t_jabatan_pegawais.id_m_skpd','=',auth()->user()->id_m_skpd)
        ->pluck('nama_pegawai', 'nip');

        $model = new T_daftar_usulan_pegawai();
        return view('t_views.t_daftar_usulan_pegawai.form', compact('model', 'pegawai'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255'
        ]);

        $model = T_daftar_usulan_pegawai::create($request->all());
        return $model;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anak)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_anak)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_daftar_usulan_pegawai)
    {
        T_anak_pegawai::destroy($id_daftar_usulan_pegawai);
    }

    public function data_daftar_usulan_pegawai(Request $request)
    {
        $hasil = Request::segment(2);
        $model =  T_daftar_usulan_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_daftar_usulan_pegawais.nip')
            ->join('t_usulan_pegawais', 't_usulan_pegawais.id_usulan_pegawai', '=', 't_daftar_usulan_pegawais.id_usulan_pegawai')
            ->where('t_daftar_usulan_pegawais.id_usulan_pegawai','=',4)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Daftar Nama Usulan Pegawai",
                    'url_show' => route('daftar_usulan_pegawai.show', $model->id_daftar_usulan_pegawai),
                    'url_edit' => route('daftar_usulan_pegawai.edit', $model->id_daftar_usulan_pegawai),
                    'url_destroy' => route('daftar_usulan_pegawai.destroy', $model->id_daftar_usulan_pegawai)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
