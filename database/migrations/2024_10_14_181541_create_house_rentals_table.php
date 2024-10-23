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
        Schema::create('house_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->default('houren');
            $table->string('title');
            $table->string('location');
            $table->decimal('rent_price', 10, 2);
            $table->string('size');
            $table->string('features');
            $table->text('description');
            $table->string('image_path'); // For storing the image path
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
        Schema::dropIfExists('house_rentals');
    }
};
