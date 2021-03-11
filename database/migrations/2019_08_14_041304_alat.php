<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_alat');
            $table->string('merk');
            $table->dateTime('tanggal_beli');
            $table->string('tempat');
            $table->string('jumlah');
            $table->text('ket');
            $table->decimal('harga', 10, 2);
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
        Schema::dropIfExists('alat');
    }
}
