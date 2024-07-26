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
        Schema::create('perkaderans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perkaderan');
            $table->string('penyelenggara');
            $table->year('tahun')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkaderans');
    }
};
