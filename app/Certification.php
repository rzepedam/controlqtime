<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'type_certification_id', 'expired_certification', 'institution_certification_id'        
    ];



    /**
     * @param $value
     */
    public function setExpiredCertificationAttribute($value) {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}
