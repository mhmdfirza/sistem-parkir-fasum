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
        // File: database/migrations/xxxx_create_member_types_table.php
        Schema::create('member_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');                  // Regular, Silver, Gold, Platinum
            $table->decimal('discount_pct', 5, 2);  // Persentase diskon
            $table->decimal('price', 10, 2);         // Harga membership
            $table->integer('duration_days');        // Durasi dalam hari (30, 365, dsb.)
            $table->string('benefits')->nullable();  // Deskripsi keuntungan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_types');
    }
};
