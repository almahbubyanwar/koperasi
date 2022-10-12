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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id('idPinjaman');
            $table->date('tanggalPinjaman');
            $table->unsignedInteger('noAnggota')->length(10);
            $table->unsignedInteger('jumlah')->length(11);
            $table->unsignedSmallInteger('lama')->length(6);
            $table->integer('bunga');
            $table->unsignedBigInteger('userId');
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
        Schema::dropIfExists('pinjaman');
    }
};
