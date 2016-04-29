<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class FamilyRelationship extends Model
{
    protected $fillable = [
        'relationship_id', 'manpower_family_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship() {
        return $this->belongsTo('Controlqtime\Relationship');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpower() {
        return $this->belongsTo('Controlqtime\Manpower');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpowerFamily() {
        return $this->belongsTo('Controlqtime\Manpower', 'manpower_family_id');
    }
    
}
