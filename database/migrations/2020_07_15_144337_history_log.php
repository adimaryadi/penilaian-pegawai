<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoryLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('history', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tujuan_kota')->nullable();
            $table->string('tujuan_luar_kota')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->string('pegawai')->nullable();
            $table->string('email')->nullable();
            $table->text('data_nilai')->nullable();
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
        Schema::dropIfExists('history');
    }
}
