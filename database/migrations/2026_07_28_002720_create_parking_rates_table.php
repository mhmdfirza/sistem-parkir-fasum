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
        // File: database/migrations/xxxx_create_parking_rates_table.php
        Schema::create('parking_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_type_id')->constrained('vehicle_types')->cascadeOnDelete();
            $table->string('name');                 // Label tarif: "0-1 jam Mobil", dsb.
            $table->integer('duration_from');       // Durasi mulai (dalam menit): 0
            $table->integer('duration_to');         // Durasi selesai (dalam menit): 60
            $table->decimal('base_price', 10, 2);  // Tarif dasar
            $table->decimal('member_discount_pct', 5, 2)->default(0); // % diskon default member
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_rates');
    }
};
