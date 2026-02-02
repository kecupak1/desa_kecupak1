<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Gunakan IF untuk mencegah error duplicate jika kamu tak sengaja migrate 2x
            if (!Schema::hasColumn('tickets', 'whatsapp')) {
                $table->string('whatsapp')->nullable()->after('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('whatsapp');
        });
    }
};