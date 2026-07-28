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
        // File: database/migrations/xxxx_create_parking_transactions_table.php
        Schema::create('parking_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();  // TKT-20260109-001
            $table->foreignId('parking_area_id')->constrained('parking_areas');
            $table->foreignId('vehicle_type_id')->constrained('vehicle_types');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles');
            $table->foreignId('member_id')->nullable()->constrained('members');
            $table->string('plate_number', 20);         // Disimpan langsung untuk historical
            $table->timestamp('check_in_time');
            $table->timestamp('check_out_time')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->decimal('base_price', 10, 2)->nullable();
            $table->decimal('discount_pct', 5, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2)->nullable();
            $table->enum('payment_method', ['tunai', 'kartu_debit', 'kartu_kredit', 'gopay', 'dana', 'ovo', 'qris', 'lainnya'])->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->decimal('change_amount', 10, 2)->default(0);
            $table->enum('status', ['IN', 'OUT', 'CANCELLED'])->default('IN');
            $table->foreignId('check_in_by')->nullable()->constrained('users'); // Petugas masuk
            $table->foreignId('check_out_by')->nullable()->constrained('users'); // Petugas keluar
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_transactions');
    }
};
