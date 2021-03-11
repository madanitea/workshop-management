<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Konfigurasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_bengkel');
            $table->string('username');
            $table->string('password');
            $table->string('nama_pemilik');
            $table->text('alamat_bengkel');
            $table->string('status');
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
        Schema::dropIfExists('konfigurasi');
    }
}
