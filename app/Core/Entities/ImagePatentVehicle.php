<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImagePatentVehicle extends Eloquent
{
    protected $fillable = [
        'path', 'orig_name', 'size'
    ];

    /*
     * Relationships
     */

    public function vehicle() {
        $this->belongsTo(Vehicle::class);
    }
}