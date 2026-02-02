<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // File utama ini HANYA membuat kolom dasar agar tidak bentrok dengan file 2026
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title'); 
            $table->string('category');
            $table->text('description');
            $table->string('status')->default('waiting');
            $table->string('priority')->default('low');
            $table->timestamps(); // Ini otomatis membuat created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};