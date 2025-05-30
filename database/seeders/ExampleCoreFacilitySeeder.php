<?php

namespace Database\Seeders;

use App\Models\CoreFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExampleCoreFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // truncate
        // CoreFacility::truncate();
        // iterate and make core facility examples
        for ($i = 0; $i < 100; $i++) {
            CoreFacility::create([
                'facility_name' => 'Example Facility '.$i,
                'web_address' => 'https://example'.$i.'.com',
                'institution' => 'Example Institution '.$i,
                'contact_name' => 'John Doe '.$i,
                'contact_email' => 'john.doe'.$i.'@example.com',
                'analysis_types' => $i % 2 == 0 ? ['Type A'] : ($i % 3 == 0 ? ['Type A', 'Type B'] : []),
                'created_at' => now()->subMinutes($i)
            ]);
        }
    }
}
