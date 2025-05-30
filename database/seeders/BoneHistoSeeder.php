<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeasurementCategory;
use App\Models\Measurement;
use App\Models\MeasurementSynonym;
use App\Models\AnalysisType;
use App\Models\Focus;
use Illuminate\Support\Str;

class BoneHistoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding BoneHisto measurements...');
        $instrument = AnalysisType::firstOrCreate(
            ['slug' => 'bone_histo'],
            ['name' => 'Bone Histomorphometry']
        );

        $bonehisto_focus = [
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

        $bonehisto_focus_count = count($bonehisto_focus);
        $this->command->info("$bonehisto_focus_count BoneHisto analysis type focuses found.");

        foreach ($bonehisto_focus as $focus_data) {
            $focus = Focus::firstOrCreate(
                ['slug' => $focus_data['slug']],
                ['name' => $focus_data['name']]
            );
            $focus->analysis_types()->syncWithoutDetaching([$instrument->id]);
        }
        
        $bonehisto_trabecular_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'bone_volume',
                'display_name' => 'Bone Volume',
                'unit' => '%',
                'synonyms' => ['bone_volume', 'BV/TV', 'Bone Volume (%)']
            ],
            [
                'name' => 'trabecular_thickness',
                'display_name' => 'Trabecular Thickness',
                'unit' => 'µm',
                'synonyms' => ['trabecular_thickness', 'Tb.Th', 'Trabecular Thickness (µm)']
            ],
            [
                'name' => 'trabecular_number',
                'display_name' => 'Trabecular Number',
                'unit' => '#/mm',
                'synonyms' => ['trabecular_number', 'Tb.N', 'Trabecular Number (#/mm)']
            ],
            [
                'name' => 'trabecular_spacing',
                'display_name' => 'Trabecular Spacing',
                'unit' => 'µm',
                'synonyms' => ['trabecular_spacing', 'Tb.Sp', 'Trabecular Spacing (µm)']
            ],
            [
                'name' => 'tissue_area',
                'display_name' => 'Tissue Area',
                'unit' => 'mm2',
                'synonyms' => ['tissue_area', 'T.Ar.', 'Tissue Area (mm2)']
            ],
            [
                'name' => 'bone_area',
                'display_name' => 'Bone Area',
                'unit' => 'mm2',
                'synonyms' => ['bone_area', 'B.Ar', 'Bone Area (mm2)']
            ],
            [
                'name' => 'bone_surface',
                'display_name' => 'Bone Surface',
                'unit' => 'mm2/mm3',
                'synonyms' => ['bone_surface', 'BS', 'Bone Surface (mm2/mm3)']
            ],
            [
                'name' => 'osteoid_area',
                'display_name' => 'Osteoid Area',
                'unit' => 'mm2',
                'synonyms' => ['osteoid_area', 'O.Ar', 'Osteoid Area (mm2)']
            ],
            [
                'name' => 'osteoid_surface',
                'display_name' => 'Osteoid Surface',
                'unit' => '%',
                'synonyms' => ['osteoid_surface', 'OS/BS', 'Osteoid Surface (%)']
            ],
            [
                'name' => 'osteoid_volume',
                'display_name' => 'Osteoid Volume',
                'unit' => '%',
                'synonyms' => ['osteoid_volume', 'OV/BV', 'Osteoid Volume (%)']
            ],
            [
                'name' => 'eroded_surface',
                'display_name' => 'Eroded Surface',
                'unit' => '%',
                'synonyms' => ['eroded_surface', 'ES', 'Eroded Surface (%)']
            ],
            [
                'name' => 'osteoclast_surface',
                'display_name' => 'Osteoclast Surface',
                'unit' => '%',
                'synonyms' => ['osteoclast_surface', 'Oc.S/BS', 'Osteoclast Surface (%)']
            ],
            [
                'name' => 'osteoclast_number',
                'display_name' => 'Osteoclast Number',
                'unit' => '#/mm2',
                'synonyms' => ['osteoclast_number', 'Oc.N/BS', 'Osteoclast Number (#/mm2)']
            ],
            [
                'name' => 'quiescent_surface',
                'display_name' => 'Quiescent Surface',
                'unit' => '%',
                'synonyms' => ['quiescent_surface', 'QS', 'Quiescent Surface (%)']
            ],
            [
                'name' => 'osteoblast_surface',
                'display_name' => 'Osteoblast Surface',
                'unit' => '%',
                'synonyms' => ['osteoblast_surface', 'Ob.S/BS', 'Osteoblast Surface (%)']
            ],
            [
                'name' => 'osteoblast_number',
                'display_name' => 'Osteoblast Number',
                'unit' => '#/mm2',
                'synonyms' => ['osteoblast_number', 'Ob.N/BS', 'Osteoblast Number (#/mm2)']
            ],
            [
                'name' => 'single_labelled_surface',
                'display_name' => 'Single Labelled Surface',
                'unit' => '%',
                'synonyms' => ['single_labelled_surface', 'sLS', 'Single Labelled Surface (%)']
            ],
            [
                'name' => 'double_labelled_surface',
                'display_name' => 'Double Labelled Surface',
                'unit' => '%',
                'synonyms' => ['double_labelled_surface', 'dLS', 'Double Labelled Surface (%)']
            ],
            [
                'name' => 'mineralizing_surface',
                'display_name' => 'Mineralizing Surface',
                'unit' => '%',
                'synonyms' => ['mineralizing_surface', 'MS/BS', 'Mineralizing Surface (%)']
            ],
            [
                'name' => 'mineral_apposition_rate',
                'display_name' => 'Mineral Apposition Rate',
                'unit' => 'µm/day',
                'synonyms' => ['mineral_apposition_rate', 'MAR', 'Mineral Apposition Rate (µm/day)']
            ],
            [
                'name' => 'bone_formation_rate',
                'display_name' => 'Bone Formation Rate',
                'unit' => 'µm3/µm2/day',
                'synonyms' => ['bone_formation_rate', 'BFR', 'Bone Formation Rate (µm3/µm2/day)']
            ]
        ];


        $bonehisto_trabecular_measurements_count = count($bonehisto_trabecular_measurements);
        $this->command->info("$bonehisto_trabecular_measurements_count BoneHisto measurements found.");

        $instrument->measurementCategories->each(function ($category) use ($bonehisto_trabecular_measurements_count, $bonehisto_trabecular_measurements) {

            $measurements = Str::contains($category->focus->slug, 'trabecular') ?
				$bonehisto_trabecular_measurements :
				[];

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

        $this->command->info('BoneHisto measurements, analysis types, focuses, and categories seeded successfully.');
    }
}
