<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cab');
            $table->string('phone');
            $table->enum('status', ['available', 'on_trip', 'suspended', 'off_duty'])->default('available');
            $table->string('image_url')->nullable();
            $table->string('license_url')->nullable();
            $table->string('aadhar_url')->nullable();
            $table->string('vehicle_photo_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
