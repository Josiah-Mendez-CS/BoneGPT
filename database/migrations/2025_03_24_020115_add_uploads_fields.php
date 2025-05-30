<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('uploads', function(Blueprint $table) {
            $table->string('mime_type')->nullable();
            $table->integer('size')->nullable();
            $table->string('instrument')->nullable();
            $table->string('focus')->nullable();
        });

        // Populate the new columns
        Upload::chunk(100, function($uploads) {
            foreach ($uploads as $upload) {
                if (str_ends_with($upload->file_path, '.csv')) {
                    $upload->mime_type = 'text/csv';
                }

                if (Storage::exists($upload->file_path)) {
                    $upload->size = Storage::size($upload->file_path);
                }
                
                $instrument_values = [
                    'mouse_weight',
                    'dexa',
                    'micro_ct',
                    'bone_histomorphometry',
                    'mechanical_testing',
                    'clinical_biochemistry'
                ];

                if ( $upload->bone_type ) {
                    foreach ($instrument_values as $instrument) {
                        if (str_starts_with($upload->bone_type, $instrument)) {
                            $upload->instrument = $instrument;
                            $sub_bone_type = str_replace($instrument . '_', '', $upload->bone_type);
                            $upload->focus = $sub_bone_type;
                            break;
                        }
                    }
                }

                $upload->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uploads', function(Blueprint $table) {
            $table->dropColumn('mime_type');
            $table->dropColumn('size');
            $table->dropColumn('instrument');
            $table->dropColumn('focus');
        });
    }
};
