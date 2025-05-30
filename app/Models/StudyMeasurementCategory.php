<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyMeasurementCategory extends Model
{
    protected $table = 'study_measurement_category';

    protected $fillable = [
        'measurement_category_id',
        'study_id',
    ];

    public function study() {
        return $this->belongsTo(Study::class);
    }

    public function measurementCategory() {
        return $this->belongsTo(MeasurementCategory::class);
    }
}
