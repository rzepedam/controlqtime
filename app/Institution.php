<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'name', 'type_institution_id'
    ];

    public $timestamps = false;

    public function typeInstitution() {
        return $this->belongsTo('App\TypeInstitution');
    }

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }
}
