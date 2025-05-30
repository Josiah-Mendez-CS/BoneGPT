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
        Schema::create('experimental_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('experimental_study_experimental_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experimental_study_id')->constrained()->onDelete('cascade');
            $table->foreignId('experimental_group_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experimental_study_experimental_group');
        Schema::dropIfExists('experimental_studies');
    }
};
