<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigator extends Model
{
    use HasFactory;

	protected $fillable = [
		'study_id',
        'first_name',
        'last_name',
        'email',
        'department',
		'organization',
		'country',
		'state',
		'is_corresponding'
	];

	public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
