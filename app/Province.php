<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function communes() {
    	return $this->hasMany('App\Commune');
    }
}
