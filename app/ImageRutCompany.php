<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageRutCompany extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo('App\Company');
    }
}
