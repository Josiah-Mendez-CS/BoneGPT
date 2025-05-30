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
        // experimental_groups table
        // samples has foreignID reference
        // experimental_study_experimental_group has foreignID reference and needs rename
        Schema::table('samples', function (Blueprint $table) {
            $table->dropForeign(['experimental_group_id']);
        });

        Schema::table('experimental_study_experimental_group', function (Blueprint $table) {
            $table->dropForeign(['experimental_group_id']);
        });

        Schema::rename('experimental_groups', 'animal_groups');
        Schema::rename('experimental_study_experimental_group', 'experimental_study_animal_group');

        Schema::table('samples', function (Blueprint $table) {
            $table->renameColumn('experimental_group_id', 'animal_group_id');
            $table->foreign('animal_group_id')->references('id')->on('animal_groups')->nullable()->onDelete('cascade');
        });

        Schema::table('experimental_study_animal_group', function (Blueprint $table) {
            $table->renameColumn('experimental_group_id', 'animal_group_id');
            $table->foreign('animal_group_id')->references('id')->on('animal_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->dropForeign(['animal_group_id']);
        });

        Schema::table('experimental_study_animal_group', function (Blueprint $table) {
            $table->dropForeign(['animal_group_id']);
        });

        Schema::rename('animal_groups', 'experimental_groups');
        Schema::rename('experimental_study_animal_group', 'experimental_study_experimental_group');

        Schema::table('samples', function (Blueprint $table) {
            $table->renameColumn('animal_group_id', 'experimental_group_id');
            $table->foreign('experimental_group_id')->references('id')->on('experimental_groups')->nullable()->onDelete('cascade');
        });

        Schema::table('experimental_study_experimental_group', function (Blueprint $table) {
            $table->renameColumn('animal_group_id', 'experimental_group_id');
            $table->foreign('experimental_group_id')->references('id')->on('experimental_groups')->onDelete('cascade');
        });
    }
};
