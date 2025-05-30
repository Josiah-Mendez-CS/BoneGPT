<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['measurement_category_id', 'name', 'display_name', 'unit'];

    public function synonyms()
    {
        return $this->hasMany(MeasurementSynonym::class);
    }

	public function measurementCategory()
	{
		return $this->belongsTo(MeasurementCategory::class);
	}

	public function measurementValues()
	{
		return $this->hasMany(MeasurementValue::class);
	}

	public function matchesSynonym($text) {
		// Check synonyms
		return $this->synonyms->contains(function ($synonym) use ($text) {
			return Str::lower($synonym->synonym) === Str::lower($text);
		});
	}
}
