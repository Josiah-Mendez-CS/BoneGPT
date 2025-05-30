<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementValue extends Model
{
    use HasFactory;

	protected $fillable = ['sample_id', 'measurement_id', 'value'];

	public function sample()
	{
		return $this->belongsTo(Sample::class);
	}

	public function measurement()
	{
		return $this->belongsTo(Measurement::class);
	}
}
