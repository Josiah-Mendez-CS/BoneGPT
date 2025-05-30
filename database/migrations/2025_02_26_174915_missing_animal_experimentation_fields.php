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
        Schema::table('studies', function (Blueprint $table) {
            $table->string('gm_cond_knockout_transgene_allele_schema')->nullable();
            $table->string('gm_cond_knockout_transgene_other_allele_schema')->nullable();
            $table->string('gm_cond_knockout_doxy_allele_schema')->nullable();
            $table->string('gm_cond_knockout_doxy_other_allele_schema')->nullable();
            $table->string('gm_cond_knockout_tamoxifen_allele_schema')->nullable();
            $table->string('gm_cond_knockout_tamoxifen_other_allele_schema')->nullable();
            $table->string('gm_cond_knockin_transgene_allele_schema')->nullable();
            $table->string('gm_cond_knockin_transgene_other_allele_schema')->nullable();
            $table->string('gm_cond_knockin_doxy_allele_schema')->nullable();
            $table->string('gm_cond_knockin_doxy_other_allele_schema')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_allele_schema')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_other_allele_schema')->nullable();
            $table->string('gm_cond_knockin_doxy_cre_animal_line_name')->nullable();
            $table->string('gm_cond_knockin_doxy_cre_animal_line_abbreviation')->nullable();
            $table->string('gm_cond_knockin_doxy_investigator_name')->nullable();
            $table->string('gm_cond_knockin_doxy_gene_name')->nullable();
            $table->string('gm_cond_knockin_doxy_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockin_doxy_animal_strain')->nullable();
            $table->string('gm_cond_knockin_doxy_doxycycline_type')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_cre_animal_line_name')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_cre_animal_line_abbreviation')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_investigator_name')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_gene_name')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_animal_strain')->nullable();
            $table->string('gm_cond_knockin_tamoxifen_tamoxifen_type')->nullable();
            $table->string('gm_cond_knockin_transgene_cre_animal_line_name')->nullable();
            $table->string('gm_cond_knockin_transgene_cre_animal_line_abbreviation')->nullable();
            $table->string('gm_cond_knockin_transgene_investigator_name')->nullable();
            $table->string('gm_cond_knockin_transgene_gene_name')->nullable();
            $table->string('gm_cond_knockin_transgene_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockin_transgene_animal_strain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studies', function (Blueprint $table) {
            $table->dropColumn('gm_cond_knockout_transgene_allele_schema');
            $table->dropColumn('gm_cond_knockout_transgene_other_allele_schema');
            $table->dropColumn('gm_cond_knockout_doxy_allele_schema');
            $table->dropColumn('gm_cond_knockout_doxy_other_allele_schema');
            $table->dropColumn('gm_cond_knockout_tamoxifen_allele_schema');
            $table->dropColumn('gm_cond_knockout_tamoxifen_other_allele_schema');
            $table->dropColumn('gm_cond_knockin_transgene_allele_schema');
            $table->dropColumn('gm_cond_knockin_transgene_other_allele_schema');
            $table->dropColumn('gm_cond_knockin_doxy_allele_schema');
            $table->dropColumn('gm_cond_knockin_doxy_other_allele_schema');
            $table->dropColumn('gm_cond_knockin_tamoxifen_allele_schema');
            $table->dropColumn('gm_cond_knockin_tamoxifen_other_allele_schema');
            $table->dropColumn('gm_cond_knockin_doxy_cre_animal_line_name');
            $table->dropColumn('gm_cond_knockin_doxy_cre_animal_line_abbreviation');
            $table->dropColumn('gm_cond_knockin_doxy_investigator_name');
            $table->dropColumn('gm_cond_knockin_doxy_gene_name');
            $table->dropColumn('gm_cond_knockin_doxy_tissue_lineage_specificity');
            $table->dropColumn('gm_cond_knockin_doxy_animal_strain');
            $table->dropColumn('gm_cond_knockin_doxy_doxycycline_type');
            $table->dropColumn('gm_cond_knockin_tamoxifen_cre_animal_line_name');
            $table->dropColumn('gm_cond_knockin_tamoxifen_cre_animal_line_abbreviation');
            $table->dropColumn('gm_cond_knockin_tamoxifen_investigator_name');
            $table->dropColumn('gm_cond_knockin_tamoxifen_gene_name');
            $table->dropColumn('gm_cond_knockin_tamoxifen_tissue_lineage_specificity');
            $table->dropColumn('gm_cond_knockin_tamoxifen_animal_strain');
            $table->dropColumn('gm_cond_knockin_tamoxifen_tamoxifen_type');
            $table->dropColumn('gm_cond_knockin_transgene_cre_animal_line_name');
            $table->dropColumn('gm_cond_knockin_transgene_cre_animal_line_abbreviation');
            $table->dropColumn('gm_cond_knockin_transgene_investigator_name');
            $table->dropColumn('gm_cond_knockin_transgene_gene_name');
            $table->dropColumn('gm_cond_knockin_transgene_tissue_lineage_specificity');
            $table->dropColumn('gm_cond_knockin_transgene_animal_strain');
        });
    }
};
