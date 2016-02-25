<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'country_id'
    ];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }
}
