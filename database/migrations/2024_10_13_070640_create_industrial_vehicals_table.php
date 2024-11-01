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
        Schema::create('industrial_vehicals', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->default('vehs');
            $table->string('title');
            $table->string('brand');
            $table->string('location');
            $table->string('condtion');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('image_path'); // For storing the image path
            $table->string('model');
            $table->string('year');
            $table->string('fual_type');
            $table->string('mileage');
            $table->string('color');
            $table->string('engine_capacity');
            $table->string('bodytype');
            $table->string('edition');
            $table->string('transmisson');
            $table->text('contact_details');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industrial_vehicals');
    }
};
