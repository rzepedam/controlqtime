<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function provinces() {
    	return $this->hasMany('Controlqtime\Province');
    }
}
