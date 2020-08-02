<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_trans');
            $table->string('tgl_keluar');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('cascade');
            $table->integer('jml_barang');
            $table->unsignedBigInteger('tujuan_id');
            $table->foreign('tujuan_id')->references('id')->on('tujuans')->onDelete('cascade');
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
        Schema::dropIfExists('keluars');
    }
}
