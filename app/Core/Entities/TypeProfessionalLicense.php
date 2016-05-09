<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeProfessionalLicense extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /*
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }

}
