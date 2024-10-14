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
        Schema::create('equipment_sales', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->default('eqts');
            $table->string('equipment_name');
            $table->string('brand');
            $table->string('location');
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
        Schema::dropIfExists('equipment_sales');
    }
};
