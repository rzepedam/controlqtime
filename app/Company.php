<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps   = false;
    public $incrementing = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }

    public function areas() {
        return $this->belongsToMany('App\Area');
    }
}