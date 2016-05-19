<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Certification extends Eloquent
{
    protected $fillable = [
        'type_certification_id', 'institution_certification_id', 'emission_certification', 'expired_certification'
    ];

    protected $dates = [
        'emission_certification', 'expired_certification'
    ];

    /*
     * Relationships
     */

    public function typeCertification() {
        return $this->belongsTo(TypeCertification::class);
    }

    public function institution() {
        return $this->belongsTo(Institution::class, 'institution_certification_id');
    }

    /*
     * Mutators
     */

    public function setEmissionCertificationAttribute($value) {
        $this->attributes['emission_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setExpiredCertificationAttribute($value) {
        $this->attributes['expired_certification'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
