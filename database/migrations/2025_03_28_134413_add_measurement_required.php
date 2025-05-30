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
        Schema::table('measurements', function (Blueprint $table) {
            $table->boolean('required')->default(false);
        });

        Schema::table('uploads', function (Blueprint $table) {
            $table->dropColumn('bone_type');
            $table->foreignId('measurement_category_id')->nullable()->constrained('measurement_categories')->after('id');
        });

        Schema::table('measurement_values', function (Blueprint $table) {
            $table->string('value')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('measurements', function (Blueprint $table) {
            $table->dropColumn('required');
        });

        Schema::table('uploads', function (Blueprint $table) {
            $table->string('bone_type')->nullable();
            $table->dropForeign(['measurement_category_id']);
            $table->dropColumn('measurement_category_id');
        });

        Schema::table('measurement_values', function (Blueprint $table) {
            $table->integer('value')->change();
        });
    }
};
