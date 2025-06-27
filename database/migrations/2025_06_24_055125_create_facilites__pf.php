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
        Schema::create('facilites__pf', function (Blueprint $table) {
            $table->BigIncrements('id_facility');
            $table->string('facility_name')->unique();
            $table->string('facility_description');
            $table->string('icon_facility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilites__pf');
    }
};
