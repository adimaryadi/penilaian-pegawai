<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratModel;
use App\ModelPegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        // $pegawai->no_surat      =       $request->no_surat;
        $pegawai->level         =       $request->level;
        
        if ($request->dinas == 'sedang_dinas') {
            if ($request->no_surat == "") {
                return redirect('pegawai/create')->with('error','No Surat Kosong ');
            } else {
                $find_surat                     =        DB::table('no_surat')->where('no_surat', $request->no_surat)->first();
                $pegawai->no_surat              =        $request->no_surat;
                $pegawai->dari_tanggal_dinas    =        $find_surat->tanggal;
                $pegawai->sampai_tanggal_dinas  =        $find_surat->tanggal_berakhir;
                $pegawai->status_dinas          =        $request->dinas;
                $pegawai->save();
                return redirect('pegawai')->with('pesan','Pegawai Tersimpan');
            }
        } else {
            $pegawai->save();
            return redirect('pegawai')->with('pesan','Pegawai Tersimpan');
        }
        
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
        // $updated->no_surat  =    $request->no_surat;
        $updated->level     =    $request->level;
        if ($request->dinas == 'sedang_dinas') {
            if ($request->no_surat == "") {
                return redirect('pegawai/'.$id.'/edit')->with('error',$request->nama. ' No surat kosong');
            } else {
                $find_surat                     =        DB::table('no_surat')->where('no_surat', $request->no_surat)->first();
                $updated->no_surat              =        $request->no_surat;
                $updated->dari_tanggal_dinas    =        $find_surat->tanggal;
                $updated->sampai_tanggal_dinas  =        $find_surat->tanggal_berakhir;
                $updated->status_dinas          =        $request->dinas;
            }
        } else if ($request->dinas == 'tidak_dinas') {
            $find_surat                     =        DB::table('no_surat')->where('no_surat', $request->no_surat)->first();
            $updated->no_surat              =        "";
            $updated->dari_tanggal_dinas    =        null;
            $updated->sampai_tanggal_dinas  =        null;
            $updated->status_dinas          =        $request->dinas;
        }
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
