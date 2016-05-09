<?php

namespace Controlqtime;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'type_certification_id', 'expired_certification', 'institution_certification_id'        
    ];

    protected $dates = [
        'expired_certification'
    ];

    /*
     * Relationships
     */

    public function typeCertification() {
        return $this->belongsTo('Controlqtime\TypeCertification');
    }

    public function institution() {
        return $this->belongsTo('Controlqtime\Institution', 'institution_certification_id');
    }

    /*
     * Mutators
     */

    public function setExpiredCertificationAttribute($value) {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
