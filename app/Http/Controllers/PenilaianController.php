<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPegawai;
use App\PenilaianModel;
use App\SuratModel;
use Illuminate\Support\Facades\DB;
class PenilaianController extends Controller
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
        $pegawai             =      ModelPegawai::all();
        $penilaian_pegawai   =      PenilaianModel::all();
        return view('content.Penilaian.list',compact('pegawai','penilaian_pegawai'));
    }

    public function hasil_penilaian() {
        $penilaian_pegawai   =      PenilaianModel::all();
        $pegawai             =      ModelPegawai::all();
        $data_surat          =      SuratModel::all();
        return view('content.Penilaian.hasil_penilaian',compact('pegawai','penilaian_pegawai','data_surat'));
    }

    public function NoSurathasil(Request $request) {
        $no_surat            =      $request->cari_surat;
        $cari_data           =      DB::table('users')->where('no_surat',$no_surat)->get();
        return view('content.Penilaian.view_penilaian',compact('cari_data'));
    }

    public function ReportNilai(Request $request) {
        $no_nip                       =      $request->no_nip;
        $penilaian_pegawai            =      DB::table('penilaian')->where('id_nip',$no_nip)->get();
        return view('content.Penilaian.report_nilai',compact('penilaian_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $pegawai            =     ModelPegawai::all();
        $pegawai_json       =     $pegawai->toJson();
        return view('content.Penilaian.nilai',compact('pegawai','pegawai_json'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $PenilaianPegawai                               =      new PenilaianModel();
        $PenilaianPegawai->id_nip                       =      $request->id_pegawai;
        $PenilaianPegawai->nama                         =      $request->nama;
        $PenilaianPegawai->jabatan                      =      $request->jabatan;
        $PenilaianPegawai->kedisiplinan                 =      $request->kedisiplinan;
        $PenilaianPegawai->kerja_sama                   =      $request->kerja_sama;
        $PenilaianPegawai->kode_etik                    =      $request->kode_etik;
        $PenilaianPegawai->ketepatan_membuat_laporan    =      $request->ketepatan_waktu_laporan;
        $PenilaianPegawai->pembuatan_kka                =      $request->pembuatan_kka;
        $PenilaianPegawai->save();
        return redirect('penilaian')->with('pesan','Penilaian tersimpan');

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
        $edit                =       PenilaianModel::find($id);
        $pegawai             =       ModelPegawai::all();
        $pegawai_json        =       $pegawai->toJson();
        return view('content.Penilaian.edit',compact('edit','pegawai','pegawai_json'));
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
        $update                             =         PenilaianModel::find($id);
        $update->id_nip                     =         $request->id_pegawai;
        $update->nama                       =         $request->nama;
        $update->jabatan                    =         $request->jabatan;
        $update->kedisiplinan               =         $request->kedisiplinan;
        $update->kerja_sama                 =         $request->kerja_sama;
        $update->kode_etik                  =         $request->kode_etik;
        $update->ketepatan_membuat_laporan  =         $request->ketepatan_waktu_laporan;
        $update->pembuatan_kka              =         $request->pembuatan_kka;
        $update->update();
        return redirect('penilaian')->with('pesan','Penilaian update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete             =           PenilaianModel::find($id);
        $delete->delete();
        return $delete;
    }
}
