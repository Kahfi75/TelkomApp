<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatAndNomorTeleponToKeteranganVisits extends Migration
{
    public function up()
    {
        Schema::table('keterangan_visits', function (Blueprint $table) {
            $table->string('alamat')->nullable();
            $table->string('nomor_telepon')->nullable(); // Pastikan nama kolom ini benar
        });
    }

    public function down()
    {
        Schema::table('keterangan_visits', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'nomor_telepon']); // Pastikan nama kolom ini benar
        });
    }
}

