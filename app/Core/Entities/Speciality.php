<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Speciality extends Eloquent
{
    protected $fillable = [
        'type_speciality_id', 'institution_speciality_id', 'emission_speciality', 'expired_speciality'
    ];


    protected $dates = [
        'emission_speciality', 'expired_speciality'
    ];

    /*
     * Relationships
     */
    
    public function typeSpeciality() {
        return $this->belongsTo(TypeSpeciality::class);
    }

    public function institution() {
        return $this->belongsTo(Institution::class, 'institution_speciality_id');
    }
    
    /*
     * Mutators
     */

    public function setEmissionSpecialityAttribute($value) {
        $this->attributes['emission_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setExpiredSpecialityAttribute($value) {
        $this->attributes['expired_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
