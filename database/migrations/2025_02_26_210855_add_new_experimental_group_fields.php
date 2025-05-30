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
        Schema::table('experimental_groups', function(Blueprint $table) {
            $table->string('gm_cond_knockout_gene_symbol')->nullable();
            $table->string('gm_cond_knockout_genotype')->nullable();
            $table->string('gm_cond_knockout_cre_animal_line_abbreviation')->nullable();
            $table->string('gm_cond_knockout_cre_animal_genotype')->nullable();
            $table->string('gm_cond_knockout_cre_treatment_group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experimental_groups', function(Blueprint $table) {
            $table->dropColumn('gm_cond_knockout_gene_symbol');
            $table->dropColumn('gm_cond_knockout_genotype');
            $table->dropColumn('gm_cond_knockout_cre_animal_line_abbreviation');
            $table->dropColumn('gm_cond_knockout_cre_animal_genotype');
            $table->dropColumn('gm_cond_knockout_cre_treatment_group');
        });
    }
};
