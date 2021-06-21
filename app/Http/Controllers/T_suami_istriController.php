<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use App\T_suami_istri_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_suami_istriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('t_views.t_suami_istri_pegawai.suami_istri');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_suami_istri($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = new T_suami_istri_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_suami_istri_pegawai.form', compact('model', 'model2', 'pegawai'));
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
            'nip' => 'required|string|max:255',
            'nama_suami_istri' => 'required|string|max:255',
            'status_pns' => 'required',
            'tanggal_menikah' => 'required|string|max:255',
            'nomor_kartu_su_is' => 'required|string|max:255'
        ]);

        $model = T_suami_istri_pegawai::create($request->all());
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
        $model = T_suami_istri_pegawai::where('nip','=',$id)->get();
        return view('t_views.t_suami_istri_pegawai.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_suami_istri)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_suami_istri_pegawai::where('id_suami_istri', $id_suami_istri)->firstOrFail();

        return view('t_views.t_suami_istri_pegawai.form', compact('model', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_suami_istri)
    {
        $model = T_suami_istri_pegawai::where('id_suami_istri', $id_suami_istri)->firstOrFail();
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_suami_istri)
    {
        T_suami_istri_pegawai::destroy($id_suami_istri);
    }

    public function data_suami_istri_pegawai(Request $request, $id)
    {
        $model =  T_suami_istri_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_suami_istri_pegawais.nip')
            ->where('t_suami_istri_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Suami/Istri Pegawai",
                    'url_show' => route('suami_istri.show', $model->id_suami_istri),
                    'url_edit' => route('suami_istri.edit', $model->id_suami_istri),
                    'url_destroy' => route('suami_istri.destroy', $model->id_suami_istri)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
