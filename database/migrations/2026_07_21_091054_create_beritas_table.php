<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi_berita'); // Tidak akan ditampilkan di tabel dashboard
            $table->string('gambar');
            $table->string('penulis');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->dateTime('tanggal_publish')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};