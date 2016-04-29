<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class TypeSpeciality extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

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
