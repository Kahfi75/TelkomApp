<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisitStatusToVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_visit');
            $table->string('keterangan_visit');
            $table->string('pic_visit');
            $table->string('petugas_visit')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('visit_status');  // Nama kolom status visit
            $table->timestamps();
        });
    }
    
}
