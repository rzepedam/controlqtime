<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageCirculationPermitVehicle extends Eloquent
{
    protected $fillable = [
        'name', 'mime', 'orig_name'
    ];

    /*
     * Relationships
     */

    public function vehicle() {
        $this->belongsTo(Vehicle::class);
    }
}
