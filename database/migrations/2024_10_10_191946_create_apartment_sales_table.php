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
        Schema::create('apartment_sales', function (Blueprint $table) {
            $table->id();
            $table->string('category _name')->default('apts');
            $table->string('title');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('location');
            $table->string('size');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('image_path'); // For storing the image path
            $table->string('contact_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_sales');
    }
};
