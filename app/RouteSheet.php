<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;


class RouteSheet extends Model
{
    protected $fillable = [
        'num_sheet', 'manpower_id', 'turn', 'obs'
    ];

    /*
     * Relationships
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpower() {
        return $this->belongsTo('Controlqtime\Manpower');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rounds() {
        return $this->hasMany('Controlqtime\Round');
    }
    
    /*
     * Accesors
     */

    /**
     * @return mixed
     */
    public function getNumRoundsAttribute() {
        return count($this->rounds->where('status', 'open'));
    }
    
    /**
     * @return mixed
     */
    public function getIdOpenRoundAttribute() {
        $rounds = $this->rounds->where('status', 'open');

        foreach ($rounds as $round) {
            return $round->id;
        }
    }
}