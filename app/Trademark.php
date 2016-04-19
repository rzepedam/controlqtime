<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }


    /**
     * @param string $value
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelVehicles() {
        return $this->hasMany('App\ModelVehicle');
    }
}
