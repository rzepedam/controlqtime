<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Terminal extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    /*
     * Mutators
     */

    /**
     * @param string $value
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}
