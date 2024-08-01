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
        Schema::table('damages', function (Blueprint $table) {
            Schema::table('damages', function (Blueprint $table) {
                $table->unsignedBigInteger('inspection_id')->nullable(); // Add inspection_id column
    
                // Optionally, add a foreign key constraint
                $table->foreign('inspection_id')->references('id')->on('car_inspections')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('damages', function (Blueprint $table) {
            $table->dropForeign(['inspection_id']);
            $table->dropColumn('inspection_id');
        });
    }
};
