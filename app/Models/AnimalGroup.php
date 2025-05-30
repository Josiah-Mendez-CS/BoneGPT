<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class AnimalGroup extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function study() {
		return $this->belongsTo(Study::class);
	}

	public function experimentalStudy() {
		return $this->belongsToMany(ExperimentalStudy::class, 'experimental_study_animal_group');
	}

	public function samples() {
		return $this->hasMany(Sample::class);
	}


	public function createGroupName() {
		$parts = collect();

		if ( $this->gm_gko_gene_symbol ) {
			$parts->push($this->gm_gko_gene_symbol);
			$parts->push($this->gm_gko_genotype);

			if ($this->gm_gko_gene_symbol_2) {
				$parts->push($this->gm_gko_gene_symbol_2);
				$parts->push($this->gm_gko_genotype_2);
			}
		}

		if ( $this->gm_ind_mutation_gene_symbol ) {
			$parts->push($this->gm_ind_mutation_gene_symbol);
			$parts->push($this->gm_ind_mutation_genotype);
		}

		if ( $this->gm_ins_mutagenesis_gene_symbol ) {
			$parts->push($this->gm_ins_mutagenesis_gene_symbol);
			$parts->push($this->gm_ins_mutagenesis_genotype);
		}

		if ( $this->gm_cond_knockout_gene_symbol ) {
			$parts->push($this->gm_cond_knockout_gene_symbol);
			$parts->push($this->gm_cond_knockout_genotype);
			$parts->push($this->gm_cond_knockout_cre_animal_line_abbreviation);
			$parts->push($this->gm_cond_knockout_cre_animal_genotype);
			$parts->push($this->gm_cond_knockout_cre_treatment_group);
		}

		if ( $this->gm_cond_knockin_gene_symbol ) {
			$parts->push($this->gm_cond_knockin_gene_symbol);
			$parts->push($this->gm_cond_knockin_genotype);
			$parts->push($this->gm_cond_knockin_cre_animal_line_abbreviation);
			$parts->push($this->gm_cond_knockin_cre_animal_genotype);
			$parts->push($this->gm_cond_knockin_cre_treatment_group);
		}

		if ( $this->gm_random_genome_gene_symbol ) {
			$parts->push($this->gm_random_genome_gene_symbol);
			$parts->push($this->gm_random_genome_genotype);
			$parts->push($this->gm_random_genome_treatment_group);

			if ( $this->gm_random_genome_gene_symbol_2 ) {
				$parts->push($this->gm_random_genome_gene_symbol_2);
				$parts->push($this->gm_random_genome_genotype_2);
				$parts->push($this->gm_random_genome_treatment_group_2);
			}
		}

		if ( $this->gonadectomy_type_of_surgery ) {
			$parts->push($this->gonadectomy_type_of_surgery);
			$parts->push($this->gonadectomy_age . 'wk');
		}

		if ( !empty($this->strain) ) {
			$parts->push($this->strain);
		}

		$parts->push(match($this->sex) {
			'male' => 'M',
			'female' => 'F',
			default => ''
		});
		$parts->push($this->age . 'wk');

		return $parts->implode('_');
	}
}
