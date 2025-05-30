<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MeasurementCategory extends Pivot
{

    protected $table = 'measurement_categories';

    protected $fillable = ['analysis_type_id', 'focus_id'];

    public static $default_name = 'sample_identifiers';

    public $timestamps = true;
    public $incrementing = true;
    protected $keyType = 'int';
    public $primaryKey = 'id';

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }

    public function analysis_type()
    {
        return $this->belongsTo(AnalysisType::class);
    }

    public function focus()
    {
        return $this->belongsTo(Focus::class);
    }

    public function studies() {
        return $this->belongsToMany(Study::class);
    }

    public function scopeForTabs($query, $instrumentSlug, $focusSlug) {
        return $query->whereHas('analysis_type', function($q) use ($instrumentSlug) {
            $q->where('slug', $instrumentSlug);
        })->whereHas('focus', function($q) use ($focusSlug) {
            $q->where('slug', $focusSlug);
        });
    }
}
