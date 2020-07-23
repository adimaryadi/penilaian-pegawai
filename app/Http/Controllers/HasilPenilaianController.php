<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratModel;
use Illuminate\Support\Facades\DB;
use PDF;
class HasilPenilaianController extends Controller
{
    //
    public function __construct() {
    	$this->middleware('auth');
    }

    public function pilih_surat() {
    	$data_surat 	 	 	= 	 	SuratModel::all();
    	return view('content.HasilPenilaian.pilih',compact('data_surat'));
    }

    public function pilih_pegawai(Request $request) {
    	$pagawai 	 	 	 	= 	 	DB::table('users')->where('no_surat',$request->no_surat)->get();
    	return view('content.HasilPenilaian.pilih_pegawai',compact('pagawai'));
    }

    public function Report_penilaian(Request $request) {
        $find_penilaian         =       DB::table('penilaian')->where('no_surat', $request->no_surat)->get();
        $no_surat               =       $request->no_surat;
        return view('content.HasilPenilaian.Report_penilaian',compact('find_penilaian','no_surat'));
    }

    public function Report_pdf(Request $request) {
        $no_surat                    =           $request->no_surat;
        $data                        =           DB::table('penilaian')->where('no_surat', $no_surat)->get();
        $pdf = PDF::loadView('content.HasilPenilaian.cetak_pdf',compact('data','no_surat'));
        
        return $pdf->download('Report.pdf');
        
        return view('content.HasilPenilaian.cetak_pdf',compact('data','no_surat'));
    }
}
