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
        // File: database/migrations/xxxx_create_vehicle_types_table.php
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();   // M, L, B, MB
            $table->string('name');                 // Motor, Mobil, Bus, Minibus
            $table->string('description')->nullable();
            $table->integer('slot_size')->default(1); // ukuran slot (1=standar, 2=besar)
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
        Schema::dropIfExists('vehicle_types');
    }
};
