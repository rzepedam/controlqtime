<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("full_name", "LIKE", "%$not_space_name%");
        }
    }
}
