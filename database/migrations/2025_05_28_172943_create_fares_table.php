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
        Schema::create('fares', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type');
            $table->decimal('base_fare', 8, 2);
            $table->decimal('per_km', 8, 2);
            $table->decimal('per_minute', 8, 2);
            $table->decimal('waiting_charges', 8, 2);
            $table->string('status')->default('Pending'); // 'Active', 'Pending', 'Disabled'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fares');
    }
};
