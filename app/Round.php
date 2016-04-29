<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'route_sheet_id', 'route_id', 'vehicle_id', 'status'
    ];


    /*
     * Relationships
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function route() {
        return $this->belongsTo('Controlqtime\Route');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle() {
        return $this->belongsTo('Controlqtime\Vehicle');
    }

}
