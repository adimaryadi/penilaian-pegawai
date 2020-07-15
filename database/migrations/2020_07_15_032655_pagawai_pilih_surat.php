<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagawaiPilihSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_pilih_surat', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_users')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('pegawai_pilih_surat');
    }
}
