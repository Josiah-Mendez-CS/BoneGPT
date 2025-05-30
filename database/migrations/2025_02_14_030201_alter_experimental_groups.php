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
        Schema::table('experimental_groups', function (Blueprint $table) {
            $table->renameColumn('gene_symbol', 'gm_gko_gene_symbol');
            $table->string('gm_gko_gene_symbol')->nullable()->change();
            $table->renameColumn('genotype', 'gm_gko_genotype')->nullable()->change();
            $table->string('gm_gko_genotype')->nullable()->change();
            $table->string('gm_gko_gene_symbol_2')->nullable();
            $table->string('gm_gko_genotype_2')->nullable();
            $table->string('gm_ind_mutation_gene_symbol')->nullable();
            $table->string('gm_ind_mutation_genotype')->nullable();
            $table->string('gm_ins_mutagenesis_gene_symbol')->nullable();
            $table->string('gm_ins_mutagenesis_genotype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experimental_groups', function (Blueprint $table) {
            $table->renameColumn('gm_gko_gene_symbol', 'gene_symbol')->nullable(false)->change();
            $table->renameColumn('gm_gko_genotype', 'genotype')->nullable(false)->change();
            $table->dropColumn('gm_gko_gene_symbol_2');
            $table->dropColumn('gm_gko_genotype_2');
            $table->dropColumn('gm_ind_mutation_gene_symbol');
            $table->dropColumn('gm_ind_mutation_genotype');
            $table->dropColumn('gm_ins_mutagenesis_gene_symbol');
            $table->dropColumn('gm_ins_mutagenesis_genotype');
        });
    }
};
