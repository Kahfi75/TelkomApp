<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('keterangan_visits', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keterangan_visits');
    }
}
