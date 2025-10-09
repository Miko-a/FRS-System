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
        Schema::create('matakuliah_prasyarat', function (Blueprint $table) {
            $table->id();
            $table->string('matakuliah_kode', 5);
            $table->string('prasyarat_kode', 5);

            $table->foreign('matakuliah_kode')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->foreign('prasyarat_kode')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah_prasyarat');
    }
};
