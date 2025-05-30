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
        Schema::create('instruments', function(Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->boolean('is_general')->default(false);
            $table->timestamps();
        });

        Schema::create('focuses', function(Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('measurement_categories', function (Blueprint $table) {
            $table->foreignId('instrument_id')->nullable()->constrained('instruments')->onDelete('cascade');
            $table->foreignId('focus_id')->nullable()->constrained('focuses')->onDelete('cascade');
            $table->dropColumn(['bone_name', 'name', 'display_name']);
        });

        Schema::create('study_measurement_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained()->onDelete('cascade');
            $table->foreignId('measurement_category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('measurement_synonyms', function (Blueprint $table) {
            $table->dropForeign(['measurement_id']);
            $table->foreign('measurement_id')->references('id')->on('measurements')->onDelete('cascade');
        });

        Schema::create('study_instrument', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained()->onDelete('cascade');
            $table->foreignId('instrument_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('study_instrument');

        Schema::table('measurement_categories', function (Blueprint $table) {
            $table->dropForeign(['instrument_id']);
            $table->dropForeign(['focus_id']);
            $table->dropColumn(['instrument_id', 'focus_id']);
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('bone_name')->nullable();
        });

        Schema::dropIfExists('study_measurement_category');
        Schema::dropIfExists('focuses');
        Schema::dropIfExists('instruments');
    }
};
