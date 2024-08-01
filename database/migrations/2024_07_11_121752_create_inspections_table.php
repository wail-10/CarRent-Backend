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
            $table->boolean('vehicle_papers')->nullable();
            $table->boolean('cric')->nullable();
            $table->boolean('spare_tire')->nullable();
            $table->boolean('safety_kit')->nullable();
            $table->integer('fuel_level')->default(0);
            $table->integer('km_depart')->nullable();
            $table->integer('km_retour')->nullable();
            $table->text('observations')->nullable();
            $table->text('signature')->nullable();
            $table->boolean('send_by_mail')->default(false);
            $table->string('email')->nullable();
            $table->boolean('send_to_responsible')->default(true);
            $table->boolean('accident_occurred')->default(false);
            $table->boolean('no_accident_occurred')->default(false);
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
