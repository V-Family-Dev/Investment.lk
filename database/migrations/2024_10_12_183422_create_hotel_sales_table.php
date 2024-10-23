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
        Schema::create('hotel_sales', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->default('hots');
            $table->string('title');
            $table->string('property_type');
            $table->string('size');
            $table->string('location');
            $table->string('property_features');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->text('image_path')->nullable();
            $table->string('contact_details');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_sales');
    }
};
