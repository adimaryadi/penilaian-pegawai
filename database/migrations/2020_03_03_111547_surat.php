<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Surat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tujuan_kota')->nullable();
            $table->string('tujuan_luar_kota')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->string('bulan')->nullable();
            $table->bigInteger('id_user')->nullable();
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
        Schema::dropIfExists('no_surat');
    }
}
