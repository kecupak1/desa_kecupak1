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
        Schema::create('wisata', function (Blueprint $table) {
        $table->id();
        $table->string('nama_wisata');
        $table->text('deskripsi')->nullable();
        $table->string('lokasi_maps')->nullable();
        $table->string('foto')->nullable();
        $table->string('jam_buka')->nullable();
        $table->string('harga_tiket')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
