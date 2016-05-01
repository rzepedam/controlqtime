<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Trademark extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /*
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelVehicles() {
        return $this->hasMany('Controlqtime\ModelVehicle');
    }
}
