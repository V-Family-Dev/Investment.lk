<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // User ID of the payment initiator
            $table->unsignedBigInteger('property_id');  // Property ID related to payment
            $table->string('category_name');  // Category of property
            $table->decimal('amount', 8, 2);  // Payment amount
            $table->string('slip_image');  // Image path for payment slip
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
