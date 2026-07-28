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
        // File: database/migrations/xxxx_create_members_table.php
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_code')->unique(); // MBR-20260101-001
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('member_type_id')->constrained('member_types');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->decimal('custom_discount_pct', 5, 2)->nullable(); // Override diskon dari tipe
            $table->enum('status', ['active', 'expired', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
