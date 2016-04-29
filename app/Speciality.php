<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Speciality extends Model
{
    protected $fillable = [
        'type_speciality_id', 'expired_speciality', 'institution_speciality_id'
    ];


    protected $dates = [
        'expired_speciality'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeSpeciality() {
        return $this->belongsTo('Controlqtime\TypeSpeciality');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution() {
        return $this->belongsTo('Controlqtime\Institution', 'institution_speciality_id');
    }
    

    /**
     * @param $value
     */
    public function setExpiredSpecialityAttribute($value) {
        $this->attributes['expired_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
