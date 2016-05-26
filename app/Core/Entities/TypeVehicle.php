<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeVehicle extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'engine_cubic_id', 'weight_id'
    ];

    /*
     * Relationships
     */
    
    public function engineCubic() {
        return $this->belongsTo(EngineCubic::class);
    }

    public function weight() {
        return $this->belongsTo(Weight::class);
    }
    
    /*
     * Mutators
     */
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
