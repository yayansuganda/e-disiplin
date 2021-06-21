<?php

namespace App\Http\Controllers;

use App\T_m_skpd;
use App\T_m_skpd_bidang;
use App\T_m_skpd_subbidang;
use Illuminate\Http\Request;

class T_m_unorController extends Controller
{
    public function index()
    {
        $unor = T_m_skpd::all(); 
        return view('t_master.t_m_unor.m_unor', compact('unor'));
    }

    public function create_bidang($id)
    {
        $unor_skpd = T_m_skpd::where('id_m_skpd','=',$id)->firstOrFail(); 

        $model = new T_m_skpd_bidang();
        return view('t_master.t_m_unor.form_bidang', compact('model','unor_skpd'));
    }

    public function store_bidang(Request $request)
    {
        $model = T_m_skpd_bidang::create($request->all());
        return $model;
    }


    public function create_subbidang($id)
    {
        $unor_bidang = T_m_skpd_bidang::where('id_m_skpd_bidang','=',$id)->firstOrFail(); 

        $model = new T_m_skpd_subbidang();
        return view('t_master.t_m_unor.form_subbidang', compact('model','unor_bidang'));
    }


    public function store_subbidang(Request $request)
    {
        $model = T_m_skpd_subbidang::create($request->all());
        return $model;
    }


    public function edit_bidang($id)
    {
         $model = T_m_skpd_bidang::where('id_m_skpd_bidang', $id)->firstOrFail();
         $unor_skpd = T_m_skpd::where('id_m_skpd','=',$model->id_m_skpd)->firstOrFail(); 
         
         return view('t_master.t_m_unor.form_bidang', compact('model','unor_skpd'));  
    }


    public function update_bidang(Request $request, $id)
    {
        $model = T_m_skpd_bidang::where('id_m_skpd_bidang', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function edit_subbidang($id)
    {
         $model = T_m_skpd_subbidang::where('id_m_skpd_subbidang', $id)->firstOrFail();
         $unor_bidang = T_m_skpd_bidang::where('id_m_skpd_bidang','=',$model->id_m_skpd_bidang)->firstOrFail(); 
         return view('t_master.t_m_unor.form_subbidang', compact('model','unor_bidang'));  
    }


    public function update_subbidang(Request $request, $id)
    {
        $model = T_m_skpd_subbidang::where('id_m_skpd_subbidang', $id)->firstOrFail();
        $model->update($request->all());
    }


    public function destroy($id)
    {
        
        T_m_skpd_bidang::destroy($id);
    }


    public function hapus_subbidang($id)
    {
        T_m_skpd_subbidang::destroy($id);
    }


}
