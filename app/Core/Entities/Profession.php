<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
    
}
