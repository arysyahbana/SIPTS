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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('bidang_keahlian')->nullable();
            $table->string('program_keahlian')->nullable();
            $table->string('konsentrasi_keahlian')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('mentor')->nullable();
            $table->string('pamong')->nullable();
            $table->string('status_murid')->nullable();
            $table->string('status_pekerjaan')->nullable();
            $table->string('tempat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
