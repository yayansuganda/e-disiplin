<?php

namespace App\Http\Controllers;

use App\T_keluarga_kandung_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_keluarga_kandungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('t_views.t_keluarga_kandung_pegawai.keluarga_kandung');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_keluarga_kandung($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $hubungan_keluarga = DB::table("t_m_hubungan_keluargas")->pluck('nama_m_hubungan_keluarga', 'id_m_hubungan_keluarga');
        $tempat_lahir = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'id_kabupaten');

        $model = new T_keluarga_kandung_pegawai();
        $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        return view('t_views.t_keluarga_kandung_pegawai.form', compact('model', 'model2', 'pegawai', 'hubungan_keluarga', 'tempat_lahir'));
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
            'nama_keluarga' => 'required|string|max:255',
            'id_m_hubungan_keluarga' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'status_hidup' => 'required|string|max:255'
        ]);

        $model = T_keluarga_kandung_pegawai::create($request->all());
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
        $model = T_keluarga_kandung_pegawai::join('t_m_hubungan_keluargas','t_m_hubungan_keluargas.id_m_hubungan_keluarga','=','t_keluarga_kandung_pegawais.id_m_hubungan_keluarga')
        ->where('t_keluarga_kandung_pegawais.nip','=',$id)->get();
        return view('t_views.t_keluarga_kandung_pegawai.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_keluarga_kandung)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $hubungan_keluarga = DB::table("t_m_hubungan_keluargas")->pluck('nama_m_hubungan_keluarga', 'id_m_hubungan_keluarga');
        $tempat_lahir = DB::table("t_m_kabupatens")->pluck('nama_kabupaten', 'id_kabupaten');

        $model = T_keluarga_kandung_pegawai::where('id_keluarga_kandung', $id_keluarga_kandung)->firstOrFail();

        return view('t_views.t_keluarga_kandung_pegawai.form', compact('model', 'pegawai', 'hubungan_keluarga', 'tempat_lahir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_keluarga_kandung)
    {
        $model = T_keluarga_kandung_pegawai::where('id_keluarga_kandung', $id_keluarga_kandung)->firstOrFail();
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_keluarga_kandung)
    {
        T_keluarga_kandung_pegawai::destroy($id_keluarga_kandung);
    }

    public function data_keluarga_kandung_pegawai(Request $request, $id)
    {
        $model =  T_keluarga_kandung_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_keluarga_kandung_pegawais.nip')
            ->join('t_m_hubungan_keluargas', 't_m_hubungan_keluargas.id_m_hubungan_keluarga', '=', 't_keluarga_kandung_pegawais.id_m_hubungan_keluarga')
            ->join('t_m_kabupatens', 't_m_kabupatens.id_kabupaten', '=', 't_keluarga_kandung_pegawais.tempat_lahir')
            ->where('t_keluarga_kandung_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Keluarga",
                    'url_edit' => route('keluarga_kandung.edit', $model->id_keluarga_kandung),
                    'url_destroy' => route('keluarga_kandung.destroy', $model->id_keluarga_kandung)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
