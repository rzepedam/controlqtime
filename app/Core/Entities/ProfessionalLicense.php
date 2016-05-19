<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class ProfessionalLicense extends Eloquent
{
    protected $fillable = [
        'type_professional_license_id', 'emission_license', 'expired_license', 'is_donor', 'detail_license'
    ];
    
    protected $dates = [
        'expired_license', 'emission_license'
    ];

    /*
     * Relationships
     */

    public function typeProfessionalLicense() {
        return $this->belongsTo(TypeProfessionalLicense::class);
    }

    /*
     * Mutators
     */

    public function setEmissionLicenseAttribute($value) {
        $this->attributes['emission_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setExpiredLicenseAttribute($value) {
        $this->attributes['expired_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
