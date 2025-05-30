<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
          RoleSeeder::class,
          AnimalMetadataSeeder::class,
          DexaMeasurementSeeder::class,
          MicroCTMeasurementSeeder::class,
          BoneHistoSeeder::class,
          MechanicalTestingSeeder::class,
      ]);
    }
}
