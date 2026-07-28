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
        // File: database/migrations/xxxx_create_parking_areas_table.php
        Schema::create('parking_areas', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();   // B1, OA, RT
            $table->string('name');                 // Basement 1, Outdoor Area, Rooftop
            $table->string('location');             // Deskripsi lokasi fisik
            $table->integer('total_capacity');      // Total slot keseluruhan
            $table->string('photo')->nullable();    // Path foto area
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
        Schema::dropIfExists('parking_areas');
    }
};
