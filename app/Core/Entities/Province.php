<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Province extends Eloquent
{
    /*
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communes() {
    	return $this->hasMany(Commune::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region() {
        return $this->belongsTo(Region::class);
    }
}
