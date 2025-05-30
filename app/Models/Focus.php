<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{
    protected $table = 'focuses';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function measurementCategories()
    {
        return $this->hasMany(MeasurementCategory::class);
    }

    public function analysis_types() {
        return $this->belongsToMany(AnalysisType::class, 'measurement_categories')->using(MeasurementCategory::class)->withPivot('id');
    }
}
