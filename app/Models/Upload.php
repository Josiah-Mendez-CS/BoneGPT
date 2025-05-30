<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

	protected $fillable = [
        'study_id',
        'bone_type',  // DEPRECATED
        'analysis_type',
        'focus',
        'file_path',
		'original_filename',
		'headers',
        'mime_type',
        'size'
    ];

	protected $casts = [
        'headers' => 'array'
    ];

	public function samples()
    {
        return $this->hasMany(Sample::class);
    }

    public function sample() {
        return $this->belongsTo(Sample::class);
    }

	public function study()
    {
        return $this->belongsTo(Study::class);
    }

    public function measurementCategory()
    {
        return $this->belongsTo(MeasurementCategory::class);
    }

    public function analysisType()
    {
        return $this->belongsTo(AnalysisType::class, 'analysis_type', 'slug');
    }

    public function analysisFocus()
    {
        return $this->belongsTo(Focus::class, 'focus', 'slug');
    }

    public function measurements() {
        $measurementIds = collect();
        collect($this->headers)->map(function($header) use ($measurementIds) {
            $measurementIds->push($header['measurement_id']);
        });
        $measurements = Measurement::whereIn('id', $measurementIds)->get();
        return $measurements->sortByDesc(function ($measurement) {
            return $measurement->name === 'sample_id' ? 1 : 0;
        })->values();
    }

    public function measurementValues()
    {
        return $this->hasManyThrough(
            MeasurementValue::class,
            Sample::class,
        );
    }

    public function scopeImages($query)
    {
        return $query->where('mime_type', 'like', 'image%');
    }

    public function scopeCSV($query)
    {
        return $query->where('mime_type', 'text/csv');
    }


    public function isCsv() {
        return $this->mime_type === 'text/csv';
    }

    public function isDataSheet() {
        return $this->isCsv() && !$this->sample_id;
    }

}
