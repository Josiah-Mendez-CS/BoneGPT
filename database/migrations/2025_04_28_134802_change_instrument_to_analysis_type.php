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
        // Must handle foreign indexes first, dont want to drop the data but we cannot remove the reference if the table is renamed
        Schema::table('measurement_categories', function(Blueprint $table) {
            $table->dropForeign(['instrument_id']);
        });

        Schema::table('study_instrument', function(Blueprint $table) {
            $table->dropForeign(['instrument_id']);
        });

        // Handle Table Renaming
        Schema::rename('instruments', 'analysis_types');
        Schema::rename('study_instrument', 'study_analysis_type');
        Schema::table('uploads', function(Blueprint $table) {
            $table->renameColumn('instrument', 'analysis_type');
        });

        // Rename the columns and add the foreign key constraints back
        Schema::table('measurement_categories', function(Blueprint $table) {
            $table->renameColumn('instrument_id', 'analysis_type_id');
            $table->foreign('analysis_type_id')->references('id')->on('analysis_types')->nullable()->onDelete('cascade');
        });

        Schema::table('study_analysis_type', function(Blueprint $table) {
            $table->renameColumn('instrument_id', 'analysis_type_id');
            $table->foreign('analysis_type_id')->references('id')->on('analysis_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Must handle foreign indexes first, dont want to drop the data but we cannot remove the reference if the table is renamed
        Schema::table('measurement_categories', function(Blueprint $table) {
            $table->dropForeign(['analysis_type_id']);
        });

        Schema::table('study_analysis_type', function(Blueprint $table) {
            $table->dropForeign(['analysis_type_id']);
        });

        // Handle Table Renaming
        Schema::table('uploads', function(Blueprint $table) {
            $table->renameColumn('analysis_type', 'instrument');
        });
        Schema::rename('analysis_types', 'instruments');
        Schema::rename('study_analysis_type', 'study_instrument');

        // Rename the columns and add the foreign key constraints back
        Schema::table('measurement_categories', function(Blueprint $table) {
            $table->renameColumn('analysis_type_id', 'instrument_id');
            $table->foreign('instrument_id')->references('id')->on('instruments')->nullable()->onDelete('cascade');
        });

        Schema::table('study_instrument', function(Blueprint $table) {
            $table->renameColumn('analysis_type_id', 'instrument_id');
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
        }); 
    }
};
