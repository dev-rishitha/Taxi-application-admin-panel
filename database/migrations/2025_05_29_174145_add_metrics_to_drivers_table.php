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
        Schema::table('drivers', function (Blueprint $table) {
            $table->integer('rides_count')->nullable();
            $table->decimal('earnings', 10, 2)->nullable();
            $table->integer('cancellations')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->dropColumn(['rides_count', 'earnings', 'cancellations', 'rating']);
        });
    }
};
