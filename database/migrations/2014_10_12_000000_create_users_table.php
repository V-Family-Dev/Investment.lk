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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('usertype')->default('seller')->nullable();
            $table->string('idnumber');
            $table->string('address');
            $table->string('phonenumber');
            $table->string('email')->unique();
            $table->string('front_fide_if_card')->nullable(); 
            $table->string('back_fide_if_card')->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->default('1');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
