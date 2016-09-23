<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageCirculationPermitVehicle extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
