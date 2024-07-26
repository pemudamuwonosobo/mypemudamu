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
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->dropForeign('pendidikans_id_anggota_foreign');
            $table->dropColumn('id_anggota');
        });
    }
};
