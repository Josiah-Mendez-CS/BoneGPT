<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sample extends Model
{
    use HasFactory;

	protected $fillable = [
        'upload_id',
        'animal_group_id',
        'data',
        'deleted',
		'identifier'
    ];

	protected $casts = [
		'data' => 'array',
		'deleted' => 'boolean',
	];

	public function upload()
    {
        return $this->belongsTo(Upload::class);
    }

	public function uploads() {
		return $this->hasMany(Upload::class);
	}

	public function measurementValues()
	{
		return $this->hasMany(MeasurementValue::class);
	}

	public function animalGroup()
	{
		return $this->belongsTo(AnimalGroup::class);
	}

	public function scopeNotDeleted($query)
	{
		return $query->where('deleted', false);
	}

	public function getSampleId() {
		return $this->measurementValues()
			->whereHas('measurement', fn($q) => $q->where('name', 'sample_identifier'))
			->first()
			->value;
	}


	public function deleteUploads() {
		$this->uploads()->each(function($upload) {
			if ( Storage::exists($upload->file_path) ) {
				Storage::delete($upload->file_path);
			}
			$upload->delete();
		});
	}
}
