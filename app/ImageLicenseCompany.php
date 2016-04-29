<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class ImageLicenseCompany extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo('Controlqtime\Company');
    }
}
