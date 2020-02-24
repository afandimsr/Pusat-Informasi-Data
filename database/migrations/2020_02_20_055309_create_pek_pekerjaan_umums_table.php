<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekPekerjaanUmumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pek_pekerjaan_umums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun');
            $table->string('sumber_dana','100');
            $table->double('jumlah_dana',12,2);
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
        Schema::dropIfExists('pek_pekerjaan_umums');
    }
}
