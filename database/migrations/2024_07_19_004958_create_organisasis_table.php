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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->enum('organisasi_type', ['internal', 'eksternal']);
            $table->string('tingkat')->nullable();
            $table->string('nama_organisasi');
            $table->year('periode_awal')->nullable();
            $table->year('periode_akhir')->nullable();
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
        Schema::dropIfExists('organisasis');
    }
};
