<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{

    public function province() {
        return $this->belongsTo('App\Province');
    }
}
