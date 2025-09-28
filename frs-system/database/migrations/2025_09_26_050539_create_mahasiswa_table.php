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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nrp')->primary();
            $table->string('nama');
            $table->integer('angkatan');
            $table->string('program_studi');
            $table->integer('semester');
            $table->decimal('ipk', total: 3, places: 2);
            $table->integer('max_sks');
            $table->integer('sks_yg_diambil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
