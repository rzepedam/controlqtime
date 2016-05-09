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
    
    public function modelVehicles() {
        return $this->hasMany(ModelVehicle::class);
    }
    
    /*
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
