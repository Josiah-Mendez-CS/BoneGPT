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
        Schema::table('animal_groups', function (Blueprint $table) {
            $table->string('gonadectomy_type_of_surgery')->nullable()->after('gonadectomy');
            $table->integer('gonadectomy_age')->nullable()->after('gonadectomy_type_of_surgery');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animal_groups', function (Blueprint $table) {
            $table->dropColumn('gonadectomy_type_of_surgery');
            $table->dropColumn('gonadectomy_age');
        });
    }
};
