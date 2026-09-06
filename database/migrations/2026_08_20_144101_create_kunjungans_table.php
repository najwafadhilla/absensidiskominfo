<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('kunjungans', function (Blueprint $table) {

        $table->id();

        $table->date('tanggal_kunjungan');

        $table->time('jam_kedatangan');


        $table->string('nama_lengkap');

        $table->string('instansi_asal')
              ->nullable();


        $table->string('status')
              ->nullable();


        $table->string('no_hp');


        $table->string('keperluan');


        $table->string('tujuan_bidang');


        $table->string('bertemu_dengan')
              ->nullable();


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
        Schema::dropIfExists('kunjungans');
    }
};
