<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'name', 'institution_id'
    ];

    public $timestamps = false;

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function scopeName($query, $name)
    {

        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }
}
