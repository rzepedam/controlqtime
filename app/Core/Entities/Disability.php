<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disability extends Eloquent
{
    protected $fillable = [
        'type_disability_id', 'treatment_disability', 'detail_disability'
    ];

    /*
     * Relationships
     */

    public function imageDisabilityEmployees() {
        return $this->hasMany(ImageDisabilityEmployee::class);
    }

    public function typeDisability() {
        return $this->belongsTo(TypeDisability::class);
    }

}
