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
        Schema::create('property_manages', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('property_id');
            $table->string('user_id');
            $table->string('status')->default('pending');
            $table->string('ads_payment_id')->nullable();
            $table->string('ads_payment_status')->default('not paid')->nullable();
            $table->string('active_or_not')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_manages');
    }
};
