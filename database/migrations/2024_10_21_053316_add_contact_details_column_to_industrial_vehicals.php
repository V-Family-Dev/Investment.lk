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
        Schema::table('industrial_vehicals', function (Blueprint $table) {
            $table->text('contact_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industrial_vehicals', function (Blueprint $table) {
            $table->dropColumn('contact_details');
        });
    }
};
