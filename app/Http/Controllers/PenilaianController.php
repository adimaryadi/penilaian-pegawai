<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPegawai;
use App\PenilaianModel;
use App\SuratModel;
use App\HistoryModel;
use Illuminate\Support\Facades\Auth;
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

    public function Pilih_surat() {
        // $data_surat          =      SuratModel::all();
        $data_surat          =      DB::table('pegawai_pilih_surat')->get();
        $data_filter_user    =      [];
        $dump                =      [];
        $data_pilih          =      [];
        foreach ($data_surat as $hasil) {
            if ($hasil->id_users == Auth::user()->id) {
                array_push($dump, $hasil);
            } else {
                array_push($data_filter_user, $hasil);
            }
        }
        foreach ($data_filter_user as $hasil) {
            if ($hasil->no_surat == Auth::user()->no_surat) {
                array_push($data_pilih, $hasil);
            } 
        }
        // return $data_pilih;
        return view('content.Penilaian.pilih_surat',compact('data_pilih'));
    }

    public function Pilih_penilai_pegawai(Request $request) {
        $no_surat            =          $request->no_surat;
        $cari_pegawai        =          DB::table('users')->where('no_surat',$no_surat)->get();
        $pegawai             =          [];
        $dump                =          [];
        foreach ($cari_pegawai as $value) {
            if (Auth::user()->id == $value->id) {
                array_push($dump, $value);
            } else {
                array_push($pegawai, $value);
            }
        }
        // $pegawai_json       =     json_encode($pegawai);
        return view('content.Penilaian.pilih_surat_pegawai',compact('pegawai'));
    }

    public function hasil_penilaian() {
        $penilaian_pegawai   =      PenilaianModel::all();
        $pegawai             =      ModelPegawai::all();
        $data_surat          =      SuratModel::all();
        if (Auth::user()->level == 'admin') {
            return view('content.Penilaian.hasil_keseluruhan',compact('pegawai','penilaian_pegawai','data_surat'));
        } else {
            return view('content.Penilaian.hasil_penilaian',compact('pegawai','penilaian_pegawai','data_surat'));
        }
    }

    public function hasil_nilai(Request $request) {
        $no_surat           =           $request->cari_surat;
        $cari_data          =           DB::table('penilaian')->where('id_nip',$no_surat)->get();
        return view('content.Penilaian.report_nilai_admin',compact('cari_data'));
    }

    public function NoSurathasil(Request $request) {
        $no_surat            =      $request->cari_surat;
        if (Auth::user()->level == 'admin') {
            $pegawai           =      DB::table('users')->where('no_surat',$no_surat)->get();
        } else {
            $cari_pegawai        =          DB::table('users')->where('no_surat',$no_surat)->get();
            $pegawai           =          [];
            $dump                =          [];
            foreach ($cari_pegawai as $value) {
                if (Auth::user()->id == $value->id) {
                    array_push($dump, $value);
                } else {
                    array_push($pegawai, $value);
                }
            }
        }
        // return $cari_data;
        $pegawai_json       =     json_encode($pegawai);
        return view('content.Penilaian.nilai',compact('pegawai','pegawai_json'));
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
        if (DB::table('penilaian')->where('id_nip',$request->id_pegawai)->exists()) {
            return redirect('pilih_surat')->with('pesan',$request->id_pegawai.' Sudah ada');
        } else {

            $PenilaianPegawai                               =      new PenilaianModel();
            $PenilaianPegawai->id_nip                       =      $request->id_nip;
            $PenilaianPegawai->nama                         =      $request->nama;
            $PenilaianPegawai->id_pegawai                   =      $request->id_pegawai;
            $PenilaianPegawai->jabatan                      =      $request->jabatan;
            $PenilaianPegawai->kedisiplinan                 =      $request->kedisiplinan;
            $PenilaianPegawai->kerja_sama                   =      $request->kerja_sama;
            $PenilaianPegawai->kode_etik                    =      $request->kode_etik;
            $PenilaianPegawai->ketepatan_membuat_laporan    =      $request->ketepatan_waktu_laporan;
            $PenilaianPegawai->pembuatan_kka                =      $request->pembuatan_kka;
            $PenilaianPegawai->dinilai                                =      Auth::user()->name;
            $history                                        =      new HistoryModel();
            $history->pegawai                               =      $request->nama;
            $history->data_nilai                            =      json_encode($PenilaianPegawai);
            $history->save();
            $PenilaianPegawai->save();
            if (Auth::user()->level == 'admin') {
                return redirect('penilaian')->with('pesan','Penilaian tersimpan');
            } else {
                return redirect('pilih_surat')->with('pesan','Penilaian tersimpan');
            }
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
        $update->dinilai                    =         Auth::user()->name;
        $history                            =         new HistoryModel();
        $history->pegawai                   =         $request->nama;
        $history->data_nilai                =         json_encode($update);
        // return $update;
        $history->save();
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
