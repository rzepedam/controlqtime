<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeVehicle extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    /*
     * Mutators
     */
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
