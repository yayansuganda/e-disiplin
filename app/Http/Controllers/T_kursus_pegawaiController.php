<?php

namespace App\Http\Controllers;

use App\T_kursus_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_kursus_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('t_views.t_kursus_pegawai.kursus');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_kursus($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = new T_kursus_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_kursus_pegawai.form', compact('model','model2', 'pegawai'));
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
            'nama_kursus' => 'required|string|max:255',
            'alamat_kursus' => 'required|string|max:255',
            'tanggal_mulai' => 'required|string|max:255',
            'tanggal_selesai' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255'
        ]);

        $model = T_kursus_pegawai::create($request->all());
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
    public function edit($id_kursus)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_kursus_pegawai::where('id_kursus', $id_kursus)->firstOrFail();

        return view('t_views.t_kursus_pegawai.form', compact('model', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kursus)
    {
        $model = T_kursus_pegawai::where('id_kursus', $id_kursus)->firstOrFail();
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kursus)
    {
        T_kursus_pegawai::destroy($id_kursus);
    }

    public function data_kursus_pegawai(Request $request,$id)
    {
        $model =  T_kursus_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_kursus_pegawais.nip')
            ->where('t_kursus_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Kursus Pegawai",
                    'url_show' => route('kursus.show', $model->id_kursus),
                    'url_edit' => route('kursus.edit', $model->id_kursus),
                    'url_destroy' => route('kursus.destroy', $model->id_kursus)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
