<?php

namespace App\Http\Controllers;

use App\T_anak_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_anak_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('t_views.t_anak_pegawai.anak');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_anak($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $tempat_lahir = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'id_kabupaten');

        $model = new T_anak_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_anak_pegawai.form', compact('model', 'model2', 'pegawai', 'tempat_lahir'));
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
            'nama_anak' => 'required|string|max:255',
            'jenis_kelamin_anak' => 'required',
            'tempat_lahir_anak' => 'required',
            'tanggal_lahir_anak' => 'required|string|max:255',
            'status_anak' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255'

        ]);

        $model = T_anak_pegawai::create($request->all());
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
        $model = T_anak_pegawai::where('nip','=',$id)->get();
        return view('t_views.t_anak_pegawai.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anak)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $tempat_lahir = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'id_kabupaten');

        $model = T_anak_pegawai::where('id_anak', $id_anak)->firstOrFail();

        return view('t_views.t_anak_pegawai.form', compact('model', 'pegawai', 'tempat_lahir'));
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
        $model = T_anak_pegawai::where('id_anak', $id_anak)->firstOrFail();
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_anak)
    {
        T_anak_pegawai::destroy($id_anak);
    }

    public function data_anak_pegawai(Request $request, $id)
    {
        $model =  T_anak_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_anak_pegawais.nip')
            ->join('t_m_kabupatens', 't_m_kabupatens.id_kabupaten', '=', 't_anak_pegawais.tempat_lahir_anak')
            ->where('t_anak_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Anak Pegawai",
                    'url_show' => route('anak.show', $model->nip),
                    'url_edit' => route('anak.edit', $model->id_anak),
                    'url_destroy' => route('anak.destroy', $model->id_anak)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
