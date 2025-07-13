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
        Schema::table('fadhlur_orders', function (Blueprint $table) {
            // Pickup options
            $table->enum('pickup_method', ['jemput', 'antar_sendiri'])->default('antar_sendiri')->after('delivery_method');
            $table->text('pickup_address')->nullable()->after('pickup_method');
            $table->string('pickup_phone')->nullable()->after('pickup_address');

            // Delivery options
            $table->text('delivery_address')->nullable()->after('delivery_method');
            $table->string('delivery_phone')->nullable()->after('delivery_address');

            // Additional notes
            $table->text('pickup_notes')->nullable()->after('pickup_phone');
            $table->text('delivery_notes')->nullable()->after('delivery_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fadhlur_orders', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_method',
                'pickup_address',
                'pickup_phone',
                'delivery_address',
                'delivery_phone',
                'pickup_notes',
                'delivery_notes'
            ]);
        });
    }
};
