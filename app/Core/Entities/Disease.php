<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disease extends Eloquent
{
    protected $fillable = [
        'type_disease_id', 'treatment_disease', 'detail_disease'
    ];

    /*
     * Relationships
     */

    public function typeDisease() {
        return $this->belongsTo(TypeDisease::class);
    }
}
