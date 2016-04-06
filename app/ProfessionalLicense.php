<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProfessionalLicense extends Model
{
    protected $fillable = [
        'type_professional_license_id', 'expired_license', 'detail_license'
    ];
    

    /**
     * @param $value
     */
    public function setExpiredLicenseAttribute($value) {
        $this->attributes['expired_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
