<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::resource('surat','SuratController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('pegawai','PegawaiController');
Route::resource('penilaian','PenilaianController');
Route::post('logout','HomeController@logout');
Route::post('filter','SuratController@filter_surat');
Route::get('hasil_penilaian','PenilaianController@hasil_penilaian');
Route::get('cari_surat_nilai','PenilaianController@NoSurathasil');
Route::get('car_nip','PenilaianController@ReportNilai');
Route::get('pilih_surat_penilaian','PenilaianController@pilih_surat');
Route::post('pilih_penilai_pegawai','PenilaianController@Pilih_penilai_pegawai');
Route::get('hasil_nilai','PenilaianController@hasil_nilai');
Route::resource('pilih_surat_pegawai','PegawaiPilihSuratControlller');
Route::resource('history','HistoryController');
Route::get('pilih_surat','HasilPenilaianController@pilih_surat');
Route::post('pilih_pegawai','HasilPenilaianController@pilih_pegawai');
Route::post('Report_penilaian','HasilPenilaianController@Report_penilaian');
Route::get('pdf','HasilPenilaianController@Report_pdf');