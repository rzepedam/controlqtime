<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{


    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
}
