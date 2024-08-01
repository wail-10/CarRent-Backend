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
        Schema::create('checkboxes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('inspection_id');
            $table->string('part');
            $table->boolean('brulure')->default(false);
            $table->boolean('impact_or_dechirure')->default(false);
            $table->boolean('trou')->default(false);
            $table->boolean('tache')->default(false);
            $table->timestamps();

            $table->foreign('inspection_id')->references('id')->on('inspections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkboxes');
    }
};
