<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province() {
        return $this->belongsTo('Controlqtime\Province');
    }
}
