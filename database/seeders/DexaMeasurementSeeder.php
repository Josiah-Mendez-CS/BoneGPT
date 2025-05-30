<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeasurementCategory;
use App\Models\Measurement;
use App\Models\MeasurementSynonym;
use App\Models\AnalysisType;
use App\Models\Focus;

class DexaMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->command->info('Seeding DEXA measurements...');
        $instrument = AnalysisType::firstOrCreate(
            ['slug' => 'dexa'],
            ['name' => 'Dual-Energy X-Ray Absorptiometry (DEXA)']
        );

        $dexa_focus = [
            [
                'slug' => 'whole_body',
                'name' => 'Whole Body',
            ],
            [
                'slug' => 'femur',
                'name' => 'Femur',
            ],
            [
                'slug' => 'tibia',
                'name' => 'Tibia',
            ],
            [
                'slug' => 'vertebra',
                'name' => 'Vertebra'
            ]
        ];

        $dexa_focus_count = count($dexa_focus);
        $this->command->info("$dexa_focus_count DEXA analysis type focuses found.");

        foreach ($dexa_focus as $focus_data) {
            $focus = Focus::firstOrCreate(
                ['slug' => $focus_data['slug']],
                ['name' => $focus_data['name']]
            );
            $focus->analysis_types()->syncWithoutDetaching([$instrument->id]);
        }


        $dexa_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'bmd',
                'display_name' => 'Bone Mineral Density',
                'unit' => 'g/cm^2',
                'synonyms' => ['BMD', 'BMD (g/cm^2)', 'BMD (g/cm2)', 'BMD (g/cm2)', 'Bone Mineral Density']
            ],
            [
                'name' => 'bmc',
                'display_name' => 'Bone Mineral Content',
                'unit' => 'g',
                'synonyms' => ['BMC', 'BMC (g)', 'BMC (g)', 'Bone Mineral Content']
            ],
			[
				'name' => 'ba',
				'display_name' => 'Bone Area',
				'unit' => 'cm^2',
				'synonyms' => ['BA', 'BA (cm^2)', 'BA (cm2)', 'Bone Area']
			],
			[
				'name' => 'bw',
				'display_name' => 'Body Weight',
				'unit' => 'kg',
				'synonyms' => ['BW', 'BW (kg)', 'BW (kg)', 'Body Weight']
			],
			[
				'name' => 'fm',
				'display_name' => 'Fat Mass',
				'unit' => 'kg',
				'synonyms' => ['FM', 'FM (kg)', 'FM (kg)', 'Fat Mass']
			],
			[
				'name' => 'lm',
				'display_name' => 'Lean Mass',
				'unit' => 'kg',
				'synonyms' => ['LM', 'LM (kg)', 'LM (kg)', 'Lean Mass']
			],
			[
				'name' => 'body_length',
				'display_name' => 'Body Length',
				'unit' => 'cm',
				'synonyms' => ['Body Length', 'Body Length (cm)', 'Body Length (cm)', 'Body Length']
			]
        ];

        $dexa_measurements_count = count($dexa_measurements);
        $this->command->info("$dexa_measurements_count DEXA measurements found.");

        $instrument->measurementCategories->each(function ($category) use ($dexa_measurements) {
            foreach($dexa_measurements as $measurementData) {
                $synonyms = $measurementData['synonyms'];
                unset($measurementData['synonyms']);
                
                $measurement = Measurement::firstOrCreate([
                    'measurement_category_id' => $category->id,
                    'name' => $measurementData['name'],
                ], [
                    'display_name' => $measurementData['display_name'],
                    'unit' => $measurementData['unit']
                ]);
                
                foreach ($synonyms as $synonym) {
                    $measurement->synonyms()->firstOrCreate(['synonym' => $synonym]);
                }
            }
        });

        $this->command->info('DEXA measurements, analysis types, focuses, and categories seeded successfully.');
    }
}
