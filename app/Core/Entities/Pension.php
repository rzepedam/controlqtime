<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Pension extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
    
}
