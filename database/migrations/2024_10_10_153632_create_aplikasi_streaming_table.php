<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aplikasi_streaming', function (Blueprint $table) {
            $table->id('id_aplikasi'); // Primary key as 'id_aplikasi'
            $table->string('nama_aplikasi'); // Column for 'nama_aplikasi'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplikasi_streaming');
    }
};
