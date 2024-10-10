<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title');
            $table->string('property_type')->nullable();
            $table->string('location')->nullable();
            $table->string('size')->nullable();
            $table->decimal('price')->nullable();
            $table->text('description')->nullable();
            $table->json('photos')->nullable();
            $table->string('land_size')->nullable();
            $table->string('land_type')->nullable();
            $table->string('house_size')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('condition')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('year_of_manufacture')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('color')->nullable();
            $table->integer('engine_capacity')->nullable();
            $table->string('body_type')->nullable();
            $table->string('edition')->nullable();
            $table->string('transmission')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
