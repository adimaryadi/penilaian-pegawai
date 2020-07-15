<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PegawaiPilihSuratModel;
use App\User;
use App\SuratModel;
class PegawaiPilihSuratControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_surat               =       PegawaiPilihSuratModel::all();
        return view('content.pilih_surat_pegawai.list',compact('data_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_pegawai               =       User::all();
        $data_user                  =       [];
        $dump                       =       [];
        foreach($data_pegawai as $list) {
            if ($list->level == 'admin') {
                array_push($dump, $list);
            } else {
                array_push($data_user, $list);
            }
        }
        $data_json_user             =       $data_pegawai->toJson();
        $data_surat                 =       SuratModel::all();
        return view('content.pilih_surat_pegawai.create',compact('data_user','data_json_user','data_surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $create_surat               =       new PegawaiPilihSuratModel();
        $create_surat->id_users     =       $request->id_pegawai;
        $create_surat->nama         =       $request->nama;
        $create_surat->email        =       $request->email;
        $create_surat->jabatan      =       $request->jabatan;
        $create_surat->no_surat     =       $request->no_surat;
        $create_surat->save();
        return redirect('pilih_surat_pegawai')->with('pesan','Surat pegawai di buat ');
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
    public function edit($id)
    {
        //
        $data_pegawai               =       User::all();
        $data_edit                  =       PegawaiPilihSuratModel::find($id);
        $data_user                  =       [];
        $dump                       =       [];
        foreach($data_pegawai as $list) {
            if ($list->level == 'admin') {
                array_push($dump, $list);
            } else {
                array_push($data_user, $list);
            }
        }
        $data_json_user             =       $data_pegawai->toJson();
        $data_surat                 =       SuratModel::all();
        return view('content.pilih_surat_pegawai.edit',compact('data_user','data_json_user','data_surat','data_edit'));
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
        //
        $create_surat               =       PegawaiPilihSuratModel::find($id);
        $create_surat->id_users     =       $request->id_pegawai;
        $create_surat->nama         =       $request->nama;
        $create_surat->email        =       $request->email;
        $create_surat->jabatan      =       $request->jabatan;
        $create_surat->no_surat     =       $request->no_surat;
        $create_surat->update();
        return redirect('pilih_surat_pegawai')->with('pesan','Surat pegawai di perbaharui ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete         =       PegawaiPilihSuratModel::find($id);
        $delete->delete();
        return $delete;
    }
}
