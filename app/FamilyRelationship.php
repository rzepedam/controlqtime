<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyRelationship extends Model
{
    protected $fillable = [
        'relationship_id', 'manpower_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship() {
        return $this->belongsTo('App\Relationship');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpower() {
        return $this->belongsTo('App\Manpower');
    }
}
