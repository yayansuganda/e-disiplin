<?php

namespace App\Http\Controllers;

use App\T_golongan_pegawai;
use App\T_hukuman_pegawai;
use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class T_hukuman_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('t_views.t_hukuman_pegawai.hukuman');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_h_disiplin($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $jenis_hd = DB::table("t_m_jenis_hukumen")->pluck('nama_m_jenis_hd', 'id_m_jenis_hd');
        $jenis_pelanggaran_hd = DB::table("t_m_jenis_pelanggaran_hds")->pluck('nama_m_jenis_pelanggaran_hd', 'id_m_jenis_pelanggaran_hd');
        
        $pangkat_golongan = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
            ->join(DB::raw('(select max(id_m_pangkat_golongan) as id_m_pangkat_golongan from t_golongan_pegawais group by nip)c'), function($join) {
            $join->on('t_golongan_pegawais.id_m_pangkat_golongan','=','c.id_m_pangkat_golongan');})
            ->where('t_golongan_pegawais.nip','=',$id)->firstOrFail();
            $model2 = T_pegawai::select('nip')->where('nip', $id)->firstOrFail();

        $model = new T_hukuman_pegawai();
        return view('t_views.t_hukuman_pegawai.form', compact('model','model2', 'pegawai', 'jenis_hd','jenis_pelanggaran_hd','pangkat_golongan'));
    }

    public function k_jenis_hukuman($id)
    {
        $k_jenis_hukuman = DB::table("t_k_jenis_hukumen")->where('id_m_jenis_hd', '=', $id)->pluck('nama_k_jenis_hd', 'id_k_jenis_hd');

        return response()->json($k_jenis_hukuman);
    }

  


    public function kategori_pelanggaran($id)
    {
        $kategori_pelanggaran_hd = DB::table("t_m_jenis_pelanggaran_hds")->where('id_m_jenis_pelanggaran_hd', '=', $id)->pluck('kategori_pelanggaran_hd', 'kategori_pelanggaran_hd');

        return response()->json($kategori_pelanggaran_hd);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $model = T_hukuman_pegawai::create($request->all());
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
    public function edit($id_hukuman_hd)
    {
        $jenis_hd = DB::table("t_m_jenis_hukumen")->pluck('nama_m_jenis_hd', 'id_m_jenis_hd');
        $jenis_k_hukuman = DB::table("t_k_jenis_hukumen")->pluck('nama_k_jenis_hd', 'id_k_jenis_hd');
        $jenis_pelanggaran_hd = DB::table("t_m_jenis_pelanggaran_hds")->pluck('nama_m_jenis_pelanggaran_hd', 'id_m_jenis_pelanggaran_hd');  

        $jenis_hd = DB::table("t_m_jenis_hukumen")->pluck('nama_m_jenis_hd', 'id_m_jenis_hd');
        $jenis_pelanggaran_hd = DB::table("t_m_jenis_pelanggaran_hds")->pluck('nama_m_jenis_pelanggaran_hd', 'id_m_jenis_pelanggaran_hd');
        

        $model = T_hukuman_pegawai::where('id_hukuman_hd', $id_hukuman_hd)->firstOrFail();
        $model2 = T_pegawai::select('nip')->where('nip', $model->nip)->firstOrFail();

        $pangkat_golongan = T_golongan_pegawai::join('t_m_pangkat_golongans','t_m_pangkat_golongans.id_m_pangkat_golongan','=','t_golongan_pegawais.id_m_pangkat_golongan')
            ->join(DB::raw('(select max(id_m_pangkat_golongan) as id_m_pangkat_golongan from t_golongan_pegawais group by nip)c'), function($join) {
            $join->on('t_golongan_pegawais.id_m_pangkat_golongan','=','c.id_m_pangkat_golongan');})
            ->where('t_golongan_pegawais.nip','=',$model->nip)->firstOrFail();

        return view('t_views.t_hukuman_pegawai.form', compact('model2', 'model', 'jenis_hd', 'jenis_pelanggaran_hd', 'pangkat_golongan','jenis_k_hukuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hukuman_hd)
    {
        $model = T_hukuman_pegawai::where('id_hukuman_hd', $id_hukuman_hd)->firstOrFail();
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hukuman_hd)
    {
        T_hukuman_pegawai::destroy($id_hukuman_hd);
    }

    public function data_hukuman_pegawai(Request $request, $id)
    {
        $model =  T_hukuman_pegawai::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 't_hukuman_pegawais.nip')
            ->join('t_m_jenis_hukumen', 't_m_jenis_hukumen.id_m_jenis_hd', '=', 't_hukuman_pegawais.id_m_jenis_hd')
            ->join('t_k_jenis_hukumen', 't_k_jenis_hukumen.id_k_jenis_hd', '=', 't_hukuman_pegawais.id_k_jenis_hd')
            ->join('t_m_jenis_pelanggaran_hds', 't_m_jenis_pelanggaran_hds.id_m_jenis_pelanggaran_hd', '=', 't_hukuman_pegawais.id_m_jenis_pelanggaran_hd') 
            ->where('t_hukuman_pegawais.nip','=',$id)
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action2', [
                    'model' => $model,
                    'model2' => "Data Hukuman Pegawai",
                    'url_show' => route('hukuman.show', $model->id_hukuman_hd),
                    'url_edit' => route('hukuman.edit', $model->id_hukuman_hd),
                    'url_destroy' => route('hukuman.destroy', $model->id_hukuman_hd)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
