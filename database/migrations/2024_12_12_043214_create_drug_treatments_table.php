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
        Schema::create('drug_treatments', function (Blueprint $table) {
            $table->id();
			$table->string('type');
            $table->foreignId('study_id')->constrained()->onDelete('cascade');
            $table->string('drug_name');
            $table->decimal('drug_dose', 10, 4)->nullable();
            $table->string('drug_dose_unit')->nullable();
            $table->integer('drug_duration')->nullable();
            $table->string('drug_duration_unit')->nullable();
            $table->string('drug_frequency')->nullable();
            $table->string('drug_frequency_other')->nullable();
            $table->string('drug_route')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_treatments');
    }
};
