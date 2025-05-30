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
        Schema::create('studies', function (Blueprint $table) {
			// TODO: Go through the names of the columns and make sure they are appropriate for what they represent
            $table->id();
			$table->string('identifier')->unique();
            $table->enum('status', ['New', 'In Progress', 'Complete'])->default('New');
			$table->string('title')->nullable();

			// ----------------------------------------------------------------
			// Study Information
			// ----------------------------------------------------------------
			$table->text('summary')->nullable();
			$table->string('funding_sources')->nullable();
			$table->string('conflicts')->nullable();
			$table->date('completion_date')->nullable();
			$table->boolean('is_published')->nullable();
			$table->string('doi')->nullable();
			$table->string('pubmed_id')->nullable();
			$table->string('publication_plan')->nullable();
			$table->integer('embargo_months')->nullable();

            // ----------------------------------------------------------------
            // 1. Experimental Categories
            // ----------------------------------------------------------------
            $table->boolean('study_is_genetically_modified')->default(false);
            $table->boolean('study_performs_drug_treatment')->default(false);
            $table->boolean('study_performs_mechanical_procedure')->default(false);
            $table->boolean('study_performs_gonadectomy')->default(false);
            $table->boolean('study_performs_diet_modification')->default(false);
            $table->boolean('study_controls_light_dark_cycle')->default(false);
            $table->boolean('study_compares_mouse_strains')->default(false);

            // ----------------------------------------------------------------
            // 2. Genetic Modification Types
            // ----------------------------------------------------------------
            $table->boolean('gm_global_knockout')->default(false);
            $table->boolean('gm_induced_mutation')->default(false);
            $table->boolean('gm_insertional_mutagenesis')->default(false);
            $table->boolean('gm_conditional_knockout')->default(false);
            $table->boolean('gm_conditional_knockin_safe_harbor')->default(false);
            $table->boolean('gm_transgene')->default(false);

            // ----------------------------------------------------------------
            // 3. Global Knockout Mouse Line 1
            // ----------------------------------------------------------------
            $table->string('gm_gko_animal_model_name', 100)->nullable();
            $table->string('gm_gko_investigator_name', 100)->nullable();
            $table->string('gm_gko_gene_name', 100)->nullable();
            $table->string('gm_gko_gene_symbol', 20)->nullable();
            $table->string('gm_gko_modification_type', 50)->nullable();
            $table->string('gm_gko_allele_schema', 50)->nullable();
            $table->string('gm_gko_allele_abbreviation', 4)->nullable();
            $table->string('gm_gko_gene_type', 30)->nullable();
            $table->string('gm_gko_other_gene_type', 50)->nullable();
            $table->string('gm_gko_functional_change', 100)->nullable();
            $table->string('gm_gko_animal_strain', 30)->nullable();
            $table->string('gm_gko_other_animal_strain', 30)->nullable();

            // ----------------------------------------------------------------
            // 4. Global Knockout Mouse Line 2
            // ----------------------------------------------------------------
            $table->boolean('gm_gko_has_second_animal_line')->default(false);

            $table->string('gm_gko_animal_model_name_2', 100)->nullable();
            $table->string('gm_gko_investigator_name_2', 100)->nullable();
            $table->string('gm_gko_gene_name_2', 100)->nullable();
            $table->string('gm_gko_gene_symbol_2', 20)->nullable();
            $table->string('gm_gko_modification_type_2', 50)->nullable();
            $table->string('gm_gko_allele_schema_2', 50)->nullable();
            $table->string('gm_gko_allele_abbreviation_2', 4)->nullable();
            $table->string('gm_gko_gene_type_2', 30)->nullable();
            $table->string('gm_gko_other_gene_type_2', 50)->nullable();
            $table->string('gm_gko_functional_change_2', 100)->nullable();
            $table->string('gm_gko_animal_strain_2', 30)->nullable();
            $table->string('gm_gko_other_animal_strain_2', 30)->nullable();

            // ----------------------------------------------------------------
            // 5. Induced Mutation Mouse Line
            // ----------------------------------------------------------------
            $table->string('gm_ind_mutation_animal_model_name', 100)->nullable();
            $table->string('gm_ind_mutation_gene_name', 100)->nullable();
            $table->string('gm_ind_mutation_gene_symbol', 20)->nullable();
            $table->string('gm_ind_mutation_gene_type', 30)->nullable();
            $table->string('gm_ind_mutation_other_gene_type', 50)->nullable();
            $table->string('gm_ind_mutation_functional_change', 100)->nullable();
            $table->string('gm_ind_mutation_animal_strain', 30)->nullable();
            $table->string('gm_ind_mutation_other_animal_strain', 30)->nullable();
            $table->string('gm_ind_mutation_investigator_name', 100)->nullable();
            $table->string('gm_ind_mutation_modification_type', 50)->nullable();
            $table->string('gm_ind_mutation_allele_schema', 50)->nullable();
            $table->string('gm_ind_mutation_allele_abbreviation', 4)->nullable();
            $table->string('gm_ind_mutation_freeform_nomenclature', 100)->nullable();

            // ----------------------------------------------------------------
            // 6. Insertional Mutagenesis Mouse Line
            // ----------------------------------------------------------------
            $table->string('gm_ins_mutagenesis_investigator_name', 100)->nullable();
            $table->string('gm_ins_mutagenesis_modification_type', 50)->nullable();
            $table->string('gm_ins_mutagenesis_allele_schema', 50)->nullable();
            $table->string('gm_ins_mutagenesis_allele_abbreviation', 4)->nullable();
            $table->text('gm_ins_mutagenesis_freeform_nomenclature')->nullable();
            $table->string('gm_ins_mutagenesis_animal_model_name', 100)->nullable();
            $table->string('gm_ins_mutagenesis_gene_name', 100)->nullable();
            $table->string('gm_ins_mutagenesis_gene_symbol', 20)->nullable();
            $table->string('gm_ins_mutagenesis_gene_type', 30)->nullable();
            $table->string('gm_ins_mutagenesis_other_gene_type', 50)->nullable();
            $table->string('gm_ins_mutagenesis_functional_change', 100)->nullable();
            $table->string('gm_ins_mutagenesis_animal_strain', 30)->nullable();
            $table->string('gm_ins_mutagenesis_other_animal_strain', 30)->nullable();

            // ----------------------------------------------------------------
            // 7. Conditional Knockout Mouse Line
            // ----------------------------------------------------------------
            $table->string('gm_cond_knockout_animal_model_name', 100)->nullable();
            $table->string('gm_cond_knockout_gene_name', 100)->nullable();
            $table->string('gm_cond_knockout_gene_symbol', 20)->nullable();
            $table->string('gm_cond_knockout_gene_type', 30)->nullable();
            $table->string('gm_cond_knockout_other_gene_type', 50)->nullable();
            $table->string('gm_cond_knockout_functional_change', 100)->nullable();
            $table->string('gm_cond_knockout_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_other_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_cre_system_used', 50)->nullable();
            $table->string('gm_cond_knockout_investigator_name', 100)->nullable();
            $table->string('gm_cond_knockout_modification_type', 50)->nullable();
            $table->string('gm_cond_knockout_allele_schema', 50)->nullable();
            $table->string('gm_cond_knockout_allele_abbreviation', 4)->nullable();

			// Cre-Transgene fields
            $table->string('gm_cond_knockout_transgene_cre_animal_line_name', 100)->nullable();
            $table->string('gm_cond_knockout_transgene_cre_animal_line_abbreviation', 50)->nullable();
            $table->string('gm_cond_knockout_transgene_gene_name', 100)->nullable();
            $table->string('gm_cond_knockout_transgene_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockout_transgene_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_transgene_other_animal_strain', 30)->nullable();
			$table->string('gm_cond_knockout_transgene_investigator_name', 500)->nullable();

			// Tamoxifen Inducible fields
            $table->string('gm_cond_knockout_tamoxifen_cre_animal_line_name', 100)->nullable();
            $table->string('gm_cond_knockout_tamoxifen_cre_animal_line_abbreviation', 50)->nullable();
            $table->string('gm_cond_knockout_tamoxifen_gene_name', 100)->nullable();
            $table->string('gm_cond_knockout_tamoxifen_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockout_tamoxifen_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_tamoxifen_other_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_tamoxifen_tamoxifen_type', 50)->nullable();
			$table->string('gm_cond_knockout_tamoxifen_investigator_name', 100)->nullable();

			// Doxycycline Regulated fields
            $table->string('gm_cond_knockout_doxy_cre_animal_line_name', 100)->nullable();
            $table->string('gm_cond_knockout_doxy_cre_animal_line_abbreviation', 50)->nullable();
            $table->string('gm_cond_knockout_doxy_gene_name', 100)->nullable();
            $table->string('gm_cond_knockout_doxy_tissue_lineage_specificity')->nullable();
            $table->string('gm_cond_knockout_doxy_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_doxy_other_animal_strain', 30)->nullable();
            $table->string('gm_cond_knockout_doxy_doxycycline_type', 50)->nullable();
			$table->string('gm_cond_knockout_doxy_investigator_name', 100)->nullable();

            // ----------------------------------------------------------------
            // 8. Conditional Knock-In Safe Harbor Mouse Line
            // ----------------------------------------------------------------
            $table->string('gm_cond_knockin_safe_harbor_animal_model_name')->nullable();
            $table->string('gm_cond_knockin_safe_harbor_abbreviated_name', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_gene_product')->nullable();
            $table->string('gm_cond_knockin_safe_harbor_transgene_function', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_coding_sequence_type', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_animal_strain', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_cre_system_used', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_investigator_name', 100)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_modification_type', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_allele_schema', 50)->nullable();
            $table->string('gm_cond_knockin_safe_harbor_allele_abbreviation', 4)->nullable();

            // ----------------------------------------------------------------
            // 9. Random Genome Integration Mouse Line 1
            // ----------------------------------------------------------------
            $table->string('gm_random_genome_animal_model_name')->nullable();
            $table->string('gm_random_genome_animal_name_abbreviation', 50)->nullable();
            $table->string('gm_random_genome_gene_name')->nullable();
            $table->string('gm_random_genome_tissue_lineage_specificity')->nullable();
            $table->text('gm_random_genome_gene_product_expressed_by_transgene')->nullable();
            $table->text('gm_random_genome_function_of_transgene')->nullable();
            $table->text('gm_random_genome_other_function_of_transgene')->nullable();
            $table->string('gm_random_genome_coding_sequence_type', 50)->nullable();
            $table->string('gm_random_genome_other_coding_sequence_type', 50)->nullable();
            $table->string('gm_random_genome_animal_strain', 50)->nullable();
            $table->string('gm_random_genome_other_animal_strain', 50)->nullable();
            $table->boolean('gm_random_genome_utilizes_drug_inducible_mechanism')->default(false);

            // ----------------------------------------------------------------
            // 10. Random Genome Integration Mouse Line 2
            // ----------------------------------------------------------------
            $table->boolean('gm_random_genome_second_animal_line')->default(false);
            $table->string('gm_random_genome_animal_model_name_2')->nullable();
            $table->string('gm_random_genome_animal_name_abbreviation_2', 50)->nullable();
            $table->string('gm_random_genome_gene_name_2')->nullable();
            $table->string('gm_random_genome_tissue_lineage_specificity_2')->nullable();
            $table->text('gm_random_genome_gene_product_expressed_by_transgene_2')->nullable();
            $table->text('gm_random_genome_function_of_transgene_2')->nullable();
            $table->text('gm_random_genome_other_function_of_transgene_2')->nullable();
            $table->string('gm_random_genome_coding_sequence_type_2', 50)->nullable();
            $table->string('gm_random_genome_other_coding_sequence_type_2')->nullable();
            $table->string('gm_random_genome_animal_strain_2')->nullable();
            $table->string('gm_random_genome_other_animal_strain_2')->nullable();
            $table->boolean('gm_random_genome_utilizes_drug_inducible_mechanism_2')->default(false);

            // ----------------------------------------------------------------
            // 11. Analysis Methods
            // ----------------------------------------------------------------
            $table->boolean('dexa')->default(false);
            $table->boolean('micro_ct')->default(false);
            $table->boolean('bone_histomorphometry')->default(false);
            $table->boolean('mechanical_testing')->default(false);
            $table->boolean('clinical_biochemistry')->default(false);

            // DEXA Analysis
            $table->boolean('dexa_whole_body')->default(false);
            $table->boolean('dexa_femur')->default(false);
            $table->boolean('dexa_tibia')->default(false);
            $table->boolean('dexa_vertebra')->default(false);

            // Micro CT Analysis
            $table->boolean('micro_ct_femur_trabecular')->default(false);
            $table->boolean('micro_ct_femur_cortical')->default(false);
            $table->boolean('micro_ct_tibia_trabecular')->default(false);
            $table->boolean('micro_ct_tibia_cortical')->default(false);
            $table->boolean('micro_ct_vertebra_trabecular')->default(false);

            // Bone Histomorphometry Analysis
            $table->boolean('bone_histomorphometry_femur_trabecular')->default(false);
            $table->boolean('bone_histomorphometry_femur_cortical')->default(false);
            $table->boolean('bone_histomorphometry_tibia_trabecular')->default(false);
            $table->boolean('bone_histomorphometry_tibia_cortical')->default(false);
            $table->boolean('bone_histomorphometry_vertebra_trabecular')->default(false);

			// Subject Areas
			$table->json('subject_areas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
