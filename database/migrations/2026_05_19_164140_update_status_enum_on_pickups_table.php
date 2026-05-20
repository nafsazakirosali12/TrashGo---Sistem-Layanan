<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE pickups MODIFY status ENUM('complete', 'incomplete', 'pending', 'processing', 'completed') NOT NULL DEFAULT 'processing'");

        DB::statement("UPDATE pickups SET status = 'completed' WHERE status = 'complete'");
        DB::statement("UPDATE pickups SET status = 'processing' WHERE status = 'incomplete'");

        DB::statement("ALTER TABLE pickups MODIFY status ENUM('pending', 'processing', 'completed') NOT NULL DEFAULT 'processing'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pickups MODIFY status ENUM('complete', 'incomplete', 'pending', 'processing', 'completed') NOT NULL DEFAULT 'processing'");

        DB::statement("UPDATE pickups SET status = 'complete' WHERE status = 'completed'");
        DB::statement("UPDATE pickups SET status = 'incomplete' WHERE status = 'processing' OR status = 'pending'");

        DB::statement("ALTER TABLE pickups MODIFY status ENUM('complete', 'incomplete') NOT NULL DEFAULT 'incomplete'");
    }
};