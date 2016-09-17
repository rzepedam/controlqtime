<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class ProfessionalLicense extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_professional_license_id', 'emission_license', 'expired_license', 'is_donor', 'detail_license'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'expired_license', 'emission_license'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeProfessionalLicense()
    {
        return $this->belongsTo(TypeProfessionalLicense::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageProfessionalLicenseEmployees()
    {
        return $this->hasMany(ImageProfessionalLicenseEmployee::class);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setEmissionLicenseAttribute($value)
    {
        $this->attributes['emission_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value (01-01-2010)
     */
    public function setExpiredLicenseAttribute($value)
    {
        $this->attributes['expired_license'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
