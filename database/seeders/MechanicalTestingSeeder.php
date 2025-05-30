<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeasurementCategory;
use App\Models\Measurement;
use App\Models\MeasurementSynonym;
use App\Models\AnalysisType;
use App\Models\Focus;

class MechanicalTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding Mechanical Testing measurements...');

        $instrument = AnalysisType::firstOrCreate(
            ['slug' => 'mechanical_testing'],
            ['name' => 'Mechanical Testing']
        );

        $bending_measurements_name = 'bending_measurements';
        $torsion_measurements_name = 'torsion_measurements';
        $compression_measurements_name = 'compression_measurements';

        $mechanical_testing_focus = [
            [
                'slug' => 'femur_bending',
                'name' => 'Femur Bending',
                'measurements' => $bending_measurements_name,
            ],
            [
                'slug' => 'femur_torsion',
                'name' => 'Femur Torsion',
                'measurements' => $torsion_measurements_name,
            ],
            [
                'slug' => 'femur_compression',
                'name' => 'Femur Compression',
                'measurements' => $compression_measurements_name,
            ],
            [
                'slug' => 'tibia_bending',
                'name' => 'Tibia Bending',
                'measurements' => $bending_measurements_name,
            ],
            [
                'slug' => 'tibia_torsion',
                'name' => 'Tibia Torsion',
                'measurements' => $torsion_measurements_name,
            ],
            [
                'slug' => 'tibia_compression',
                'name' => 'Tibia Compression',
                'measurements' => $compression_measurements_name,
            ],
            [
                'slug' => 'vertebra_bending',
                'name' => 'Vertebra Bending',
                'measurements' => $bending_measurements_name,
            ],
            [
                'slug' => 'vertebra_torsion',
                'name' => 'Vertebra Torsion',
                'measurements' => $torsion_measurements_name,
            ],
            [
                'slug' => 'vertebra_compression',
                'name' => 'Vertebra Compression',
                'measurements' => $compression_measurements_name,
            ]
        ];

        $bending_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'yield_load',
                'display_name' => 'Yield Load',
                'unit' => 'N',
                'synonyms' => ['yield_load', 'Yield Load', 'Yield Load (N)', 'yield_load_(N)', 'yield_load_(N)', 'yield_load_(N)']
            ],
            [
                'name' => 'maximum_load',
                'display_name' => 'Maximum Load',
                'unit' => 'N',
                'synonyms' => ['maximum_load', 'Maximum Load', 'Maximum Load (N)', 'maximum_load_(N)', 'maximum_load_(N)', 'maximum_load_(N)']
            ],
            [
                'name' => 'stiffness',
                'display_name' => 'Stiffness',
                'unit' => 'N/mm',
                'synonyms' => ['stiffness', 'Stiffness', 'Stiffness (N/mm)', 'stiffness_(N/mm)', 'stiffness_(N/mm)', 'stiffness_(N/mm)']
            ],
            [
                'name' => 'work_to_yield',
                'display_name' => 'Work to Yield',
                'unit' => 'N*mm or mJ',
                'synonyms' => ['work_to_yield', 'Work to Yield', 'Work to Yield (N*mm or mJ)']
            ],
            [
                'name' => 'post_yield_work',
                'display_name' => 'Post-Yield Work',
                'unit' => 'N*mm or mJ',
                'synonyms' => ['post_yield_work', 'Post-Yield Work', 'Post-Yield Work (N*mm or mJ)']
            ],
            [
                'name' => 'total_work',
                'display_name' => 'Total Work',
                'unit' => 'N*mm or mJ',
                'synonyms' => ['total_work', 'Total Work', 'Total Work (N*mm or mJ)']
            ],
            [
                'name' => 'displacement_to_yield',
                'display_name' => 'Displacement to Yield',
                'unit' => 'mm',
                'synonyms' => ['displacement_to_yield', 'Displacement to Yield', 'Displacement to Yield (mm)']
            ],
            [
                'name' => 'postyield_displacement',
                'display_name' => 'Postyield Displacement',
                'unit' => 'mm',
                'synonyms' => ['postyield_displacement', 'Postyield Displacement', 'Postyield Displacement (mm)']
            ],
            [
                'name' => 'total_displacement',
                'display_name' => 'Total Displacement',
                'unit' => 'mm',
                'synonyms' => ['total_displacement', 'Total Displacement', 'Total Displacement (mm)']
            ],
            [
                'name' => 'yield_stress',
                'display_name' => 'Yield Stress',
                'unit' => 'MPa',
                'synonyms' => ['yield_stress', 'Yield Stress', 'Yield Stress (MPa)']
            ],
            [
                'name' => 'ultimate_stress',
                'display_name' => 'Ultimate Stress',
                'unit' => 'MPa',
                'synonyms' => ['ultimate_stress', 'Ultimate Stress', 'Ultimate Stress (MPa)']
            ],
            [
                'name' => 'strain_to_yield',
                'display_name' => 'Strain to Yield',
                'unit' => 'microstrain',
                'synonyms' => ['strain_to_yield', 'Strain to Yield', 'Strain to Yield (microstrain)']
            ],
            [
                'name' => 'total_strain',
                'display_name' => 'Total Strain',
                'unit' => 'microstrain',
                'synonyms' => ['total_strain', 'Total Strain', 'Total Strain (microstrain)']
            ],
            [
                'name' => 'elastic_modulus',
                'display_name' => 'Elastic Modulus',
                'unit' => 'GPa',
                'synonyms' => ['elastic_modulus', 'Elastic Modulus', 'Elastic Modulus (GPa)']
            ],
            [
                'name' => 'resilience',
                'display_name' => 'Resilience',
                'unit' => 'MPa',
                'synonyms' => ['resilience', 'Resilience', 'Resilience (MPa)']
            ],
            [
                'name' => 'toughness',
                'display_name' => 'Toughness',
                'unit' => 'MPa',
                'synonyms' => ['toughness', 'Toughness', 'Toughness (MPa)']
            ]
        ];


        $torsion_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'maximum_torque',
                'display_name' => 'Maximum Torque',
                'unit' => 'N*mm',
                'synonyms' => ['maximum_torque', 'Maximum Torque', 'Maximum Torque (N*mm)']
            ],
            [
                'name' => 'torsional_stiffness',
                'display_name' => 'Torsional Stiffness',
                'unit' => 'N*mm/deg',
                'synonyms' => ['torsional_stiffness', 'Torsional Stiffness', 'Torsional Stiffness (N*mm/deg)']
            ],
            [
                'name' => 'work_to_fracture',
                'display_name' => 'Work to Fracture',
                'unit' => 'N*mm*Deg',
                'synonyms' => ['work_to_fracture', 'Work to Fracture', 'Work to Fracture (N*mm*Deg)']
            ],
            [
                'name' => 'rotation_at_failure',
                'display_name' => 'Rotation at Failure',
                'unit' => 'Deg',
                'synonyms' => ['rotation_at_failure', 'Rotation at Failure', 'Rotation at Failure (Deg)']
            ],
            [
                'name' => 'ultimate_shear_strength',
                'display_name' => 'Ultimate Shear Strength',
                'unit' => 'MPa',
                'synonyms' => ['ultimate_shear_strength', 'Ultimate Shear Strength', 'Ultimate Shear Strength (MPa)']
            ],
            [
                'name' => 'shear_modulus',
                'display_name' => 'Shear Modulus',
                'unit' => 'GPa',
                'synonyms' => ['shear_modulus', 'Shear Modulus', 'Shear Modulus (GPa)']
            ]
        ];


        $compression_measurements = [
            [
                'name' => 'sample_identifier',
                'display_name' => 'Sample Identifier',
                'unit' => '',
                'synonyms' => ['sample_identifier', 'Sample Identifier', 'Sample ID', 'Sample Name', 'sample_name', 'sample_id']
            ],
            [
                'name' => 'yield_force',
                'display_name' => 'Yield Force',
                'unit' => 'N',
                'synonyms' => ['yield_force', 'Yield Force', 'Yield Force (N)']
            ],
            [
                'name' => 'ultimate_force',
                'display_name' => 'Ultimate Force',
                'unit' => 'N',
                'synonyms' => ['ultimate_force', 'Ultimate Force', 'Ultimate Force (N)']
            ],
            [
                'name' => 'stiffness',
                'display_name' => 'Stiffness',
                'unit' => 'N/mm',
                'synonyms' => ['stiffness', 'Stiffness', 'Stiffness (N/mm)']
            ],
            [
                'name' => 'displacement_at_ultimate_force',
                'display_name' => 'Displacement at Ultimate Force',
                'unit' => 'mm',
                'synonyms' => ['displacement_at_ultimate_force', 'Displacement at Ultimate Force', 'Displacement at Ultimate Force (mm)']
            ],
            [
                'name' => 'energy_to_ultimate_force',
                'display_name' => 'Energy to Ultimate Force',
                'unit' => 'N*mm',
                'synonyms' => ['energy_to_ultimate_force', 'Energy to Ultimate Force', 'Energy to Ultimate Force (N*mm)']
            ]
        ];


        $mechanical_testing_focus_count = count($mechanical_testing_focus);
        $this->command->info("$mechanical_testing_focus_count Mechanical Testing analysis type focuses found.");

        foreach ($mechanical_testing_focus as $focus_data) {
            $focus = Focus::firstOrCreate(
                ['slug' => $focus_data['slug']],
                ['name' => $focus_data['name']]
            );
            $focus->analysis_types()->syncWithoutDetaching([$instrument->id]);
            $this->command->info("Focus {$focus_data['name']} created.");
        }
        $this->command->info("Mechanical Testing focus measurements found.");


        $mechanical_testing_measurements_count = count($bending_measurements) + count($torsion_measurements) + count($compression_measurements);
        $this->command->info("$mechanical_testing_measurements_count Mechanical Testing measurements found.");
        $instrument->measurementCategories->each(function($category) use ($bending_measurements, $torsion_measurements, $compression_measurements, $mechanical_testing_focus) {
            $matched_focus = collect($mechanical_testing_focus)->firstWhere('slug', $category->focus->slug);
            // dd($category);
            $measurements = ${$matched_focus['measurements']};
            foreach($measurements as $measurement_data) {
                $measurement = Measurement::firstOrCreate(
                    [
                        'name' => $measurement_data['name'],
                        'measurement_category_id' => $category->id,
                    ],
                    [
                        'display_name' => $measurement_data['display_name'],
                        'unit' => $measurement_data['unit']
                    ]
                );
                foreach ($measurement_data['synonyms'] as $synonym) {
                    MeasurementSynonym::firstOrCreate(
                        ['synonym' => $synonym, 'measurement_id' => $measurement->id]
                    );
                }
            }
        });
    }
}
