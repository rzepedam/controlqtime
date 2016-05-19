<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Study extends Eloquent
{
    protected $fillable = [
        'degree_id', 'name_study', 'institution_study_id', 'date_obtention'
    ];

    protected $dates = [
        'date_obtention'
    ];
    public $timestamps = false;
    /*
     * Relationships
     */

    public function degree() {
        return $this->belongsTo(Degree::class);
    }

    public function institution() {
        return $this->belongsTo(Institution::class, 'institution_study_id');
    }

    /*
     * Mutators
     */

    public function setDateObtentionAttribute($value) {
        $this->attributes['date_obtention'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
