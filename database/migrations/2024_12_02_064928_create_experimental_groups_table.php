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
        Schema::create('experimental_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->constrained('studies')->onDelete('cascade');
            $table->string('group_name');
            $table->string('gene_symbol', 50)->nullable();
            $table->string('genotype', 50);
            $table->string('strain', 100)->nullable();
            $table->enum('sex', ['male', 'female', 'both'])->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('cre_line', 100)->nullable();
            $table->string('drug_treatment')->nullable();
            $table->timestamps();

            // Add unique constraint for group combinations
            $table->unique([
                'study_id',
                'gene_symbol',
                'genotype',
                'sex',
                'age',
                'cre_line',
                'drug_treatment'
            ], 'unique_group_combination');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experimental_groups');
    }
};
