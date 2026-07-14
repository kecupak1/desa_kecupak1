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
        Schema::create('penduduk', function (Blueprint $table) {
        $table->id();
        $table->string('rt')->nullable();
        $table->string('rw')->nullable();
        $table->string('dusun')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->date('tanggal_lahir')->nullable();
        $table->string('pendidikan_terakhir')->nullable();
        $table->string('pekerjaan')->nullable();
        $table->string('agama')->nullable();
        $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->nullable();
        $table->boolean('penerima_bansos')->default(false);
        $table->string('jenis_bansos')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
