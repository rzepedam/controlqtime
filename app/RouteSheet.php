<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteSheet extends Model
{
    protected $fillable = [
        'num_sheet', 'manpower_id', 'turn'
    ];


    /*
     * Relationships
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpower() {
        return $this->belongsTo('App\Manpower');
    }
}
