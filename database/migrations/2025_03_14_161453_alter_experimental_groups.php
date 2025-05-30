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
            $table->renameColumn('gm_cond_knockin_gene_product', 'gm_cond_knockin_gene_symbol');
            $table->renameColumn('gm_random_genome_gene_product', 'gm_random_genome_gene_symbol');
            $table->renameColumn('gm_random_genome_gene_product_2', 'gm_random_genome_gene_symbol_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experimental_groups', function(Blueprint $table) {
            $table->renameColumn('gm_cond_knockin_gene_symbol', 'gm_cond_knockin_gene_product');
            $table->renameColumn('gm_random_genome_gene_symbol', 'gm_random_genome_gene_product');
            $table->renameColumn('gm_random_genome_gene_symbol_2', 'gm_random_genome_gene_product_2');
        });
    }
};
