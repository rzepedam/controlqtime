<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Pension extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
