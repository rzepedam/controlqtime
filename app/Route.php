<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name'
    ];

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
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