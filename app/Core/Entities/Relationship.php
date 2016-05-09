<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Relationship extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /*
     * Relationships
     */

    public function manpowers() {
        return $this->belongsToMany('Controlqtime\Manpower');
    }

    /*
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}
