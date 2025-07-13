<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah enum delivery_method dari yang lama ke yang baru
        DB::statement("ALTER TABLE fadhlur_orders MODIFY COLUMN delivery_method ENUM('jemput_sendiri', 'antar') DEFAULT 'jemput_sendiri'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan ke enum yang lama
        DB::statement("ALTER TABLE fadhlur_orders MODIFY COLUMN delivery_method ENUM('antar', 'jemput', 'manual') DEFAULT 'manual'");
    }
};
