<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaganTable extends Migration
{
    public function up()
    {
        Schema::create('bagan', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('title', 100);
            $table->string('img_url', 255)->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('bagan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bagan');
    }
}
