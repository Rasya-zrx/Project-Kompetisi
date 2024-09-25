<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kompetisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kompetisi');
            $table->string('deskripsi');
            $table->date('tgl_kompetisi');
            $table->date('tgl_buka_regist');
            $table->date('tgl_tutup_regist');
            $table->binary('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetisi');
    }
};
