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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function manpowers() {
        return $this->belongsToMany('Controlqtime\Manpower');
    }

}
