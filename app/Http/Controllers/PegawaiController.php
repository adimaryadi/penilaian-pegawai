<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratModel;
use App\ModelPegawai;
use Illuminate\Support\Facades\Hash;
class PegawaiController extends Controller
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
        $pegawai           =        ModelPegawai::all();
        return view('content.Pegawai.list',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat          =       SuratModel::all();
        return view('content.Pegawai.add',compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai                =       new ModelPegawai();
        $pegawai->id_nip        =       $request->nip;
        $pegawai->name          =       $request->nama;
        $pegawai->email         =       $request->email;
        $pegawai->jabatan       =       $request->jabatan;
        $pegawai->password      =       Hash::make($request->password);
        $pegawai->no_surat      =       $request->no_surat;
        $pegawai->level         =       $request->level;
        $pegawai->save();
        return redirect('pegawai')->with('pesan','Pegawai Tersimpan');
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
        $edit           =       ModelPegawai::find($id);
        $surat          =       SuratModel::all();
        return view('content.Pegawai.edit',compact('edit','surat'));
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
        $updated            =    ModelPegawai::find($id);
        $updated->id_nip    =    $request->nip;
        $updated->name      =    $request->nama;
        $updated->email     =    $request->email;
        $updated->jabatan   =    $request->jabatan;
        if (!empty($request->passsword)) {
            $updated->password      =      Hash::make($request->password);
        }
        $updated->no_surat  =    $request->no_surat;
        $updated->level     =    $request->level;
        $updated->update();
        return redirect('pegawai')->with('pesan',$request->nama. ' Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete         =       ModelPegawai::find($id);
        $delete->delete();
        return $delete;
    }
}
