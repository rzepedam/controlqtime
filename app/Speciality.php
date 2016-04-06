<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Speciality extends Model
{
    protected $fillable = [
        'type_speciality_id', 'expired_speciality', 'institution_speciality_id'
    ];


    public function setExpiredSpecialityAttribute($value) {
        $this->attributes['expired_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
