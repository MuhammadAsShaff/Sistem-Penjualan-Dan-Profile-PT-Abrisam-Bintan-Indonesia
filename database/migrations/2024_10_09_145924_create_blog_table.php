<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id('id_blog'); 
            $table->string('judul_blog',255); 
            $table->string('slug',255); 
            $table->mediumText('isi_blog'); 
            $table->string('kategori', 100);
            $table->string('gambar_cover',255)->nullable(); 
            $table->timestamp('tanggal_penulisan')->useCurrent(); 
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
        Schema::dropIfExists('blog');
    }
}
