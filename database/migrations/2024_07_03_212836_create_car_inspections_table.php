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
        Schema::create('car_inspections', function (Blueprint $table) {
            $table->id();
            $table->integer('mileage');
            $table->string('fuelLevel');
            $table->string('oilLevel');
            $table->string('coolantLevel');
            $table->string('brakeFluidLevel');
            $table->string('tireCondition');
            $table->string('lightsCondition');
            $table->string('mirrorsCondition');
            $table->string('windowsCondition');
            $table->string('wipersCondition');
            $table->boolean('spareTire');
            $table->boolean('vehiclePapers');
            $table->text('comments')->nullable();
            $table->text('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_inspections');
    }
};
