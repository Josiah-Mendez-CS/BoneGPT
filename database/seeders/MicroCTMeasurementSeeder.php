<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeasurementCategory;
use App\Models\Measurement;
use App\Models\Focus;
use App\Models\AnalysisType;
use Illuminate\Support\Str;

class MicroCTMeasurementSeeder extends Seeder
{
    /**
     * Measurements and categories updated 3/28/2025 by ROSSA_uCT_Standards_V1
     */
    public function run(): void
    {

		$this->command->info('Seeding MicroCT measurements...');
        $instrument = AnalysisType::firstOrCreate(
            ['slug' => 'micro_ct'],
            ['name' => 'Microcomputed Tomography (µCT)']
        );

		$microct_focus = [
			[
				'slug' => 'femur_trabecular',
				'name' => 'Femur Trabecular',
			],
			[
				'slug' => 'femur_cortical',
				'name' => 'Femur Cortical',
			],
			[
				'slug' => 'tibia_trabecular',
				'name' => 'Tibia Trabecular',
			],
			[
				'slug' => 'tibia_cortical',
				'name' => 'Tibia Cortical',
			],
			[
				'slug' => 'vertebra_trabecular',
				'name' => 'Vertebra Trabecular',
			]
		];

		$uct_focus_count = count($microct_focus);
        $this->command->info("$uct_focus_count MicroCT analysis type focuses found.");

        foreach ($microct_focus as $focus_data) {
            $focus = Focus::firstOrCreate(
                ['slug' => $focus_data['slug']],
                ['name' => $focus_data['name']]
            );
            $focus->analysis_types()->syncWithoutDetaching([$instrument->id]);
        }

		$microct_trabecular_bone_measurements = [
			[
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
			[
				'name' => 'bone_volume_total_volume',
				'display_name' => 'Bone Volume / Total Volume',
				'unit' => '%',
				'synonyms' => ['bv/tv', 'bone_volume_total_volume', 'Bone Volume / Total Volume', 'Bone Volume / Total Volume (%)'],
				'required' => true
			],
			[
				'name' => 'trabecular_number',
				'display_name' => 'Trabecular Number',
				'unit' => '1/mm',
				'synonyms' => ['tb.n', 'tb.num', 'trabecular_number', 'Trabecular Number', 'Trabecular Number (1/mm)'],
				'required' => true
			],
			[
				'name' => 'trabecular_thickness',
				'display_name' => 'Trabecular Thickness',
				'unit' => 'um',
				'synonyms' => ['tb.th', 'tb.thickness', 'trabecular_thickness', 'Trabecular Thickness', 'Trabecular Thickness (um)'],
				'required' => true
			],
			[
				'name' => 'trabecular_spacing',
				'display_name' => 'Trabecular Spacing',
				'unit' => 'um',
				'synonyms' => ['tb.sp', 'tb.spacing', 'trabecular_spacing', 'Trabecular Spacing', 'Trabecular Spacing (um)'],
				'required' => true
			],
			[
				'name' => 'total_volume',
				'display_name' => 'Total Volume',
				'unit' => 'mm^3',
				'synonyms' => ['tv', 'total_volume', 'Total Volume', 'Total Volume (mm^3)']
			],
			[
				'name' => 'bone_volume',
				'display_name' => 'Bone Volume',
				'unit' => 'mm^3',
				'synonyms' => ['bv', 'Trabecular Bone Volume', 'Trabecular Bone Volume (mm^3)', 'Bone Volume']
			],
			[
				'name' => 'bone_surface',
				'display_name' => 'Bone Surface',
				'unit' => 'mm^2',
				'synonyms' => ['bs', 'bone_surface', 'Bone Surface', 'Bone Surface (mm^2)']
			],
			[
				'name' => 'bone_surface_total_volume',
				'display_name' => 'Bone Surface / Total Volume',
				'unit' => 'mm^2/mm^3',
				'synonyms' => ['bs/tv', 'bone_surface_total_volume', 'Bone Surface / Total Volume', 'Bone Surface / Total Volume (mm^2/mm^3)']
			],
			[
				'name' => 'bone_surface_bone_volume',
				'display_name' => 'Bone Surface / Bone Volume',
				'unit' => 'mm^2/mm^3',
				'synonyms' => ['bs/bv', 'bone_surface_bone_volume', 'Bone Surface / Bone Volume', 'Bone Surface / Bone Volume (mm^2/mm^3)']
			],
			[
				'name' => 'connective_density',
				'display_name' => 'Connective Density',
				'unit' => '1/mm^3',
				'synonyms' => ['conn.d', 'conn.density', 'connective_density', 'Connective Density', 'Connective Density (1/mm^3)']
			],
			[
				'name' => 'structural_model_index',
				'display_name' => 'Structural Model Index',
				'unit' => 'dimensionless',
				'synonyms' => ['smi', 'structural_model_index', 'Structural Model Index']
			],
			[
				'name' => 'standard_deviation_of_trabecular_thickness',
				'display_name' => 'Standard Deviation of Trabecular Thickness',
				'unit' => 'um',
				'synonyms' => ['tb.th.sd', 'standard_deviation_of_trabecular_thickness', 'Standard Deviation of Trabecular Thickness', 'Standard Deviation of Trabecular Thickness (um)']
			],
			[
				'name' => 'standard_deviation_of_trabecular_separation',
				'display_name' => 'Standard Deviation of Trabecular Separation',
				'unit' => 'um',
				'synonyms' => ['tb.sp.sd', 'standard_deviation_of_trabecular_separation', 'Standard Deviation of Trabecular Separation', 'Standard Deviation of Trabecular Separation (um)']
			],
			[
				'name' => 'degree_of_anisotropy',
				'display_name' => 'Degree of Anisotropy',
				'unit' => 'dimensionless',
				'synonyms' => ['da', 'degree_of_anisotropy', 'Degree of Anisotropy']
			],
			[
				'name' => 'mean_intercept_length',
				'display_name' => 'Mean Intercept Length',
				'unit' => 'dimensionless',
				'synonyms' => ['mil', 'mean_intercept_length', 'Mean Intercept Length']
			],
			[
				'name' => 'bone_mineral_density',
				'display_name' => 'Bone Mineral Density',
				'unit' => 'mg/cmm HA',
				'synonyms' => ['bmd', 'bmd.density', 'bone_mineral_density', 'Bone Mineral Density', 'Bone Mineral Density (gm/cmm HA)']
			],
			[
				'name' => 'tissue_mineral_density',
				'display_name' => 'Tissue Mineral Density',
				'unit' => 'mg/ccm HA',
				'synonyms' => ['tmd', 'tmd.density', 'tissue_mineral_density', 'Tissue Mineral Density', 'Tissue Mineral Density (mg/ccm HA)']
			],
		];

		$microct_cortical_bone_measurements = [
			[
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
			[
				'name' => 'total_area',
				'display_name' => 'Total Area',
				'unit' => 'mm^2',
				'synonyms' => ['tt.ar', 'total_area', 'Total Area', 'Total Area (mm^2)'],
				'required' => true
			],
			[
				'name' => 'cortical_area',
				'display_name' => 'Cortical Area',
				'unit' => 'mm^2',
				'synonyms' => ['ct.ar', 'cortical_area', 'Cortical Area', 'Cortical Area (mm^2)'],
				'required' => true
			],
			[
				'name' => 'cortical_area_total_area',
				'display_name' => 'Cortical Area / Total Area',
				'unit' => '%',
				'synonyms' => ['ct.ar/tt.ar', 'cortical_area_total_area', 'Cortical Area / Total Area', 'Cortical Area/Total Area', 'Cortical Area / Total Area (%)', 'Area / Total Area'],
				'required' => true
			],
			[
				'name' => 'cortical_thickness',
				'display_name' => 'Cortical Thickness',
				'unit' => 'mm',
				'synonyms' => ['ct.th', 'cortical_thickness', 'Cortical Thickness', 'Cortical Thickness (mm)'],
				'required' => true
			],
			[
				'name' => 'marrow_area',
				'display_name' => 'Marrow Area',
				'unit' => 'mm^2',
				'synonyms' => ['ma.ar', 'marrow_area', 'Marrow Area', 'Marrow Area (mm^2)']
			],
			[
				'name' => 'periosteal_perimeter',
				'display_name' => 'Periosteal Perimeter',
				'unit' => 'mm',
				'synonyms' => ['ps.pm', 'periosteal_perimeter', 'Periosteal Perimeter', 'Periosteal Perimeter (mm)']
			],
			[
				'name' => 'endocortical_perimeter',
				'display_name' => 'Endocortical Perimeter',
				'unit' => 'mm',
				'synonyms' => ['ec.pm', 'endocortical_perimeter', 'Endocortical Perimeter', 'Endocortical Perimeter (mm)']
			],
			[
				'name' => 'moment_of_inertia_about_anteroposterior_axis',
				'display_name' => 'Moment of Inertia about Anteroposterior Axis',
				'unit' => 'mm^4',
				'synonyms' => ['l_ap', 'moment_of_inertia_about_anteroposterior_axis', 'Moment of Inertia about Anteroposterior Axis', 'Moment of Inertia about Anteroposterior Axis (mm^4)']
			],
			[
				'name' => 'moment_of_inertia_about_mediolateral_axis',
				'display_name' => 'Moment of Inertia about Mediolateral Axis',
				'unit' => 'mm^4',
				'synonyms' => ['l_ml', 'moment_of_inertia_about_mediolateral_axis', 'Moment of Inertia about Mediolateral Axis', 'Moment of Inertia about Mediolateral Axis (mm^4)', 'Moment of Inertia about the mediolateral axis']
			],
			[
				'name' => 'maximum_moment_of_inertia',
				'display_name' => 'Maximum Moment of Inertia',
				'unit' => 'mm^4',
				'synonyms' => ['l_max', 'maximum_moment_of_inertia', 'Maximum Moment of Inertia', 'Maximum Moment of Inertia (mm^4)']
			],
			[
				'name' => 'minimum_moment_of_inertia',
				'display_name' => 'Minimum Moment of Inertia',
				'unit' => 'mm^4',
				'synonyms' => ['min_moi', 'minimum_moment_of_inertia', 'Minimum Moment of Inertia', 'Minimum Moment of Inertia (mm^4)']
			],
			[
				'name' => 'polar_moment_of_inertia',
				'display_name' => 'Polar Moment of Inertia',
				'unit' => 'mm^4',
				'synonyms' => ['J', 'polar_moment_of_inertia', 'Polar Moment of Inertia', 'Polar Moment of Inertia (mm^4)']
			],
			[
				'name' => 'section_modulus_about_anteroposterior_axis',
				'display_name' => 'Section Modulus about Anteroposterior Axis',
				'unit' => 'mm^3',
				'synonyms' => ['l_ap/C_ap', 'section_modulus_about_anteroposterior_axis', 'Section Modulus about Anteroposterior Axis', 'Section Modulus about Anteroposterior Axis (mm^3)', 'Section Modulus (l_ap)', 'Section Modulus (I_ap)']
			],
			[
				'name' => 'section_modulus_about_mediolateral_axis',
				'display_name' => 'Section Modulus about Mediolateral Axis',
				'unit' => 'mm^3',
				'synonyms' => ['l_ml/C_ml', 'section_modulus_about_mediolateral_axis', 'Section Modulus about Mediolateral Axis', 'Section Modulus about Mediolateral Axis (mm^3)', 'Section Modulus (l_ml)', 'Section Modulus (I_ml)']
			],
			[
				'name' => 'section_modulus_about_maximum_moment_of_inertia',
				'display_name' => 'Section Modulus about Maximum Moment of Inertia',
				'unit' => 'mm^3',
				'synonyms' => ['l_max/C_max', 'section_modulus_about_maximum_moment_of_inertia', 'Section Modulus about Maximum Moment of Inertia', 'Section Modulus about Maximum Moment of Inertia (mm^3)', 'Section Modulus (l_max)', 'Section Modulus (I_max)']
			],
			[
				'name' => 'section_modulus_about_minimum_moment_of_inertia',
				'display_name' => 'Section Modulus about Minimum Moment of Inertia',
				'unit' => 'mm^3',
				'synonyms' => ['l_min/C_min', 'section_modulus_about_minimum_moment_of_inertia', 'Section Modulus about Minimum Moment of Inertia', 'Section Modulus about Minimum Moment of Inertia (mm^3)', 'Section Modulus (l_min)', 'Section Modulus (I_min)']
			],
			[
				'name' => 'cortical_porosity',
				'display_name' => 'Cortical Porosity',
				'unit' => '%',
				'synonyms' => ['ct.po', 'cortical_porosity', 'Cortical Porosity', 'Cortical Porosity (1)']
			],
			[
				'name' => 'pore_number',
				'display_name' => 'Pore Number',
				'unit' => 'n',
				'synonyms' => ['po.n', 'pore_number', 'Pore Number', 'Pore Number (n)']
			],
			[
				'name' => 'total_pore_area',
				'display_name' => 'Total Pore Area',
				'unit' => 'mm^2',
				'synonyms' => ['po.a', 'total_pore_area', 'Total Pore Area', 'Total Pore Area (mm^2)']
			],
			[
				'name' => 'total_pore_volume',
				'display_name' => 'Total Pore Volume',
				'unit' => 'mm^3',
				'synonyms' => ['po.v', 'total_pore_volume', 'Total Pore Volume', 'Total Pore Volume (mm^3)']
			],
			[
				'name' => 'average_pore_volume',
				'display_name' => 'Average Pore Volume',
				'unit' => 'mm^3',
				'synonyms' => ['avgpo.v', 'average_pore_volume', 'Average Pore Volume', 'Average Pore Volume (mm^3)', 'Average Pore Volume (Po.V/Po/N)']
			],
			[
				'name' => 'standard_deviation_of_pore_volume',
				'display_name' => 'Standard Deviation of Pore Volume',
				'unit' => 'mm^3',
				'synonyms' => ['pov.sd', 'standard_deviation_of_pore_volume', 'Standard Deviation of Pore Volume', 'Standard Deviation of Pore Volume (mm^3)']
			],
			[
				'name' => 'pore_density',
				'display_name' => 'Pore Density (Pore Number / Total Cortical Bone Volume)',
				'unit' => '1/mm^3',
				'synonyms' => ['po.dn', 'pore_density', 'Pore Density', 'Pore Density (1/mm^3)', 'Pore Density (Pore Number / Total Cortical Bone Volume)']
			],
			[
				'name' => 'bone_mineral_density',
				'display_name' => 'Bone Mineral Density',
				'unit' => 'mg/ccm HA',
				'synonyms' => ['bmd', 'bone_mineral_density', 'Bone Mineral Density', 'Bone Mineral Density (mg/ccm HA)']
			],
			[
				'name' => 'tissue_mineral_density',
				'display_name' => 'Tissue Mineral Density',
				'unit' => 'mg/ccm HA',
				'synonyms' => ['tmd', 'tissue_mineral_density', 'Tissue Mineral Density', 'Tissue Mineral Density (mg/ccm HA)']
			]
		];


		$uct_measurements_count = count($microct_trabecular_bone_measurements) + count($microct_cortical_bone_measurements);
        $this->command->info("$uct_measurements_count MicroCT measurements found.");

        $instrument->measurementCategories->each(function ($category)
			use ($microct_trabecular_bone_measurements, $microct_cortical_bone_measurements) {

			$measurements = Str::contains($category->focus->slug, 'trabecular') ?
				$microct_trabecular_bone_measurements :
				$microct_cortical_bone_measurements;

            foreach($measurements as $measurementData) {
                $synonyms = $measurementData['synonyms'];
                unset($measurementData['synonyms']);
                
                $measurement = Measurement::firstOrCreate(
					[
						'measurement_category_id' => $category->id,
						'name' => $measurementData['name'],
					],
					[
						'display_name' => $measurementData['display_name'],
						'unit' => $measurementData['unit'],
						'required' => $measurementData['required'] ?? false
					]
				);
                
                foreach ($synonyms as $synonym) {
                    $measurement->synonyms()->firstOrCreate(['synonym' => $synonym]);
                }
            }
        });

        $this->command->info('MicroCT measurements, analysis types, focuses, and categories seeded successfully.');

    }
}
