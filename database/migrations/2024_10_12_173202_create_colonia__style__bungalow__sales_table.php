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
        Schema::create('colonia__style__bungalow__sales', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->default('csbuns');
            $table->string('title');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('location');
            $table->string('house_size');
            $table->string('land_size');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->text('image_path')->nullable();
            $table->string('contact_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colonia__style__bungalow__sales');
    }
};
