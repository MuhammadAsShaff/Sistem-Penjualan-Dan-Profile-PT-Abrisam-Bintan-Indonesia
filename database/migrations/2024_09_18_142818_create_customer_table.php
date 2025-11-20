<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer'); 
            $table->bigInteger('nik')->unsigned(); 
            $table->string('nama_customer', 255); 
            $table->string('alamat_customer', 255); 
            $table->string('nomor_hp_customer', 255); 
            $table->string('email_customer', 255); 
            $table->string('status_customer', 255)->default('Belum Di Hubungi'); 
            $table->string('jenis_kelamin', 100); 
            $table->string('provinsi', 100); 
            $table->string('kota', 100); 
            $table->string('kecamatan', 100); 
            $table->string('kelurahan', 100); 
            $table->string('kode_pos', 100); 
            $table->decimal('latitude', 15, 10); 
            $table->decimal('longitude', 15, 10); 
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
        Schema::dropIfExists('customer');
    }
}
