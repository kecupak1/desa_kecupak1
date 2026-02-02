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
        Schema::table('tickets', function (Blueprint $table) {
            // Kita cek dulu, kalau belum ada kolom created_at baru kita buat
            if (!Schema::hasColumn('tickets', 'created_at')) {
                $table->timestamp('created_at')->nullable()->after('description');
            }
            
            // Cek juga untuk updated_at
            if (!Schema::hasColumn('tickets', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->after('created_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
};