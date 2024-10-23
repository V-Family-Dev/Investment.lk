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
        Schema::create('land_sales', function (Blueprint $table) {
            $table->id();
            $table->string('category _name')->default('lans');
            $table->string('title');
            $table->string('land_type');
            $table->string('land_size');
            $table->string('location');
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
        Schema::dropIfExists('land_sales');
    }
};
