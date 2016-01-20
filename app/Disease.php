<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }
}
