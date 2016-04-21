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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rounds() {
        return $this->hasMany('App\Round');
    }
    
    /*
     * Accesors
     */

    /**
     * @return mixed
     */
    public function getNumRoundsAttribute() {
        return count($this->rounds);
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
