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
        Schema::table('perangkat_desas', function (Blueprint $table) {
            // Menambahkan dua kolom tipe 'date' (tanggal)
            $table->date('tanggal_menjabat')->nullable();
            $table->date('tanggal_akhir_menjabat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_desas', function (Blueprint $table) {
            $table->dropColumn(['tanggal_menjabat', 'tanggal_akhir_menjabat']);
        });
    }
};