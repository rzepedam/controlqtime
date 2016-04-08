<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [
        'type_disease_id', 'treatment_disease', 'detail_disease'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDisease() {
        return $this->belongsTo('App\TypeDisease');
    }
}
