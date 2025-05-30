<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrator role
        Role::updateOrCreate(['name' => 'Administrator'], [
            'code' => 'admin',
            'all' => true,
            'view_studies' => true,
            'manage_studies' => true,
            'manage_users' => true,
            'manage_facilities' => true,
        ]);

        // Study Approver role
        Role::updateOrCreate(['name' => 'Approve Study'], [
            'code' => 'approve-study',
            'all' => false,
            'view_studies' => true,
            'manage_studies' => true,
            'manage_users' => false,
        ]);

        // facility approver role
        Role::updateOrCreate(['name' => 'Approve Facility'], [
            'code' => 'approve-facility',
            'all' => false,
            'view_studies' => false,
            'manage_studies' => false,
            'manage_users' => false,
            'manage_facilities' => true,
        ]);
    }
}
