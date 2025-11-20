<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); 
            $table->string('nama_produk', 255); 
            $table->integer('harga_produk'); 
            $table->integer('kuota')->nullable(); 
            $table->integer('biaya_pasang')->nullable(); 
            $table->longText('benefit')->nullable(); 
            $table->integer('kecepatan'); 
            $table->text('deskripsi'); 
            $table->integer('diskon')->nullable(); 

            // Foreign Key ke kategori
            $table->unsignedBigInteger('id_kategori'); 
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');

            // Foreign Key ke paket
            $table->unsignedBigInteger('id_paket'); 
            $table->foreign('id_paket')->references('id_paket')->on('paket')->onDelete('cascade');

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
        Schema::dropIfExists('produk');
    }
}
