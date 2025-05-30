<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementSynonym extends Model
{
    use HasFactory;

    protected $fillable = ['measurement_id', 'synonym'];

    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }
}
