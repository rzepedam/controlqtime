<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class City extends Eloquent
{
    protected $fillable = [
        'name', 'country_id'
    ];

    public $timestamps = false;

    /*
     * Relationships
     */
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    /*
     * Mutators
     */
    
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
