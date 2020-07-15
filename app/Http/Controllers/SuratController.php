<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SuratController extends Controller
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
        $data_surat          =      SuratModel::all();
        return view('content.surat.list',compact('data_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.surat.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surat                      =       new SuratModel();
        $surat->no_surat            =       $request->no_surat;
        $surat->tanggal             =       $request->tanggal;
        $surat->tanggal_berakhir    =       $request->tanggal_berakhir;
        $surat->id_user             =       Auth::user()->id;
        $surat->tujuan_kota         =       $request->tujuan_kota;
        $surat->tujuan_luar_kota    =       $request->tujuan_luar_kota;
        $surat->bulan               =       date('Y-m',strtotime($request->tanggal));
        $surat->save();
        return redirect('surat')->with('pesan','Surat '.$request->no_surat.' Sudah di simpan');
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
        $edit            =       SuratModel::find($id);
        return view('content.surat.edit',compact('edit'));
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
        $updated                    =       SuratModel::find($id);
        $updated->no_surat          =       $request->no_surat;
        $updated->tanggal           =       $request->tanggal;
        $updated->tanggal_berakhir  =       $request->tanggal_berakhir;
        $updated->tujuan_kota         =       $request->tujuan_kota;
        $updated->tujuan_luar_kota    =       $request->tujuan_luar_kota;
        $updated->update();
        return redirect('surat')->with('pesan','Diperbaharui '.$request->no_surat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          =       SuratModel::find($id);
        $delete->delete();
        return $delete;
    }

    public function filter_surat(Request $request) {

        $filter                 =       date('Y-m',strtotime($request->filter_surat));
        $data_surat             =       DB::table('no_surat')->where('bulan', $filter)->get();
        $bulan                  =       $request->filter_surat;
        return view('content.surat.filter',compact('data_surat','bulan'));
    }
}
