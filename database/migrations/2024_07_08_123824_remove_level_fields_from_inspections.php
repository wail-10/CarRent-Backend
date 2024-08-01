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
        Schema::table('car_inspections', function (Blueprint $table) {
            $table->dropColumn('oilLevel');
            $table->dropColumn('coolantLevel');
            $table->dropColumn('brakeFluidLevel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_inspections', function (Blueprint $table) {
            //
        });
    }
};
