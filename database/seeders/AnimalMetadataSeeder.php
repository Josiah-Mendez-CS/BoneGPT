<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeasurementCategory;
use App\Models\Measurement;
use App\Models\MeasurementSynonym;
use App\Models\AnalysisType;
use App\Models\Focus;

class AnimalMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->command->info('Seeding Animal Metadata measurements...');
        $instrument = AnalysisType::firstOrCreate(
            ['slug' => 'animal_metadata'],
            ['name' => 'Animal Metadata', 'is_general' => true]
        );

        $mouse_weight_focus = [
            [
                'slug' => 'animal_weight',
                'name' => 'Animal Weight',
            ]
        ];

        $mouse_weight_focus_count = count($mouse_weight_focus);
        $this->command->info("$mouse_weight_focus_count Animal Metadata analysis type focuses found.");

        foreach ($mouse_weight_focus as $focus_data) {
            $focus = Focus::firstOrCreate(
                ['slug' => $focus_data['slug']],
                ['name' => $focus_data['name']]
            );
            $focus->analysis_types()->syncWithoutDetaching([$instrument->id]);
        }
        
        $mouse_weight_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'weight',
                'display_name' => 'Weight',
                'unit' => 'g',
                'synonyms' => ['weight', 'mass', 'mass_g', 'Weight (grams)']
            ]
        ];


        $mouse_weight_measurements_count = count($mouse_weight_measurements);
        $this->command->info("$mouse_weight_measurements_count Animal Metadata measurements found.");

        $instrument->measurementCategories->each(function ($category) use ($mouse_weight_measurements) {
            foreach($mouse_weight_measurements as $measurementData) {
                $synonyms = $measurementData['synonyms'];
                unset($measurementData['synonyms']);
                
                $measurement = Measurement::firstOrCreate(
                    [
                        'measurement_category_id' => $category->id,
                        'name' => $measurementData['name'],
                    ],
                    [
                        'display_name' => $measurementData['display_name'],
                        'unit' => $measurementData['unit']
                    ]    
                );
                
                foreach ($synonyms as $synonym) {
                    $measurement->synonyms()->firstOrCreate(['synonym' => $synonym]);
                }
            }
        });

        $this->command->info('Animal Metadata measurements, analysis types, focuses, and categories seeded successfully.');
    }
}
