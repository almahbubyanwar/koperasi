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
        Schema::create('pinjaman_details', function (Blueprint $table) {
            $table->id('idPinjaman');
            $table->unsignedSmallInteger('cicilan')->length(6);
            $table->integer('angsuran')->length(11);
            $table->integer('bunga')->length(11);
            $table->date('tanggalPembayaran');
            $table->integer('jumlahPembayaran')->length(11);
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
        Schema::dropIfExists('pinjaman_details');
    }
};
