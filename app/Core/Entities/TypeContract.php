<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeContract extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'dur', 'full_name',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
}
