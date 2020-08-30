<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PegawaiPilihSuratModel;
use App\User;
use App\SuratModel;
use App\HistoryModel;
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
        $find_pegawai               =       User::find($request->id_pegawai);
        $find_pegawai->no_surat     =       $request->no_surat;
        $history                    =       new HistoryModel();
        $find_no_surat              =       DB::table('no_surat')->where('no_surat',$request->no_surat)->first();
        // echo $find_no_surat->no_surat;
        $history                    =       new HistoryModel();
        $history->no_surat          =       $find_no_surat->no_surat;
        $history->tanggal_surat     =       $find_no_surat->tanggal;
        $history->tujuan_kota       =       $find_no_surat->tujuan_luar_kota;
        $history->tujuan_luar_kota  =       $find_no_surat->tujuan_luar_kota;
        $history->tanggal_berakhir  =       $find_no_surat->tanggal_berakhir;
        $history->pegawai           =       $request->nama;
        $history->email             =       $request->email;
        $datenow                    =       Date('Y-m-d');
        $data_user                  =       DB::table('users')->where('id', $request->id_pegawai)->first();
        if ($data_user->status_dinas == 'sedang_dinas') {
            if ($datenow >= $data_user->dari_tanggal_dinas && $datenow <= $data_user->sampai_tanggal_dinas) {
                return redirect('pilih_surat_pegawai/create')->with('error','Pegawai '.$request->nama. ' Sedang menjalankan dinas tidak bisa disimpan');
            }
        }
        // return $data_user->dari_tanggal_dinas;
        $history->save();
        $find_pegawai->update();
        // return $find_pegawai;
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
        $history                    =       new HistoryModel();
        $find_no_surat              =       DB::table('no_surat')->where('no_surat',$request->no_surat)->first();
        // echo $find_no_surat->no_surat;
        $history                    =       new HistoryModel();
        $history->no_surat          =       $find_no_surat->no_surat;
        $history->tanggal_surat     =       $find_no_surat->tanggal;
        $history->tujuan_kota       =       $find_no_surat->tujuan_luar_kota;
        $history->tujuan_luar_kota  =       $find_no_surat->tujuan_luar_kota;
        $history->tanggal_berakhir  =       $find_no_surat->tanggal_berakhir;
        $history->pegawai           =       $request->nama;
        $history->email             =       $request->email;
        $datenow                    =       Date('Y-m-d');
        $data_user                  =       DB::table('users')->where('id', $request->id_pegawai)->first();
        if ($data_user->status_dinas == 'sedang_dinas') {
            if ($datenow >= $data_user->dari_tanggal_dinas && $datenow <= $data_user->sampai_tanggal_dinas) {
                return redirect('pilih_surat_pegawai/create')->with('error','Pegawai '.$request->nama. ' Sedang menjalankan dinas tidak bisa disimpan');
            }
        }
        $find_pegawai               =       User::find($request->id_pegawai);
        // return $request->id_pegawai;
        $find_pegawai->no_surat     =       $request->no_surat;
        $history->save();
        $find_pegawai->update();
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
