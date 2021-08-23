<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('transaksi_id');
            $table->date('tanggal_bayar');
            $table->string('metode_pembayaran_id');
            $table->string('nama_metode');
            $table->double('jumlah_pembayaran');
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
        Schema::dropIfExists('transaksi_pembayaran');
    }
}
