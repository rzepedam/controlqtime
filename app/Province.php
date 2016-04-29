<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function communes() {
    	return $this->hasMany('Controlqtime\Commune');
    }

    public function region() {
        return $this->belongsTo('Controlqtime\Region');
    }
}
