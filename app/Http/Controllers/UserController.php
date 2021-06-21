<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('t_views.t_user.user');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $nama_skpd = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');
        $rolepegawai = DB::table("roles")->pluck('nama_role', 'id_role');

        $model = new User();
        return view('t_views.t_user.form', compact('model', 'nama_skpd','rolepegawai','pegawai'));
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
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'id_role' => 'required|string|max:255',
            'id_m_skpd' => 'required'
        ]);

        $user = new User;
        $user->nip = $request->nip;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->id_role = $request->id_role;
        $user->id_m_skpd = $request->id_m_skpd;
        $user->save();
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
    public function edit($id_user)
    {
        $pegawai = DB::table("t_pegawais")->pluck('nama_pegawai', 'nip');
        $nama_skpd = DB::table("t_m_skpds")->pluck('nama_m_skpd', 'id_m_skpd');
        $rolepegawai = DB::table("roles")->pluck('nama_role', 'id_role');

        $model = User::where('id', $id_user)->firstOrFail();

        return view('t_views.t_user.form2', compact('model', 'nama_skpd','rolepegawai','pegawai'));

    }


    public function edit_passwords($id)
    {
        $model = User::where('id', $id)->firstOrFail();

        return view('t_views.t_user.form3', compact('model'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::where('id', $id)->firstOrFail();
        $model->update($request->all());
    }

    public function update_passwords(Request $request, $id) {

        $model2 = User::findOrFail($id);
        $model2->update(array('password' => Hash::make($request->password)));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    public function data_user(Request $request)
    {
        $model =  User::select('*')
            ->join('t_pegawais', 't_pegawais.nip', '=', 'users.nip')
            ->join('t_m_skpds', 't_m_skpds.id_m_skpd', '=', 'users.id_m_skpd')
            ->join('roles', 'roles.id_role', '=', 'users.id_role')
            ->get();

        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action6', [
                    'model' => $model,
                    'model2' => "Data User",
                    'url_show' => route('user.edit_password', $model->id),
                    'url_edit' => route('user.edit', $model->id),
                    'url_destroy' => route('user.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
