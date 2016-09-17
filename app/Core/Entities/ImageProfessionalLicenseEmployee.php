<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageProfessionalLicenseEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'professional_license_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professionalLicense()
    {
        return $this->belongsTo(ProfessionalLicense::class);
    }
}
