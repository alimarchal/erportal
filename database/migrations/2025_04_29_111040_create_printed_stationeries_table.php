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
        Schema::create('printed_stationeries', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->unique();
            $table->string('name')->nullable();
            $table->userTracking();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printed_stationeries');
    }
};
