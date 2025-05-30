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
        Schema::table('roles', function (Blueprint $table) {
            $table->boolean('all')->default(false);
            $table->boolean('view_studies')->default(false);
            $table->boolean('manage_studies')->default(false);
            $table->boolean('manage_users')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn([
                'all',
                'view_studies',
                'manage_studies',
                'manage_users'
            ]);
        });
    }
};
