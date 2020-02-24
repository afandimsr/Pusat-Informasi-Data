<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenPenanggulanganBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pen_penanggulangan_bencanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal',0);
            $table->string('penyebab','100');
            $table->string('tempat_kebakaran','100');
            $table->integer('jumlah');
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
        Schema::dropIfExists('pen_penanggulangan_bencanas');
    }
}
