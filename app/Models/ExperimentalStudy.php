<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperimentalStudy extends Model
{

    public $guarded = [];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }

    public function animalGroups()
    {
        return $this->belongsToMany(AnimalGroup::class, 'experimental_study_animal_group');
    }
}
