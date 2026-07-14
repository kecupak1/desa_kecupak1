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
         Schema::create('potensi_desa', function (Blueprint $table) {
        $table->id();
        $table->enum('kategori', ['Pertanian', 'Perkebunan', 'Peternakan', 'Perikanan', 'Wisata', 'UMKM', 'Kerajinan', 'Budaya']);
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_desa');
    }
};
