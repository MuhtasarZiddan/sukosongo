<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perangkat_desas', function (Blueprint $table) {
            // Menambahkan fungsi nullable() agar boleh kosong
            $table->date('tanggal_menjabat')->nullable()->change();
            $table->date('tanggal_akhir_menjabat')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('perangkat_desas', function (Blueprint $table) {
            $table->date('tanggal_menjabat')->nullable(false)->change();
            $table->date('tanggal_akhir_menjabat')->nullable(false)->change();
        });
    }
};