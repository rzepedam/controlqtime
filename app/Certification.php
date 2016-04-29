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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCertification() {
        return $this->belongsTo('Controlqtime\TypeCertification');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution() {
        return $this->belongsTo('Controlqtime\Institution', 'institution_certification_id');
    }


    /**
     * @param $value
     */
    public function setExpiredCertificationAttribute($value) {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}
