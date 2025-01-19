<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); 
            $table->string('email_admin', 100)->unique(); 
            $table->string('nama_admin', 100);
            $table->string('password', 100);
            $table->string('posisi', 100);
            $table->string('foto_admin', 255)->nullable();
            $table->string('status', 100)->default('Offline');
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
        Schema::dropIfExists('admins');
    }
}
