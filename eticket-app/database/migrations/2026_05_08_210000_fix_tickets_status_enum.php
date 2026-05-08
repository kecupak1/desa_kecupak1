<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Perbaiki typo pada nilai enum yang sudah terlanjur tersimpan
        DB::statement("UPDATE tickets SET status = 'process' WHERE status = 'proces'");

        // Ubah definisi kolom menjadi enum dengan nilai yang benar
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('waiting','process','done') NOT NULL DEFAULT 'waiting'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('waiting','proces','done') NOT NULL DEFAULT 'waiting'");
        DB::statement("UPDATE tickets SET status = 'proces' WHERE status = 'process'");
    }
};
