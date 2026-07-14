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
        Schema::create('desa_profil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('motto')->nullable();
            $table->text('gambaran_umum')->nullable();
            $table->text('kondisi_geografis')->nullable();
            $table->text('batas_wilayah')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('link_maps')->nullable();
            $table->text('sambutan_kepala_desa')->nullable();
            $table->string('foto_kepala_desa')->nullable();
            $table->string('logo_desa')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_profil');
    }
};