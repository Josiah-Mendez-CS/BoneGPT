<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisType extends Model
{
    protected $fillable = [
        'slug',
        'name'
    ];

    public function measurementCategories()
    {
        return $this->hasMany(MeasurementCategory::class);
    }

    public function focuses()
    {
        return $this->belongsToMany(Focus::class, 'measurement_categories')->using(MeasurementCategory::class)->withPivot('id');
    }

    public function studies()
    {
        return $this->belongsToMany(Study::class, 'study_analysis_type');
    }

    public function scopeTools($builder)
    {
        return $builder->where('is_general', false);
    }
}
