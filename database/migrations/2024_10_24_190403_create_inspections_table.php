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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_papers')->nullable();
            $table->string('cric')->nullable();
            $table->string('spare_tire')->nullable();
            $table->string('safety_kit')->nullable();
            $table->integer('fuel_level')->default(0);
            $table->integer('km_depart')->nullable();
            $table->integer('km_retour')->nullable();
            $table->text('observations')->nullable();
            $table->text('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
