<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailServis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_servis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_servis');
            $table->bigInteger('id_suku_cadang');
            $table->integer('kuantitas');
            $table->decimal('total_harga', 10,2);
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
        Schema::dropIfExists('detail_servis');
    }
}
