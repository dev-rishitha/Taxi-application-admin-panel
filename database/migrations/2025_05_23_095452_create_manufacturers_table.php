<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');                      // Manufacturer name
            $table->string('country')->nullable();       // Country of origin
            $table->string('status')->default('Active'); // Status: Active / Pending / Disabled
            $table->integer('fleet_count')->default(0);  // Number of vehicles manufactured
            $table->string('fleet_trend')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manufacturers');
    }
};
