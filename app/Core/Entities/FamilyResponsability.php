<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyResponsability extends Eloquent
{
    protected $fillable = [
        'name_responsability', 'rut_responsability', 'relationship_id'
    ];

    /*
     * Relationships
     */

    public function relationship() {
        return $this->belongsTo('Controlqtime\Relationship');
    }
}
