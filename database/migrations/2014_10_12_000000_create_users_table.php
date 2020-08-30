<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_nip', 60)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('jabatan', 90)->nullable();
            $table->string('password');
            $table->string('no_surat')->nullable();
            $table->enum('level',['admin','pegawai']);
            $table->enum('status_dinas',['sedang_dinas','tidak_dinas'])->nullable();
            $table->date('dari_tanggal_dinas')->nullable();
            $table->date('sampai_tanggal_dinas')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
