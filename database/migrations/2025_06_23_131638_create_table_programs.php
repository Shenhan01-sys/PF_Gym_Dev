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
        Schema::create('Fitness_program', function (Blueprint $table) {
            $table->bigIncrements('id_Program');
            $table->string('name_Program', 100)->unique();
            $table->string('description_Program', 255)->nullable();
            $table->string('icon', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Fitness_programs');
    }
};
