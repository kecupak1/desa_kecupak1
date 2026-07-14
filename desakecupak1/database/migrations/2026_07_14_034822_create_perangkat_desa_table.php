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
        Schema::create('perangkat_desa', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jabatan'); // Kepala Desa, Sekdes, Kaur, Kasi, Kadus, dll
        $table->string('foto')->nullable();
        $table->string('no_hp')->nullable();
        $table->text('tugas')->nullable();
        $table->integer('urutan')->default(0);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
