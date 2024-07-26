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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('cabang')->nullable();
            $table->string('ranting')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nik')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('is_nbm')->nullable();
            $table->string('no_nbm')->nullable();
            $table->string('is_ba')->nullable();
            $table->string('tahun_ba')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('profesi')->nullable();
            $table->string('profesi_lain')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('status')->default('belum di verifikasi')->nullable();
            $table->binary('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
