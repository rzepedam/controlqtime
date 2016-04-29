<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo('Controlqtime\Company');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune() {
        return $this->belongsTo('Controlqtime\Commune');
    }

    /*
     * Set methods (mutators)
     */

    /**
     * @param $value
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
}
