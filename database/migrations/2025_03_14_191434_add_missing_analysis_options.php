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
        Schema::table('studies', function(Blueprint $table) {
            $table->boolean('mechanical_testing_femur_trabecular')->default(false);
            $table->boolean('mechanical_testing_femur_cortical')->default(false);
            $table->boolean('mechanical_testing_tibia_trabecular')->default(false);
            $table->boolean('mechanical_testing_tibia_cortical')->default(false);
            $table->boolean('mechanical_testing_vertebra_trabecular')->default(false);
            $table->boolean('clinical_biochemistry_blood')->default(false);
            $table->boolean('clinical_biochemistry_urine')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studies', function(Blueprint $table) {
            $table->dropColumn('mechanical_testing_femur_trabecular');
            $table->dropColumn('mechanical_testing_femur_cortical');
            $table->dropColumn('mechanical_testing_tibia_trabecular');
            $table->dropColumn('mechanical_testing_tibia_cortical');
            $table->dropColumn('mechanical_testing_vertebra_trabecular');
            $table->dropColumn('clinical_biochemistry_blood');
            $table->dropColumn('clinical_biochemistry_urine');
        });
    }
};
