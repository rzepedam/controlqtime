<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Institution extends Eloquent
{
    protected $fillable = [
        'name', 'type_institution_id'
    ];

    public $timestamps = false;

    /*
     * Relationships
     */

    public function typeInstitution() {
        return $this->belongsTo(TypeInstitution::class);
    }

    /*
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value, 'utf-8');
    }

}
