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
        Schema::create('investigators', function (Blueprint $table) {
            $table->id();
			$table->foreignId('study_id')->constrained()->onDelete('cascade');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('department');
			$table->string('organization');
			$table->string('country');
			$table->string('state')->nullable();
			$table->boolean('is_corresponding')->default(false);
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigators');
    }
};
