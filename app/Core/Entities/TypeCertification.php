<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeCertification extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    
}
