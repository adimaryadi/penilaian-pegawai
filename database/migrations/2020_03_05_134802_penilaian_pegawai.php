<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenilaianPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_nip');
            $table->string('id_pegawai')->nullable();
            $table->string('nama');
            $table->string('jabatan');
            $table->enum('kedisiplinan',['sangat_kurang','kurang','cukup','baik','sangat_baik'])->nullable();
            $table->enum('kerja_sama',['sangat_kurang','kurang','cukup','baik','sangat_baik'])->nullable();
            $table->enum('kode_etik',['sangat_kurang','kurang','cukup','baik','sangat_baik'])->nullable();
            $table->enum('ketepatan_membuat_laporan',['sangat_kurang','kurang','cukup','baik','sangat_baik'])->nullable();
            $table->string('dinilai')->nullable();
            $table->enum('pembuatan_kka',['sangat_kurang','kurang','cukup','baik','sangat_baik'])->nullable();
            $table->string('no_surat');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penilaian');
    }
}
