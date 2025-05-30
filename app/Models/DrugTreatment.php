<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugTreatment extends Model
{
    use HasFactory;

	protected $fillable = [
		'study_id',
		'type',
        'drug_name',
        'drug_dose',
        'drug_dose_unit',
        'drug_duration',
        'drug_duration_unit',
        'drug_frequency',
        'drug_frequency_other',
        'drug_route'
    ];

	public function study(): BelongsTo
    {
        return $this->belongsTo(Study::class);
    }
}
