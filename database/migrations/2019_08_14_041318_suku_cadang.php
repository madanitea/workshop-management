<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SukuCadang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suku_cadang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('merk');
            $table->string('untuk_motor');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->text('ket');
            $table->dateTime('tgl_update');
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
        Schema::dropIfExists('suku_cadang');
    }
}
