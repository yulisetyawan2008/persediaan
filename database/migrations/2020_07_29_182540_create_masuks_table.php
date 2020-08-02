<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi');
            $table->string('tgl_transaksi');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('cascade');
            $table->integer('jml_barang');
            $table->integer('hrg_satuan');
            $table->integer('hrg_total');
            $table->unsignedBigInteger('penyedia_id');
            $table->foreign('penyedia_id')->references('id')->on('penyedias')->onDelete('cascade');
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
        Schema::dropIfExists('masuks');
    }
}
