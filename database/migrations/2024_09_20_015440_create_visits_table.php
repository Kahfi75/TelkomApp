<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_visit');
            $table->string('keterangan_visit');
            $table->string('pic_visit');
            $table->string('petugas_visit')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->timestamps();
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
};
