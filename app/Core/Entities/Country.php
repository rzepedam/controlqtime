<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Country extends Eloquent
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
    //public $incrementing = false;
    
}
