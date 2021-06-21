<?php

namespace App\Http\Controllers;

use App\T_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard_pegawaiController extends Controller
{
    public function index()
    {

        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');

        $model = T_pegawai::where('nip', auth()->user()->nip)->firstOrFail();


        return view('dashboard.dashboard_pegawai',compact('model','pegawai'));
    }


}
