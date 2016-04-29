<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }


    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
