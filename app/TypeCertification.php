<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCertification extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    /**
     * @param $query
     * @param $name
     */
    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }
}
