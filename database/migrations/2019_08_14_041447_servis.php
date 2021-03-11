<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal_mulai');
            $table->string('no_plat');
            $table->decimal('total_harga_suku_cadang', 10, 2);
            $table->decimal('biaya_servis', 10, 2);
            $table->decimal('total_harga', 10, 2);
            $table->decimal('uang', 10, 2);
            $table->decimal('kembalian', 10, 2);
            $table->string('status');
            $table->dateTime('tanggal_selesai');
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
        Schema::dropIfExists('servis');
    }
}
