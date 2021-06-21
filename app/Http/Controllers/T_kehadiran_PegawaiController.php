<?php

namespace App\Http\Controllers;

use App\Exports\KehadiranExport;
use App\T_kehadiran_pegawai;
use App\T_m_skpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class T_kehadiran_PegawaiController extends Controller
{

    public function index()
    {
        $skpd = T_m_skpd::all();

        return view('t_views.t_kehadiran_pegawai.kehadiran', compact('skpd'));
    }


    public function create()
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = new T_kehadiran_pegawai();
        return view('t_views.t_kehadiran_pegawai.form', compact('model', 'pegawai'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:255'
        ]);

        $model = T_kehadiran_pegawai::create($request->all());
        return $model;
    }

    public function show(Request $request)
    {
        $tahun = request()->segment(2);
        $nip = request()->segment(3);

        $model = T_kehadiran_pegawai::select('*')
                            ->join('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                            ->where('t_kehadiran_pegawais.tahun','=',$tahun)
                            ->where('t_kehadiran_pegawais.nip','=',$nip)
                            ->get();

        return view('t_views.t_kehadiran_pegawai.show', compact('model'));

    }


    public function edit($id)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_kehadiran_pegawai::where('id_kehadiran_pegawai', $id)->firstOrFail();


        return view('t_views.t_kehadiran_pegawai.form', compact('model', 'pegawai'));
    }


    public function update(Request $request, $id)
    {
        $model = T_kehadiran_pegawai::where('id_kehadiran_pegawai','=',$id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        T_kehadiran_pegawai::destroy($id);
    }

    public function data_kehadiran_pegawai(Request $request, $id)
    {
        if ($id == 'TAMPIL') {
            $model = T_kehadiran_pegawai::select('*')
                                ->leftjoin('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                                ->leftjoin('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                ->leftjoin(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                    $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                                ->groupBy('t_kehadiran_pegawais.nip')
                                ->get();
        } else {
            $model = T_kehadiran_pegawai::select('*')
                                ->leftjoin('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                                ->leftjoin('t_jabatan_pegawais','t_jabatan_pegawais.nip','=','t_pegawais.nip')
                                ->leftjoin(DB::raw('(select max(id_jabatan) as id_jabatan from t_jabatan_pegawais group by id_jabatan)c'), function($join) {
                                    $join->on('t_jabatan_pegawais.id_jabatan','=','c.id_jabatan');})
                                ->where('t_jabatan_pegawais.unit_unor','=',$id)
                                ->groupBy('t_pegawais.nip')
                                ->get();

        }


        return DataTables::of($model)

            ->addColumn('action', function ($model) {
                return view('layouts._action7', [
                    'model' => $model,
                    'model2' => "Data Kehadiran Pegawai",
                    'url_show' => url('detail_kehadiran/'.$model->tahun.'/'. $model->nip),
                    'url_download' => url('download/file/'.$model->tahun.'/'. $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }



    public function data_tk_pegawai(Request $request)
    {

        $model = T_kehadiran_pegawai::query()
                                    ->join('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                                    ->where('t_kehadiran_pegawais.tk','>=','5');

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action8', [
                    'model' => $model,
                    'model2' => "Data Kehadiran Pegawai",
                    'url_show' => route('create_data.hukuman', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }


    public function data_tk_panggilan(Request $request)
    {

        $model = T_kehadiran_pegawai::query()
                                    ->join('t_pegawais','t_pegawais.nip','=','t_kehadiran_pegawais.nip')
                                    ->where('t_kehadiran_pegawais.tk','>=','5');

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action9', [
                    'model' => $model,
                    'model2' => "Create Data Panggilan Pegawai",
                    'url_show' => route('create_data.panggilan', $model->nip)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }





    public function laporanExcel(Request $request)
    {
        $tahun = request()->segment(3);
        $nip = request()->segment(4);
        return Excel::download(new KehadiranExport($tahun,$nip), 'Daftar Kehadiran.xlsx');
    }
}
