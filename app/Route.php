<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name', 'terminal_id'
    ];

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }


    /*
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terminal() {
        return $this->belongsTo('App\Terminal');
    }


    /*
     * Mutators
     */


    /**
     * @param $value
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}