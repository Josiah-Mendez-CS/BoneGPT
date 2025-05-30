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
            $table->string('gm_cond_knockin_safe_harbor_locus_name')->nullable()->after('gm_cond_knockout_doxy_investigator_name');
            $table->string('gm_random_genome_allele_schema')->nullable();
            $table->string('gm_random_genome_other_allele_schema')->nullable();
            $table->string('gm_random_genome_allele_schema_2')->nullable();
            $table->string('gm_random_genome_other_allele_schema_2')->nullable();
            $table->string('gm_random_genome_investigator_name')->nullable();
            $table->string('gm_random_genome_investigator_name_2')->nullable();
        });

        Schema::table('experimental_groups', function(Blueprint $table) {
            $table->string('gm_cond_knockin_gene_product')->nullable();
            $table->string('gm_cond_knockin_genotype')->nullable();
            $table->string('gm_cond_knockin_cre_animal_line_abbreviation')->nullable();
            $table->string('gm_cond_knockin_cre_animal_genotype')->nullable();
            $table->string('gm_cond_knockin_cre_treatment_group')->nullable();

            $table->string('gm_random_genome_gene_product')->nullable();
            $table->string('gm_random_genome_genotype')->nullable();
            $table->string('gm_random_genome_treatment_group')->nullable();
            $table->string('gm_random_genome_gene_product_2')->nullable();
            $table->string('gm_random_genome_genotype_2')->nullable();
            $table->string('gm_random_genome_treatment_group_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studies', function(Blueprint $table) {
            $table->dropColumn('gm_cond_knockin_safe_harbor_locus_name');
            $table->dropColumn('gm_random_genome_allele_schema');
            $table->dropColumn('gm_random_genome_allele_abbreviation');
            $table->dropColumn('gm_random_genome_allele_schema_2');
            $table->dropColumn('gm_random_genome_other_allele_schema_2');
            $table->dropColumn('gm_random_genome_investigator_name');
            $table->dropColumn('gm_random_genome_investigator_name_2');
        });

        Schema::table('experimental_groups', function(Blueprint $table) {
            $table->dropColumn('gm_cond_knockin_gene_product');
            $table->dropColumn('gm_cond_knockin_genotype');
            $table->dropColumn('gm_cond_knockin_cre_animal_line_abbreviation');
            $table->dropColumn('gm_cond_knockin_cre_animal_genotype');
            $table->dropColumn('gm_cond_knockin_cre_treatment_group');

            $table->dropColumn('gm_random_genome_gene_product');
            $table->dropColumn('gm_random_genome_genotype');
            $table->dropColumn('gm_random_genome_treatment_group');
            $table->dropColumn('gm_random_genome_gene_product_2');
            $table->dropColumn('gm_random_genome_genotype_2');
            $table->dropColumn('gm_random_genome_treatment_group_2');
        });
    }
};
