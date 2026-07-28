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
        // File: database/migrations/xxxx_create_area_vehicle_capacities_table.php
        Schema::create('area_vehicle_capacities', function (Blueprint $table) {
        $table->id();
        $table->foreignId('parking_area_id')->constrained('parking_areas')->cascadeOnDelete();
        $table->foreignId('vehicle_type_id')->constrained('vehicle_types')->cascadeOnDelete();
        $table->integer('capacity');            // Jumlah slot untuk tipe ini di area ini
        $table->timestamps();
        $table->unique(['parking_area_id', 'vehicle_type_id']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_vehicles_capacities');
    }
};
